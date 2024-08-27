<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Ensure you have a login.blade.php view in resources/views/auth
    }

    public function login(Request $request) {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Redirect based on role
            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user instanceof \App\Models\Admin) {
            return redirect()->route('admin.dashboard'); // Redirect admin to the dashboard
        }
        return redirect()->intended($this->redirectTo); // Redirect other users
    }
}
