<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    protected $table = 'USERS';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSitegroups()
    {
        return $this->belongsToMany('App\Sitegroup', 'USER_sitegroups')->get();
    }

    public function mayBySitegroup($sitegroup_id=null){
        return (bool)$this->belongsToMany('App\Sitegroup', 'USER_sitegroups')->where('USER_sitegroups.sitegroup_id', '=', $sitegroup_id)->count();
    }
}
