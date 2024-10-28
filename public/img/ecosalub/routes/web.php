<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VuesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/construction', [ConstructionController::class, 'showConstruction'])->name('construction');
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/entreprise', [VuesController::class, 'showEntreprise'])->name('entreprise');

// Separate login forms for users and admins
Route::get('user/login', [UserController::class, 'showUserLoginForm'])->name('user.login');
Route::post('user/login', [UserController::class, 'handleUserLogin'])->name('user.login.submit');

Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'handleAdminLogin'])->name('admin.login.submit');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth');

Route::get('/login', function () {
    if (request()->is('admin/*')) {
        // Redirect to the admin login page if trying to access admin routes
        return redirect()->route('admin.login');
    }

    // Default to user login if accessing other parts of the site
    return redirect()->route('user.login');
})->name('login');

// Equipement
Route::get('/equipement', [EquipementController::class, 'showEquipements'])->name('equipement');
Route::get('/equipement/aspirateur', [EquipementController::class, 'showAspirateur'])->name('equipement.aspirateur');
Route::get('/equipement/balai-mecanique', [EquipementController::class, 'showBalaiMecanique'])->name('equipement.balai-mecanique');
Route::get('/equipement/decapeuse', [EquipementController::class, 'showDecapeuse'])->name('equipement.decapeuse');
Route::get('/equipement/extracteur-tapis', [EquipementController::class, 'showExtracteurTapis'])->name('equipement.extracteur-tapis');
Route::get('/equipement/machine-glace-seche', [EquipementController::class, 'showMachineGlace'])->name('equipement.machine-glace-seche');
Route::get('/equipement/polisseuse-batteries', [EquipementController::class, 'showPolisseuseBatteries'])->name('equipement.polisseuse-batteries');
Route::get('/equipement/polisseuse-propane', [EquipementController::class, 'showPolisseusePropane'])->name('equipement.polisseuse-propane');
Route::get('/equipement/recureuse', [EquipementController::class, 'showRecureuse'])->name('equipement.recureuse');

// Equipment admin section
Route::get('/admin/equipements/{type}', [EquipementController::class, 'showEquipement'])->name('equipement.show');
Route::get('/admin/equipement/{type}/{id}/edit', [EquipementController::class, 'edit'])->name('equipement.edit');
Route::put('/admin/equipement/{type}/{id}', [EquipementController::class, 'update'])->name('equipement.update');
Route::delete('/admin/equipements/{type}/{id}', [EquipementController::class, 'destroy'])->name('equipement.destroy');
Route::get('/equipement/{type}/create', [EquipementController::class, 'create'])->name('equipement.create');
Route::post('/equipement/{type}/store', [EquipementController::class, 'store'])->name('equipement.store');
Route::post('/equipement/{type}/store', [EquipementController::class, 'store'])->name('equipement.store');
    // Route to delete an image
    Route::delete('/admin/equipement/{type}/image/{id}', [EquipementController::class, 'destroyImage'])->name('equipement.image.destroy');

    // Route to delete a document
    Route::delete('/admin/equipement/{type}/document/{id}', [EquipementController::class, 'destroyDocument'])->name('equipement.document.destroy');

