<?php

namespace App\Http\Controllers\Student;

use App\Assignment;
use App\AssignmentResult;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AssignmentController extends Controller
{
    public function index($semester)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {

            $assignments = Assignment::with('files')->get();
            return view('student.assignment_result.index', compact('semester', 'assignments'));

        } else {
            return view('student.404');
        }
    }
    public function store(Request $request, $id)
    {

        $assignment = Assignment::where('id', $id)->first();
        $request_data = $request->except(['content', '_token', '_method']);
        if ($request->hasFile('content')) {
            $request_data['content'] = up()->upload([
                'file' => 'content',
                'path' => 'students/cources/lecture/assignment',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
        }

        AssignmentResult::create([
            'name' => $assignment->name,
            'assignment_id' => $id,
            'content' => $request_data['content'],
            'user_id' => student()->id,
            'type' => $assignment->type,
        ]);

        session()->flash('success', 'Assignemnt Sent Successfuly');
        return redirect()->back();
    }
    public function preview($id)
    {
        $assignment = File::where('id', $id)->first();
        $filename = $assignment->full_file;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            $headers = array(
                'Content-Type: ' . $assignment->mime_type . '',
            );
            return response()->file($path, $headers);
        } else {
            abort(404, 'File Not Found');
        }
    }

    public function download($id)
    {
        $assignment = File::where('id', $id)->first();
        $filename = $assignment->full_file;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            $headers = array(
                'Content-Type: ' . $assignment->mime_type . '',
            );
            return response()->download($path, $assignment->name, $headers);
        } else {
            abort(404, 'File Not Found');
        }
    }
}
