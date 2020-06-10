<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuetionBankController extends Controller
{
    public function index()
    {
        $title = trans('site.QuetionBank');
        return view('Instructor.QuetionBank.index', compact('title'));
    }
}
