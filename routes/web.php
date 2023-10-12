<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;
use App\Http\Controllers\MessageController;
use App\Events\MessageAdded;
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

Route::get('/index', [NameController::class, 'index'])->middleware('auth');

Route::get('/', [NameController::class, 'hellow'])->middleware('auth');

//Route::get('/', function() {
    //return view('users.name');
//});

Route::get('/names/{name}/edit', [NameController::class, 'edit'])->middleware('auth');

Route::put('/names/{name}', [NameController::class, 'update'])->middleware('auth');

Route::get('/match', [NameController::class, 'match'])->middleware('auth');

Route::get('/match/{name}/edit', [NameController::class, 'matchedit'])->middleware('auth');

Route::put('/match/{name}', [NameController::class, 'matchupdate'])->middleware('auth');

//Route::get('/message',[MessageController::class, 'message'])->middleware('auth');

//Route::get('/messages', function (){
    //$message = ["id" => 1, 'name' => 'メッセージ確認'];
    //event(new MessageAdded($message));
//});
Route::get('/messageroom', [MessageController::class, 'messageroom'])->middleware('auth');
Route::post('/newmessage', [MessageController::class, 'newmessage'])->middleware('auth');
Route::get('/allmessage', [MessageController::class, 'allmessage'])->middleware('auth');




require __DIR__.'/auth.php';