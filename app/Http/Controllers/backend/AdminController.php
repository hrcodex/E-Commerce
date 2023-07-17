<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\HellowMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;




class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //admin Dashboard Index
    public function admin()
    {
        $user = User::where('phone', 1)->get();
        return view('backend.dashboard.index', ['user' => $user]);
    }

    //Sent an email using email variable
    public function email()
    {

        $email = 'goolhr25@gmail.com';
        Mail::to($email)->send(new HellowMail());

        return redirect()->back();
    }

    //Sent an email using users email Dynamic
    public function sent($email)
    {
        Mail::to($email)->send(new HellowMail());

        return redirect()->back();
    }

    //admin custom logout
    public function logout(Request $request)
    {

        // Auth::logout();




        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array('messege' => 'You are logged out!', 'alert-type' => 'success');

        return redirect()->route('admin.login')->with($notification);
    }
}
