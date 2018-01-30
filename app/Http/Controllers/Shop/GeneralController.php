<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function __construct()
    {

    }

    /**
     */
    public function index()
    {
        return view('kibanov/general');
//        return 'asdasd';
    }
}
