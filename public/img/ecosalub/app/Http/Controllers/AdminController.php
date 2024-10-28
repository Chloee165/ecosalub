<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    // Show admin login form
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    // Handle admin login
    public function handleAdminLogin(Request $request)
    {
        // Validate input
        $request->validate([
            'courriel' => 'required|email',
            'mot_de_passe' => 'required|string|min:8',
        ]);

        // Attempt to log in the admin using the admin guard
        if (Auth::guard('admin')->attempt(['courriel' => $request->courriel, 'password' => $request->mot_de_passe])) {
            return redirect()->route('admin.index')->with('success', 'Connexion admin réussie!');
        }

        // If login fails, redirect back with an error
        return back()->withErrors(['courriel' => 'Identifiants incorrects.'])->withInput();
    }
}
