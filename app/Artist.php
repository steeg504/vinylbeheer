<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'ARTISTS';
    protected $primaryKey = 'artist_id';

    public function getSingles()
    {
        return $this->belongsToMany('App\Single', 'SINGLE_artists')->get();
    }
}

?>