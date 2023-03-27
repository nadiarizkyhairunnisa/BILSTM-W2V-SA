<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    public function index()
    {
        $clean_data_samples = DB::table('clean_data_samples')->get();
        // dd($clean_data_samples);    
        return view('pages.dataset', ["title" => "Dataset", 'clean_data_samples' => $clean_data_samples]);
    }
}
