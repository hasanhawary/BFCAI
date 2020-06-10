<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function index()
    {
        $title = trans('site.my_profile');
        $user = instructor();
        return view('Instructor.Profile.index', compact('user', 'title'));
    }

    public function update(Request $request, $id)
    {
        Instructor::where('id', $id)->first();
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'sometimes|nullable',
            'phone' => 'sometimes|nullable|min:9',
            'image' => 'sometimes|nullable|image',
        ]);

        $request_data = $request->except(['image', '_token', '_method']);

        if ($request->hasFile('image')) {
            $request_data['image'] = up()->upload([
                'file' => 'image',
                'path' => 'instructors/profile',
                'upload_type' => 'single',
                'delete_file' => Instructor::find($id)->image,
            ]);
        }

        Instructor::where('id', $id)->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();
    }
}
