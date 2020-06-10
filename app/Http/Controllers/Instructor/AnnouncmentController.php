<?php

namespace App\Http\Controllers\Instructor;

use App\Announcment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncmentController extends Controller
{

    public function index()
    {
        $title = trans('site.announcment');
        return view('Instructor.announcments.index', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:5',
            'receive_user' => 'required|in:students,instructors',
        ]);
        $user_id = instructor()->id;
        $data = $request->except(['_token']);
        $data['user_id'] = $user_id;
        Announcment::create($data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();
    }

}
