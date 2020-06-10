<?php

namespace App\Http\Controllers\Student;

use App\Announcment;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function index($semester)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {

            $announcments = Announcment::where('receive_user', 'students')->with('user')->get();

            return view('student.announcments.index', compact('semester', 'announcments'));

        } else {
            return view('student.404');
        }
    }
}
