<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //child category page View
    public function index()
    {
        return view('backend.category.child_categories.index');
    }
}
