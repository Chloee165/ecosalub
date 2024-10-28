<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
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

        // Attempt to log in the admin using the 'admin' guard
        if (Auth::guard('admin')->attempt(['courriel' => $request->courriel, 'password' => $request->mot_de_passe])) {
            // Redirect to admin index after successful login
            return redirect()->route('admin.index')->with('success', 'Connexion admin réussie!');
        }

        // Redirect back if login fails
        return back()->withErrors(['courriel' => 'Identifiants incorrects.'])->withInput();
    }

    public function setStoragePermissions()
{
    $directoryPath = storage_path('app/public');
    
    // Set directory permissions
    chmod($directoryPath, 0755);

    // Recursively set permissions for files and subdirectories
    $files = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($directoryPath),
        \RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $file) {
        if ($file->isDir()) {
            chmod($file->getRealPath(), 0755); // Directories
        } else {
            chmod($file->getRealPath(), 0644); // Files
        }
    }

    return "Permissions set for storage/app/public!";
}
}
