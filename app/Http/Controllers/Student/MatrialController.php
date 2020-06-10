<?php

namespace App\Http\Controllers\Student;

use App\Assignment;
use App\Cource;
use App\CourceWeek;
use App\File;
use App\Http\Controllers\Controller;
use App\Matriel;
use App\MatrielData;
use Illuminate\Support\Facades\Response;

class MatrialController extends Controller
{
    public function index($semester)
    {
        if ($semester == 'first-semester') {
            $cources = Cource::where('semester', 1)->with('instructor')->get();

            return view('student.matrials.index', compact('semester', 'cources'));

        } elseif ($semester == 'second-semester') {
            $cources = Cource::where('semester', 2)->with('instructor')->get();
            return view('student.matrials.index', compact('semester', 'cources'));

        } else {
            return view('student.404');
        }
    }
    public function weeks($semester, $cource)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {
            $cource_data = Cource::find($cource);
            $weeks = CourceWeek::all();
            if (!empty($cource_data)) {
                return view('student.matrials.weeks', compact('semester', 'cource_data', 'weeks'));
            } else {
                return view('student.404');
            }
        } else {
            return view('student.404');
        }
    }
    public function matrial_data($semester, $cource, $week)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {

            $matrial_lecture = Matriel::where('cource_id', $cource)
                ->where('week_id', $week)
                ->where('type', 'lecture')
                ->with('user')
                ->first();

            $matrial_section = Matriel::where('cource_id', $cource)
                ->where('week_id', $week)
                ->where('type', 'section')
                ->with('user')
                ->first();

            $assignment_lectures = Assignment::where('cource_id', $cource)
                ->where('week_id', $week)
                ->where('type', 'lecture')
                ->with('user')
                ->get();

            $assignment_sections = Assignment::where('cource_id', $cource)
                ->where('week_id', $week)
                ->where('type', 'section')
                ->with('user')
                ->get();

            if (!empty($matrial_section)) {
                $sections = MatrielData::where('matriel_id', $matrial_section->id)->get();
            } else {
                $sections = null;
            }
            if (!empty($matrial_lecture)) {
                $lectures = MatrielData::where('matriel_id', $matrial_lecture->id)->get();
            } else {
                $lectures = null;
            }

            return view('student.matrials.cource_data', compact(
                'week',
                'semester',
                'matrial_lecture',
                'matrial_section',
                'lectures',
                'sections',
                'assignment_lectures',
                'assignment_sections'
            ));

        } else {
            return view('student.404');

        }
    }

    public function preview($id)
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
}
