<?php

namespace App\Http\Controllers\Instructor;

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
    public function index()
    {
        $title = trans('site.sent_message');
        $messages = Message::orderBy('id', 'desc')
            ->where('receive_user', 'instructors')
            ->where('receive_user_id', instructor()->id)->get();

        $title = trans('site.message');
        return view('Instructor.messages.index', compact('title', 'messages'));
    }

    public function sent()
    {
        $title = trans('site.sent_message');
        $messages = Message::orderBy('id', 'desc')
            ->where('send_user', 'instructors')
            ->where('send_user_id', instructor()->id)->get();
        return view('Instructor.messages.create', compact('title', 'messages'));
    }

    public function create()
    {
        $message = Message::create([
            'send_user' => 'instructors',
            'send_user_id' => instructor()->id,
        ]);
        if (!empty($message)) {
            return redirect(iurl('messages/' . $message->id . '/edit'));
        }
    }

    public function show($id)
    {
        $title = trans('site.show_message');
        $message = Message::find($id);
        if ($message->send_user == 'students') {
            $user = User::where('id', $message->send_user_id)->first();
        } elseif ($message->send_user == 'instructors') {
            $user = Instructor::where('id', $message->send_user_id)->first();
        }

        return view('Instructor.messages.show', compact('title', 'message', 'user'));
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

    public function load_users(Request $request)
    {
        if (request()->ajax()) {
            if (request()->has('user_type')) {
                if ($request->user_type != 'instructors') {
                    $users = User::all();
                    return view('Instructor.messages.ajax._users', compact('users'));
                } elseif ($request->user_type != 'students') {
                    $users = Instructor::all();
                    return view('Instructor.messages.ajax._users', compact('users'));
                } else {
                    $users = Instructor::all();

                    return view('Instructor.messages.ajax._users', compact('users'));
                }
            }
        }
    }

    public function edit($id)
    {
        $message = Message::find($id);
        return view('Instructor.messages.edit', compact('message'));
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

    public function update($id, Request $request)
    {
        if (request()->has('receive_user') and request()->has('receive_user_id')) {
            $data = $this->validate($request, [
                'subject' => 'required|string|max:255',
                'receive_user' => 'required|string|min:2',
                'receive_user_id' => 'required',
                'content' => 'required',
            ]);
        } else {
            $data = $this->validate($request, [
                'subject' => 'required|string|max:255',
                'content' => 'required',
            ]);
        }

        Message::where('id', $id)->update($data);
        session()->flash('success', __('site.message_successfully'));
        return redirect()->route('instructor.messages.sent');
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
