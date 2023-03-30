<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;

class ModelingController extends Controller
{
    public function index()
    {
        return view('pages.modeling', ['title' => 'Modeling']);
    }

    public function getTableData(Request $request)
    {
        $dataOption = $request->input('buttonValue');

        // Fetch the table data based on the data option
        if (
            $dataOption === 'base_clean_train_evaluation' || $dataOption === 'base_clean_test_evaluation' ||
            $dataOption === 'base_stem_train_evaluation' || $dataOption === 'base_stem_test_evaluation' ||
            $dataOption === 'tuned_clean_train_evaluation' || $dataOption === 'tuned_clean_test_evaluation' ||
            $dataOption === 'tuned_stem_train_evaluation' || $dataOption === 'tuned_stem_test_evaluation'
        ) {
            $tableData = DB::table($dataOption)->get();
            $title = "Modeling";
            return view('pages.modeling')->with(compact('title', 'tableData'));
        } else {
            return response()->json([
                'error' => 'Invalid data option selected'
            ], 400);
        }

        // Return the table data as a JSON response
        // return response()->json(['table_data' => $tableData]);
    }
}
