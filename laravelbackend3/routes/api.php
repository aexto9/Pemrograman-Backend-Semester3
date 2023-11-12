<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\COntrollers\StudentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //method get
// Route::get('/animals',function(){
//     return "menampilkan seluruh data animal";
// });

// //method put
// Route::put('/animals/{id}',function(){
//     return "mengupdate data hewan id $id";
// });

// //method post
// Route::post('/animals/{id}',function(){
//     return "mengipload data hewan id";
// });

// //method delete
// Route::delete('/animals/{id}',function(){
//     return "menghapus data hewan id $id";
// });

//controller
//method get
Route::get('/animals',[AnimalController::class, 'index']);

//method put
Route::get('/animals/{id}',[AnimalController::class, 'update']);

//method post
Route::get('/animals',[AnimalController::class, 'store']);

//method delete
Route::get('/animals/{id}',[AnimalController::class, 'destroy']);

// Pertemuan ke-5

// method get
Route::get('/students',[StudentController::class,'index']);

// method post
Route::post('/students',[StudentController::class,'store'])->middleware('auth:sanctum');

//method put
Route::put('/students/{id}',[StudentController::class,'update'])->middleware('auth:sanctum');

// method delete
Route::delete('/students/{id}',[StudentController::class,'destroy'])->middleware('auth:sanctum');

//method show
Route::get('/students/{id}',[StudentController::class,'show']);

//auth
Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);