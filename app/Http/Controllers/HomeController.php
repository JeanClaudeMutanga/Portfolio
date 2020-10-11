<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;

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
        $messages = Messages::all();
        return view('home',compact('messages'));
    }
}
