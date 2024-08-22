<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodconfigurationController extends Controller
{
    public function index()
    {
        return view('food-configuration');
    }
}
