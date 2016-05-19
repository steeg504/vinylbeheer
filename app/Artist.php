<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'ARTISTS';
    protected $primaryKey = 'artist_id';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the singles
        $artists = Artist::where('sitegroup_id', 1);

        // load the view and pass the singles
        return view('singles.index')->with('artists', $artists);
    }
}

?>