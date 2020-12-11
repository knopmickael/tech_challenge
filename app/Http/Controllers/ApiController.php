<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function call()
    {
        $response = Http::get('https://economia.awesomeapi.com.br/all');

        // echo $response->body();
        // print_r($response->json());
        // echo $response->status();
        // echo $response->ok();
        // echo $response->successful();
        // echo $response->failed();
        // echo $response->serverError();
        // echo $response->clientError();
        // echo $response->header($header);
        // echo $response->headers();

        return view('index', [
            "moedas" => $response->json()
        ]);

        // print_r($response->json());

        // dd($response);

        // print_r($response->json());

        // if($response->status()==='200')
        // {
        //     $response->status();
        // } elseif($response->status()==='404') {
        //     $response->status();
        // } else {
        //     $response->status();
        // }

    }
}
