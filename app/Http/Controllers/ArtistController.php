<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Artist;
use App\Single;
use App\SingleArtist;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ArtistController extends Controller {

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
        $artists = Artist::where('sitegroup_id', '=', Session::get('sitegroup')->sitegroup_id)->get();
        // load the view and pass the nerds
        return view('artists.index')->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $artist = new Artist();
        return view('artists.create')->with('artist', $artist);
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
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('artists/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $artist = new Artist();
            $artist->sitegroup_id = Session::get('sitegroup')->sitegroup_id;
            $artist->name = Input::get('name');
            $artist->save();

            // redirect
            Session::flash('message', 'Artiest succesvol toegevoegd!');
            return Redirect::to('artists');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($artist_id)
    {
        $artist = Artist::find($artist_id);
        return view('artists.edit')->with('artist', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($artist_id)
    {
        // validate
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('artists/' . $artist_id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $artist = Artist::find($artist_id);
            $artist->sitegroup_id = Session::get('sitegroup')->sitegroup_id;
            $artist->name = Input::get('name');
            $artist->save();

            // redirect
            Session::flash('message', 'Artiest succesvol aangepast!');
            return Redirect::to('artists');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($artist_id)
    {
        // delete
        $artist = Artist::find($artist_id);
        $artist->delete();

        $SingleArtist = new SingleArtist();
        $SingleArtist->RemoveByArtistId($artist_id);

        // redirect
        Session::flash('message', 'De artiest is succesvol verwijderd!');
        return redirect('artists');
    }

}