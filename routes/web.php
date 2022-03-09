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
})->middleware('auth');


Route::get('/chats', function () {
    return view('chat.chat');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', function() {
    $user = User::findOrFail(auth()->id());
    return view('dashboard', compact(['user']));
})->name('dashboard')->middleware('auth');


Route::get('projects', function() {
    $user = User::findOrFail(auth()->id());
    return view('projects.index', compact(['user']));
})->name('projects.index')->middleware('auth');


Route::get('projects/suggested', function () {
    $user = User::findOrFail(auth()->id());
    return view('projects.suggested', compact(['user']));
})->name('projects.suggested');

Route::get('users/suggested', function () {
    $user = User::findOrFail(auth()->id());
    return view('users.suggested', compact(['user']));
})->name('users.suggested');

Route::get('profile', function (){
    $user = User::findOrFail(auth()->id());
Route::get('profile/{user_id}', function ($user_id){
    $user = User::findOrFail($user_id);
    return view('profile.index', compact(['user']));
})->name('profile.index')->middleware('auth');
