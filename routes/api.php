<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TodosController;
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

//route group middleware auth:sanctum


Route::post('/register',[Authcontroller::class,'register']);
Route::post('/login',[Authcontroller::class,'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/me',[Authcontroller::class,'me']);
    Route::post('/logout',[Authcontroller::class,'logout']);



    Route::post('/addCategories', [CategoriesController::class, 'create']);
    Route::get('/categories/{id}', [CategoriesController::class, 'getCategoryById']);
    Route::get('/categories', [CategoriesController::class, 'getAll']);


    Route::post('/addTodos', [TodosController::class, 'createOnePost']);
    Route::get('/getalltodos', [TodosController::class, 'getAllTodos']);
    Route::post('/completed/{id}', [TodosController::class, 'completed']);
    Route::delete('/todo/deleted/{id}', [TodosController::class, 'deletedOneById']);
    Route::get("/dateasc", [TodosController::class, 'getByDateSortingAsc']);
    Route::get("/datedesc", [TodosController::class, 'getByDateSortingDesc']);
    Route::get("/prioritysort", [TodosController::class, 'getByPrioritySortingAsc']);
    Route::get("/filter/{user_id}", [TodosController::class, 'filterTasks']);


});



