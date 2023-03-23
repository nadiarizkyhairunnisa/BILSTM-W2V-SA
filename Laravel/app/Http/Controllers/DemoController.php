<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Http;
use Termwind\Components\Dd;

class DemoController extends Controller
{
    public function index()
    {
        return view('pages.demo', ["title" => "Demo"]);
    }

    public function getData(Request $request)
    {
        // Set the API URL and data to be sent
        $apiUrl = 'http://127.0.0.1:5000/demo';
        $postData = [
            'ulasan' => $request->ulasan,
            'preproc' => $request->radioPreproc,
            'model' => $request->radioModel,
        ];
        $formData = http_build_query($postData);
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        // Send the POST request to the API and get the response
        $client = HttpClient::create();
        $response = $client->request('POST', $apiUrl, [
            'headers' => $headers,
            'body' => $formData,
        ]);
        // Get the response content
        $content = json_decode($response->getContent());
        $title = "Demo";
        return view('pages.demo')->with(compact('content', 'title'));
        // return view('pages.demo', compact('contentJSON', 'title'));
        // return response()->json($contentJSON);
    }
}

        // // Get the HTML markup for the view
        // $html = $view->render();

        // // Return the HTML markup as a response
        // return $html;


        // $data = [
        //     "title" => "Demo",
        //     "model" => $contentJSON->model,
        //     "preproc" => $contentJSON->preproc,
        //     "result" => $contentJSON->result,
        //     "ulasan" => $contentJSON->ulasan,
        // ];

        // Return the response content
        // return response($content);

        // return view('pages.demo')->with([
        //     "title" => "Demo",
        //     "model" => $contentJSON->model,
        //     "preproc" => $contentJSON->preproc,
        //     "result" => $contentJSON->result,
        //     "ulasan" => $contentJSON->ulasan,
        // ]);
