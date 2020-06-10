<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;

class NotifactionController extends Controller
{
    public function index()
    {
        $title = trans('site.notifactions');
        return view('Instructor.notifactions.index', compact('title'));

    }
}
