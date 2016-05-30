<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    protected $table = 'SINGLES';
    protected $primaryKey = 'single_id';


    public function getArtists()
    {
        return $this->belongsToMany('App\Artist', 'SINGLE_artists')->get();
    }




}

?>