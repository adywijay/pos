<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class Homepage_Controller extends Controller
{
    public function index()
    {
        return view('home', [
            "judul" => "Home"
        ]);
    }
}
