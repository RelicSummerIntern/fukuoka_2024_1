<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoreaderController extends Controller
{
    public function index()
    {
        return view('photo-reader');
    }
}
