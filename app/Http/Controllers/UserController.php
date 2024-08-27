<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard'); // Ensure you have a user.dashboard.blade.php view
    }
}
