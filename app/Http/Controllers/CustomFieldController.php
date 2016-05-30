<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class CustomFieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    static function showHTML($field)
    {
        switch ($field->type) {
            case 'text':
                return view('customFields.text')->with('field', $field);
                break;
            case 'price':
                return view('customFields.price')->with('field', $field);
                break;
            default:
                throw new Exception("Type veld wordt niet gevonden! '".$field->type."'");
        }
    }


}
