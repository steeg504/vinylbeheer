<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Sitegroup extends Model
{
    protected $table = 'SITEGROUPS';
    protected $primaryKey = 'sitegroup_id';



    public function getFields()
    {
        return $this->hasMany('App\SingleField', 'sitegroup_id')->get();
    }

}
?>