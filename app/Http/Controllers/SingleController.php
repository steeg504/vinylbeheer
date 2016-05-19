<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Requests;
use App\Single;
use App\SingleArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $artists = Artist::where('sitegroup_id', '=', Session::get('sitegroup')->sitegroup_id)->orderBy('name')->pluck('name', 'artist_id');
        return view('singles.create')->with('artists', $artists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        $rules = array(
            'sideA' => 'required',
            'sideB' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('singles/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $single = new Single();
            $single->sitegroup_id = Session::get('sitegroup')->sitegroup_id;
            $single->sideA = Input::get('sideA');
            $single->sideB = Input::get('sideB');
            $single->save();

            foreach(Input::get('artist') as $artist_id){
                $userArtist = new SingleArtist();
                $userArtist->single_id = $single->single_id;
                $userArtist->artist_id = $artist_id;
                $userArtist->save();
            }

            // redirect
            Session::flash('message', 'Single succesvol toegevoegd!');
            return Redirect::to('singles');
        }
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
        $singleModel = new Single();
        $single = Single::find($id);
        $artists = Artist::where('sitegroup_id', '=', Session::get('sitegroup')->sitegroup_id)->orderBy('name')->pluck('name', 'artist_id');
        $selected_artists = $singleModel->getArtists();
        return view('singles.edit')->with('single', $single)->with('artists', $artists,$selected_artists);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

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