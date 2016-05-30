<?php

namespace App;

use App\Http\Controllers\CustomFieldController;
use Illuminate\Database\Eloquent\Model;

class SingleField extends Model
{
    protected $table = 'SINGLE_fields';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sitegroup_id', 'name','type','sequence'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function showHTML(){
        return CustomFieldController::showHTML($this);
    }

}
