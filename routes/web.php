<?php

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
    return view('welcome');
});


Route::get('/dts', [App\Http\Controllers\dts\auth\AuthController::class, 'index']);


//ADMIN ROUTES//
Route::prefix('dts/admin')->group(function  () {
    Route::get('/dashboard', [App\Http\Controllers\dts\admin\DashboardController::class, 'index']);
    Route::get('/all-documents', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'index']);
    Route::get('/offices', [App\Http\Controllers\dts\admin\OfficesController::class, 'index']);\
    Route::get('/doc-types', [App\Http\Controllers\dts\admin\DocTypesController::class, 'index']);
    Route::get('/final-actions', [App\Http\Controllers\dts\admin\FinalActionsController::class, 'index']);
    Route::get('/manage-users', [App\Http\Controllers\dts\admin\ManageUsersController::class, 'index']);
    Route::get('/view', [App\Http\Controllers\dts\admin\ViewDocumentController::class, 'index']);
}); 


//ADMIN ACTIONS//
Route::prefix('dts')->group(function  () {
    //Office
    Route::post('/add-office', [App\Http\Controllers\dts\admin\OfficesController::class, 'store']);
    Route::post('/update-office', [App\Http\Controllers\dts\admin\OfficesController::class, 'update']);
    Route::post('/delete-office', [App\Http\Controllers\dts\admin\OfficesController::class, 'delete']);

    //TYPES
    Route::post('/add-document-type', [App\Http\Controllers\dts\admin\DocTypesController::class, 'store']);
    Route::post('/update-type', [App\Http\Controllers\dts\admin\DocTypesController::class, 'update']);
    Route::post('/delete-type', [App\Http\Controllers\dts\admin\DocTypesController::class, 'delete']);

    //FINAL ACTIONS
    Route::post('/add-action', [App\Http\Controllers\dts\admin\FinalActionsController::class, 'store']);
    Route::post('/update-action', [App\Http\Controllers\dts\admin\FinalActionsController::class, 'update']);
    Route::post('/delete-action', [App\Http\Controllers\dts\admin\FinalActionsController::class, 'delete']);
    


}); 



//USER ROUTES//
Route::prefix('dts/user')->group(function  () {
    Route::get('/dashboard', [App\Http\Controllers\dts\user\DashboardController::class, 'index']);
    
    
}); 

Route::get('/dts_logout', [App\Http\Controllers\dts\auth\AuthController::class, 'dts_logout']);