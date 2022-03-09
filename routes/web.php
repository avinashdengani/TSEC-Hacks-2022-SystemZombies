<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/chats', function () {
    return view('chat.chat');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', function() {
    $user = User::findOrFail(auth()->id());
    return view('dashboard', compact(['user']));
})->name('dashboard');

Route::get('projects', function() {
    $user = User::findOrFail(auth()->id());
    return view('projects.index', compact(['user']));
})->name('projects.index');
