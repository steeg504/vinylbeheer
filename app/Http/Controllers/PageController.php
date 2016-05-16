<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PageController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function getPage($name)
    {
        if (view()->exists('pages.' . $name)) {
            return view('pages.' . $name);
        }else{
            return redirect('home');
        }

    }
}
