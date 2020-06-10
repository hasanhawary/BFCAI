<?php

namespace App\Http\Controllers\Student;

use App\File;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function index($semester, $users)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {
            $title = trans('site.messages');
            $messages = Message::orderBy('id', 'desc')
                ->where('receive_user', 'students')
                ->where('send_user', $users)
                ->where('receive_user_id', student()->id)
                ->get();
            $title = trans('site.message');
            return view('student.messages.index', compact('title', 'messages', 'users', 'semester'));
        } else {
            return view('student.404');
        }

    }

    public function inbox(Request $request, $semester, $users)
    {
        if (request()->ajax()) {
            if ($semester == 'first-semester' or $semester == 'second-semester') {
                $title = trans('site.sent_message');
                $messages = Message::orderBy('id', 'desc')
                    ->where('receive_user', 'students')
                    ->where('send_user', $users)
                    ->where('receive_user_id', student()->id)->get();

                $title = trans('site.message');
                return view('student.messages.ajax._inbox', compact('title', 'messages', 'users', 'semester'));
            } else {
                return view('student.404');
            }
        }
    }

    public function sent(Request $request, $semester, $users)
    {
        if (request()->ajax()) {
            if ($semester == 'first-semester' or $semester == 'second-semester') {
                $title = trans('site.sent_message');
                $messages = Message::orderBy('id', 'desc')
                    ->where('send_user', 'students')
                    ->where('send_user_id', student()->id)
                    ->where('receive_user', $users)->get();

                $title = trans('site.message');
                return view('student.messages.ajax._sent', compact('title', 'messages', 'users', 'semester'));
            } else {
                return view('student.404');
            }
        }

    }

    public function draft(Request $request, $semester, $users)
    {
        if (request()->ajax()) {
            if ($semester == 'first-semester' or $semester == 'second-semester') {
                $messages = Message::orderBy('id', 'desc')
                    ->where('subject', null)
                    ->where('content', null)
                    ->where('send_user', 'students')
                    ->where('send_user_id', student()->id)
                    ->where('receive_user', $users)
                    ->get();

                return view('student.messages.ajax._draft', compact('messages', 'users', 'semester'));
            } else {
                return view('student.404');
            }
        }
    }
    public function important(Request $request, $semester, $users)
    {
        if (request()->ajax()) {
            if ($semester == 'first-semester' or $semester == 'second-semester') {
                $title = trans('site.sent_message');
                $messages = Message::orderBy('id', 'desc')
                    ->where('important', 1)
                    ->where('receive_user', 'students')
                    ->where('send_user', $users)
                    ->where('receive_user_id', student()->id)->get();

                $title = trans('site.message');
                return view('student.messages.ajax._important', compact('title', 'messages', 'users', 'semester'));
            } else {
                return view('student.404');
            }
        }

    }

    public function create($semester, $users)
    {
        $message = Message::create([
            'send_user' => 'students',
            'send_user_id' => student()->id,
            'receive_user' => $users,
        ]);
        if (!empty($message)) {
            return redirect(surl($semester . '/' . $users . '/' . 'messages/' . $message->id . '/edit'));
        }
    }

    public function show($semester, $users, $id)
    {
        $title = trans('site.show_message');
        if ($semester == 'first-semester' or $semester == 'second-semester') {
            $message = Message::find($id);
            if ($message->receive_user_id == student()->id) {
                if ($users == 'students') {
                    $user = User::where('id', $message->send_user_id)->first();
                } elseif ($users == 'instructors') {
                    $user = Instructor::where('id', $message->send_user_id)->first();
                }
            } else {
                if ($users == 'students') {
                    $user = User::where('id', $message->receive_user_id)->first();
                } elseif ($users == 'instructors') {
                    $user = Instructor::where('id', $message->receive_user_id)->first();
                }
            }
            return view('student.messages.show', compact('title', 'message', 'semester', 'user', 'users'));
        } else {
            return view('student.404');
        }
    }

    public function replay(Request $request)
    {
        $message_replay = Message::create([
            'send_user' => 'instructors',
            'send_user_id' => instructor()->id,
            'receive_user' => $request->send_user,
            'receive_user_id' => $request->send_user_id,
        ]);

        if ($request->send_user == 'students') {
            $user = User::where('id', $request->send_user_id)->first();
        } elseif ($request->send_user == 'instructors') {
            $user = Instructor::where('id', $request->send_user_id)->first();
        }
        return view('Instructor.messages.ajax._replay', compact('message_replay', 'user'));
    }

    public function edit($semester, $users, $id)
    {
        // dd($users);
        $message = Message::find($id);
        if ($users = 'students') {
            $users_name = User::all();
        } else {
            $users_name = Instructor::all();
        }
        return view('student.messages.edit', compact('semester', 'users', 'message', 'users_name'));
    }

    public function view($id)
    {
        $message = File::where('id', $id)->first();
        $filename = $message->full_file;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            $headers = array(
                'Content-Type: ' . $message->mime_type . '',
            );
            return response()->file($path, $headers);
        } else {
            abort(404, 'File Not Found');
        }
    }

    public function download($id)
    {
        $message = File::where('id', $id)->first();
        $filename = $message->full_file;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            $headers = array(
                'Content-Type: ' . $message->mime_type . '',
            );
            return Response::download($path, $message->name, $headers);
        } else {
            abort(404, 'File Not Found');
        }
    }

    public function star(Request $request)
    {
        if (request()->ajax()) {

            $message = Message::find($request->id);
            if ($message->important == 0) {
                $message->update(['important' => 1]);
            } else {
                $message->update(['important' => 0]);
            }
            return view('student.messages.ajax._star', compact('message'));

        } else {
            abort(500, 'Sorry Problem in server please try again');
        }
    }

    public function update($semester, $users, $id, Request $request)
    {

        if (request()->has('receive_user_id')) {
            $data = $this->validate($request, [
                'receive_user_id' => 'required',
                'subject' => 'required|string|max:255',
                'content' => 'required',
            ]);
        } else {
            $data = $this->validate($request, [
                'subject' => 'required|string|max:255',
                'content' => 'required',
            ]);
        }
        Message::where('id', $id)->update(
            [
                'receive_user' => $users,
                'receive_user_id' => $request->receive_user_id,
                'subject' => $request->subject,
                'content' => $request->content,
            ]
        );
        session()->flash('success', __('site.message_successfully'));
        return redirect()->route('student.messages.index', [$semester, $users]);
    }

    public function upload_message_file(Request $request, $id)
    {
        if (request()->has('message_replay_id')) {
            if (request()->hasFile('file')) {
                $fid = up()->upload([
                    'file' => 'file',
                    'path' => 'messages/files',
                    'upload_type' => 'files',
                    'file_type' => 'messages',
                    'relation_id' => $request->message_replay_id,
                ]);
                return response(['status' => true, 'id' => $fid], 200);
            } else {
                return response()->json('error', 400);
            }
        } else {
            if (request()->hasFile('file')) {
                $fid = up()->upload([
                    'file' => 'file',
                    'path' => 'messages/files',
                    'upload_type' => 'files',
                    'file_type' => 'messages',
                    'relation_id' => $id,
                ]);
                return response(['status' => true, 'id' => $fid], 200);
            } else {
                return response()->json('error', 400);
            }
        }
    }

    public function delete_message_file()
    {
        if (request()->has('id')) {
            return up()->delete(request('id'));
        }
    }

    public function destroy($id)
    {
        $files = File::where('file_type', 'messages')->where('relation_id', $id)->get();
        if (!empty($files)) {
            foreach ($files as $file) {
                $file->delete();
                Storage::delete($file->full_file);
            }
        }
        Message::destroy($id);
        session()->flash('success', __('site.message_delete_successfully'));
        return redirect()->route('instructor.messages.sent');
    }
}
