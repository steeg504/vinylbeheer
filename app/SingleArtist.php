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


}
