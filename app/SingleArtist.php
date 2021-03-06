<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleArtist extends Model
{
    protected $table = 'SINGLE_artists';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'single_id', 'artist_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function RemoveBySingleId($single_id){
        $singleArtist = SingleArtist::where('single_id', $single_id);
        $singleArtist->delete();
    }

    public function RemoveByArtistId($artist_id){
        $singleArtists = SingleArtist::where('artist_id', $artist_id);
        foreach($singleArtists->get() as $singleArtist){
            $single = Single::find($singleArtist->single_id);
            $single->delete();
        }

        $singleArtists->delete();


    }

}
