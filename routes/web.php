<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/student','App\Http\Controllers\studentController@index')->name('student'); //เขียนได้เหมือนกัน @function

    Route::post('/student/add',[studentController::class,'addStudent'] )->name('studentAdd');// controller::class,'function'

    Route::get('/student/edit/{no}',[studentController::class,'editStudent'] )->name('studentEdit');

    Route::post('/student/update/{no}',[studentController::class,'updateStudent'] )->name('studentUpdate');

    Route::get('/student/delete/{no}',[studentController::class,'deleteStudent'] );
/*     Route::get('/students-list', function () {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }); */

});

