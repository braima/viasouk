<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.cities'); // Ensure this view exists
    }
}
