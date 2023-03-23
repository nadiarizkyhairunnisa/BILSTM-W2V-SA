<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelingController extends Controller
{
    public function index()
    {
        return view('pages.modeling', ["title" => "Modeling"]);
    }
}
