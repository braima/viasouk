<?php

namespace App\Http\Controllers;

use App\Models\Parameter; // Import the Parameter model
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    //
    public function index() // Add this method
    {
        // Logic to retrieve and return parameters
        // For example, you might fetch parameters from the database
        $parameters = Parameter::all(); // Fetch parameters from the database
        return view('admin.parameters', compact('parameters')); // This should match the file path
    }
}
