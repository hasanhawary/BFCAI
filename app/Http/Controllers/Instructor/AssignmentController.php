<?php

namespace App\Http\Controllers\Instructor;

use App\Assignment;
use App\AssignmentResult;
use App\Cource;
use App\CourceWeek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{

    public function index($id)
    {
        $title = trans('site.assignment_result');
        $weeks = CourceWeek::all();
        $cource = Cource::find($id);
        $instructor = instructor();
        return view('Instructor.assignment_result.index', compact('title', 'weeks', 'cource', 'instructor'));
    }

    public function load_assignment(Request $request)
    {
        // dd($request->all());
        if (request()->ajax()) {
            if (request()->has('cource_id') and request()->has('week') and request()->has('type') and request()->has('type')) {
                if ($request->week != 'test') {
                    if ($request->type == 'doctor' or $request->type == 'head') {
                        $assignments = Assignment::where('cource_id', $request->cource_id)
                            ->where('week_id', $request->week)
                            ->where('instructor_id', $request->instructor_id)
                            ->where('type', 'lecture')

                            ->with('ass_result')
                            ->get();
                        if ($assignments->first() != null) {

                            return view('Instructor.assignment_result.ajax.assignment', compact('assignments'));
                        } else {
                            return '
                                <div class="card listOfDataboxs">
                                    <div class="card-header">
                                        <h3> ' . trans('site.show_assignment_uploaded') . '</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body progress-task">
                                        <div class="dd" data-plugin="nestable">
                                            <div class="text-center">
                                                <div class="alert bg-danger alert-danger text-white d-inline-block my-3" role="alert">
                                                    <h7>' . trans('site.not_assignment_uploaded_yet') . '</a></h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }

                    } else {
                        $assignment = Assignment::where('cource_id', $request->cource_id)
                            ->where('week_id', $request->week)
                            ->where('instructor_id', $request->instructor_id)
                            ->where('type', 'section')
                            ->get();
                        dd($assignment);
                        if ($lecture_data != null) {
                            $lecture_data = Assignment::where('cource_id', $request->cource_id)
                                ->where('week_id', $request->week)
                                ->where('type', 'lecture')->get();
                            $cource_id = $request->cource_id;
                            $type_lec = $request->type_lec;
                            $week_id = $request->week;
                            return view('Instructor.cources.lectures.ajax.assignment', compact('lecture_data', 'cource_id', 'type_lec', 'week_id'));
                        } else {
                            return '
                                <div class="card listOfDataboxs">
                                    <div class="card-header">
                                        <h3> ' . trans('site.show_lecture_uploaded') . '</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body progress-task">
                                        <div class="dd" data-plugin="nestable">
                                            <div class="text-center">
                                                <div class="alert bg-danger alert-danger text-white d-inline-block my-3" role="alert">
                                                    <h7>' . trans('site.not_assignment_uploaded_yet') . '<a href="' . route('instructor.lecture.create', ['cource' => $request->cource_id, 'week' => $request->week, 'type' => $request->type_lec]) . '" class="alert-link text-white">' . trans('site.click_her_if_you_need_to_upload') . '</a></h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                } else {
                    return '
                        <div class="card listOfDataboxs">
                            <div class="card-header">
                                <h3> ' . trans('site.show_lecture_uploaded') . '</h3>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="ik ik-minus minimize-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body progress-task">
                                <div class="dd" data-plugin="nestable">
                                    <div class="text-center">
                                        <div class="alert bg-danger alert-danger text-white d-inline-block my-3" role="alert">
                                            <h7>  ' . trans('site.please_make_sure_to_choose_the_appropriate_week') . '</h7>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
        }
    }
    public function preview($id)
    {
        $assignment = AssignmentResult::where('id', $id)->first();
        $filename = $assignment->content;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            return response()->file($path);
        } else {
            abort(404, 'File Not Found');
        }
    }
    public function download($id)
    {
        $lecture = AssignmentResult::where('id', $id)->first();
        $filename = $lecture->content;
        $path = 'storage/' . $filename;
        if (file_exists($path)) {
            return Response::download($path, $lecture->name . '.pdf', $headers);
        } else {
            abort(404, 'File Not Found');
        }
    }

    public function store(Request $request)
    {
        foreach ($request->grade as $key => $value) {

            AssignmentResult::where('id', $key)->update(['grade' => $value]);
        }

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        $ass_result = AssignmentResult::find($id);
        $ass_result->delete();
        Storage::delete($ass_result->content);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->back();
    }
}
