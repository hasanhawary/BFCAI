<?php

namespace App\Http\Controllers\Instructor;

use App\Cource;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;

class CourceController extends Controller
{
    public function create()
    {
        $title = trans('site.add_course');
        return view('Instructor.cources.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'cource_code' => 'required|string|max:255',
            'image' => 'sometimes|nullable|' . v_image(),
            'description' => 'sometimes|nullable|string',
        ]);
        $request_data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $request_data['image'] = up()->upload([
                'file' => 'image',
                'path' => 'instructors/cources/photo',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);

        }
        $request_data['user_id'] = Instructor()->id;
        Cource::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();
    }

}
