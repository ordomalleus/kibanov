<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        return view('kibanov/general');
    }
}
