<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/read', function(){
    $user = User::findOrFail(1);
    return dd($user->role);
});

Route::get('/admin', function(){
    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('/admin/users', 'App\Http\Controllers\AdminUsersController'); 
    Route::resource('/admin/posts', 'App\Http\Controllers\AdminPostsController'); 

});
