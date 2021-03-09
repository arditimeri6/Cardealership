<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function changePasswordView()
    {
        return view('changePassword');
    }

    public function changePassword()
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation'))
        {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return redirect('/admin/changePassword')->with('successChange', 'Password was changed successfully');
        } else {
            return redirect('/admin/changePassword')->with('errorChange', 'Password was not changed. Please try again!');
        }
    }
}
