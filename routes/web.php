<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/name', [NameController::class, 'index'])->middleware('auth');

Route::get('/', [NameController::class, 'hellow'])->middleware('auth');

//Route::get('/', function() {
    //return view('users.name');
//});

Route::get('/names/{name}/edit', [NameController::class, 'edit'])->middleware('auth');

Route::put('/names/{name}', [NameController::class, 'update'])->middleware('auth');



require __DIR__.'/auth.php';