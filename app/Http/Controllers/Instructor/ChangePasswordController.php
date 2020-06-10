<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $title = trans('site.change_password');
        $user = instructor();
        return view('Instructor.Profile.changePassword', compact('user', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = Instructor::where('id', $id)->first();

        $request->validate([
            'password_old' => 'required',
            'password' => ['required', 'confirmed', 'min:4'],
        ]);

        if (Hash::check($request->password_old, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password),
            ])->save();

            session()->flash('success', __('site.updated_successfully'));
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('Password old is incorrect');
        }
    }
}
