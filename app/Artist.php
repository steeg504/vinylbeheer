<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Single extends Model
{
    protected $table = 'SINGLES';
    protected $primaryKey = 'single_id';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the singles
        $singles = Single::all();
        $singles = Single::where('sitegroup_id', 1);

        // load the view and pass the singles
        return view('singles.index')->with('singles', $singles);
    }
}

?>