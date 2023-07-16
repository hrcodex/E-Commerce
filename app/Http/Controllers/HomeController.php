<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\HellowMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('frontend.user_profile.user_profile');
    }
    public function admin()
    {
        $user = User::where('phone', 1)->get();
        return view('backend.dashboard.index', ['user' => $user]);
    }
    public function email()
    {

        $email = 'goolhr25@gmail.com';
        Mail::to($email)->send(new HellowMail());

        return redirect()->back();
    }
    public function sent($email)
    {
        Mail::to($email)->send(new HellowMail());

        return redirect()->back();
    }
}
