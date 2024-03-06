<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class SideNavController extends Controller
{

    // For Dashboard
    public function dashboard()
    {
        return view('Mainpage/dashboard');
    }

    public function messages()
    {
        
        return view('Mainpage/messages');
    }

    public function offboarding()
    {
        return view('Mainpage/offboarding');
    }

    public function termination()
    {

        return view('Mainpage/termination');

    }


    // For Signout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
