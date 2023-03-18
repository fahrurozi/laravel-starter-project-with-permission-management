<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('dashboard.index');
});
Auth::routes();

Route::get('/dashboard', function () {
    // dd(Route::getCurrentRoute()->getName());
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    // Route::get('/', [IndexController::class, 'index'])->name('index');
    // Route::resource('/roles', RoleController::class);
    // Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    // Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    // Route::resource('/permissions', PermissionController::class);
    // Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    // Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    // Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    // Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    // Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    // Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});


Route::get('/home', 'HomeController@index')->name('home');
