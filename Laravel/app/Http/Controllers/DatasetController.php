<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    public function index()
    {
        $clean_data_samples = DB::table('clean_data_samples')->get();
        $stem_data_samples = DB::table('stem_data_samples')->get();

        return view('pages.dataset', [
            "title" => "Dataset",
            'clean_data_samples' => $clean_data_samples,
            'stem_data_samples' => $stem_data_samples
        ]);
    }
}
