<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\ReadController;
use Illuminate\Support\Facades\Route;


//Data Insert Route or Create Route
Route::get('/', [InsertController::class, 'index']);
Route::post('/addUsers', [ReadController::class, 'addUsers'])->name('usersStore');

 
//Data Read Route or List Route or Show Route or get Route
Route::get('/userList', [ReadController::class, 'userList'])->name('userList');


//Data Update Route or Edit Route
Route::get('/editUser/{id}', [EditController::class, 'editUser'])->name('editUser');
Route::post('/updateUser/{id}', [EditController::class, 'updateUser'])->name('updateUser');


//Data Delete Route or Destroy Route
Route::get('/deleteUser/{id}', [DeleteController::class, 'deleteId'])->name('deleteUser');