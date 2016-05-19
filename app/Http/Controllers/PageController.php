<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function getPage($name = "sitegroups")
    {
        //Session::flush();
        if (view()->exists('pages.' . $name)) {
            return view('pages.' . $name)->with('name',self::getTitle($name));
        }else{
            return redirect('home');
        }




    }

    public function getTitle($name = ""){
        $pages =array();
        $pages['profile'] = "Profiel";
        if(isset($pages[$name])){
            return $pages[$name];
        }else{
            return "Titel aanmaken voor :".$name;
        }

    }
}
