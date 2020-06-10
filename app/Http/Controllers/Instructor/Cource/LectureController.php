<?php
namespace App\Http\Controllers\Instructor\Cource;

use App\Assignment;
use App\Cource;
use App\CourceWeek;
use App\File;
use App\Http\Controllers\Controller;
use App\Matriel;
use App\MatrielData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
{
    public function index(Cource $cource)
    {
        $lectures = MatrielData::all();
        foreach ($lectures as $lecture) {
            if (!empty($lecture->name)) {
                continue;
            } else {
                MatrielData::find($lecture->id)->delete();
            }
        }
        $assignemnts = Assignment::all();
        foreach ($assignemnts as $assignment) {
            if (!empty($assignment->name)) {
                continue;
            } else {
                Assignment::find($assignment->id)->delete();
            }
        }
        $title = trans('site.lectures');
        $weeks = CourceWeek::all();
        return view('Instructor.cources.lectures.index', compact('cource', 'weeks', 'title'));
    }
    public function load_lecture(Request $request)
    {
        if (request()->ajax()) {
            if (request()->has('cource_id') and request()->has('week') and request()->has('type_lec')) {
                if ($request->week != 'test' and $request->type_lec != 'test') {
                    if ($request->type_lec == 'assignment') {
                        $lecture_data = Assignment::where('cource_id', $request->cource_id)
                            ->where('week_id', $request->week)
                            ->where('instructor_id', instructor()->id)
                            ->where('type', 'lecture')->first();

                        if ($lecture_data != null) {
                            $lecture_data = Assignment::where('cource_id', $request->cource_id)
                                ->where('week_id', $request->week)
                                ->where('instructor_id', instructor()->id)
                                ->where('type', 'lecture')->with('files')->get();
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
                                               3
                                </div>';
                        }
                    } else {
                        $lecture = Matriel::where('cource_id', $request->cource_id)
                            ->where('week_id', $request->week)
                            ->where('instructor_id', instructor()->id)
                            ->where('type', 'lecture')->first();
                        if ($lecture != null) {
                            if ($request->type_lec == 'all_type') {
                                $lecture_data = MatrielData::where('matriel_id', $lecture->id)->with('files')->get();
                                $cource_id = $request->cource_id;
                                $type_lec = 'document';
                                $week_id = $request->week;
                                return view('Instructor.cources.lectures.ajax.lecture', compact('lecture_data', 'cource_id', 'type_lec', 'week_id'));
                            } else {
                                $lecture_data = MatrielData::where('matriel_id', $lecture->id)
                                    ->where('type', $request->type_lec)->with('files')->get();
                                $cource_id = $request->cource_id;
                                $type_lec = $request->type_lec;
                                $week_id = $request->week;
                                return view('Instructor.cources.lectures.ajax.lecture', compact('lecture_data', 'cource_id', 'type_lec', 'week_id'));
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
                                                    <h7>' . trans('site.not_lectures_uploaded_yet') . '<a href="' . route('instructor.lecture.create', ['cource' => $request->cource_id, 'week' => $request->week, 'type' => $request->type_lec]) . '" class="alert-link text-white">' . trans('site.click_her_if_you_need_to_upload') . '</a></h7>
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
                                            <h7>  ' . trans('site.please_make_sure_to_choose_the_appropriate_week_and_type.') . '</h7>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
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
                                    <div class="alert bg-info alert-info text-white d-inline-block my-3" role="alert">
                                        <h7>  ' . trans('site.please_make_sure_to_choose_the_appropriate_week_and_type.') . '</h7>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
    public function create($cource, $week, $type)
    {
        $position = 'lecture';
        if ($type == "assignment") {
            $assignment = Assignment::create([
                'week_id' => $week,
                'cource_id' => $cource,
                'instructor_id' => instructor()->id,
                'type' => $position,
            ]);
            return redirect(route("instructor.lecture.edit", [$assignment->id, $type]));
        } else {
            $lecture = Matriel::where('cource_id', $cource)
                ->where('week_id', $week)
                ->where('instructor_id', instructor()->id)
                ->where('type', $position)->first();
            if ($lecture != null) {
                $lecture_data = MatrielData::create([
                    'type' => $type,
                    'matriel_id' => $lecture->id,
                ]);
                return redirect(route("instructor.lecture.edit", [$lecture_data->id, $type]));
            } else {
                $new_lecture = Matriel::create([
                    'week_id' => $week,
                    'cource_id' => $cource,
                    'instructor_id' => instructor()->id,
                    'type' => $position,
                ]);
                $lecture_data = MatrielData::create([
                    'type' => $type,
                    'matriel_id' => $new_lecture->id,
                ]);
                return redirect(route("instructor.lecture.edit", [$lecture_data->id, $type]));

            }
        }
    }

    public function edit($id, $type)
    {
        if ($type == 'assignment') {
            $assignment = Assignment::find($id);
            $title = trans('site.create_assignment');
            return view('Instructor.cources.lectures.edit_assignment', compact('title', 'assignment'));
        } else {
            $lecture = MatrielData::find($id);
            $title = trans('site.create_lecture');
            return view('Instructor.cources.lectures.edit', compact('title', 'lecture'));
        }
    }

    public function update($id, Request $request)
    {
        if ($request->type == 'assignment') {

            $assignment = Assignment::find($id);
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'description' => 'sometimes|nullable|string',
            ]);
            $request_data = $request->except(['_token']);
            Assignment::where('id', $id)->update([
                'name' => $request_data['name'],
                'description' => $request_data['description'],
            ]);
            return redirect(iurl('cources/' . $assignment->cource_id . '/lectures'));

        } else {
            $matrial = Matriel::where('id', $request->matrial_id)->first();
            $lecture = MatrielData::find($id);
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'description' => 'sometimes|nullable|string',
            ]);

            $request_data = $request->except(['_token']);
            MatrielData::where('id', $id)->update([
                'name' => $request_data['name'],
                'description' => $request_data['description'],
            ]);
            return redirect(iurl('cources/' . $matrial->cource_id . '/lectures'));

        }

        session()->flash('success', __('site.updated_successfully'));

    }

    public function upload_lecture_file(Request $request, $id, $type)
    {
        if ($type == 'assignment') {
            $file_type = 'assignments';
        } else {
            $file_type = 'lectures';
        }
        if (request()->hasFile('file')) {
            $fid = up()->upload([
                'file' => 'file',
                'path' => 'instructors/cources/lecture/' . $type,
                'upload_type' => 'files',
                'file_type' => $file_type,
                'relation_id' => $id,
            ]);
            return response(['status' => true, 'id' => $fid], 200);
        } else {
            return response()->json('error', 400);
        }

    }

    public function delete_lecture_file()
    {
        if (request()->has('id')) {
            return up()->delete(request('id'));
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

    public function destroy($id)
    {
        $lecture = MatrielData::find($id);
        $lecture->delete();
        Storage::delete($lecture->content);
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->back();
    }
}
