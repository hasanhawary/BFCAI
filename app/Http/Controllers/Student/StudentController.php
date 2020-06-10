<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index($semester)
    {
        if ($semester == 'first-semester' or $semester == 'second-semester') {
            return view('student.semester', compact('semester'));
        } else {
            return view('student.404');

        }
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
