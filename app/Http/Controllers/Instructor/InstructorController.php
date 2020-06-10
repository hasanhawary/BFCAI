<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Instructor;

class InstructorController extends Controller
{

    public function index()
    {
        $title = trans('site.home');
        return view('Instructor.index', compact('title'));
    }
}
