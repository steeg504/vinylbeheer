<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Single;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SingleController extends Controller {

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the singles
        $singles = Single::where('sitegroup_id', '=', Session::get('sitegroup')->sitegroup_id)->get();
        // load the view and pass the nerds
        return view('singles.index')->with('singles', $singles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $artists = Artists::where('sitegroup_id', '=', Session::get('sitegroup')->sitegroup_id)->get();
        return view('singles.create')->with('singles', $singles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $single = Single::find($id);
        return view('singles.show')->with('single', $single);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $single = Single::find($id);
        return view('singles.edit')->with('single', $single);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $single = Single::find($id);
        $single->delete();

        // redirect
        Session::flash('message', 'De single is succesvol verwijderd!');
        return redirect('singles');
    }

}