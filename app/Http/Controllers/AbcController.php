<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abc;

class AbcController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('abc.index',[
            'md' => Abc::all()
        ]);
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $md = new Abc;
        $md->name = 'hello';
        $md->phone = '0987123123';
        $md->gender = 1;
        $md->save();
        echo "OK";
    }
}
