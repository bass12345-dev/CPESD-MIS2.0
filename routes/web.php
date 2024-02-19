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


Route::get('/dts', [App\Http\Controllers\dts\auth\AuthController::class, 'index'])->middleware(['UsersCheck']);
Route::get('/watchlisted', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'index'])->middleware(['WatchLoginCheck']);

//ADMIN ROUTES//
Route::middleware(['SessionGuard','IsAdmin'])->prefix('dts/admin')->group(function  () {
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

    //Manage Users
    Route::post('/c-u-s', [App\Http\Controllers\dts\admin\ManageUsersController::class, 'change_user_status']);
    
}); 



//USER ROUTES//
Route::middleware(['SessionGuard'])->prefix('dts/user')->group(function  () {
    Route::get('/dashboard', [App\Http\Controllers\dts\user\DashboardController::class, 'index']);  
    Route::get('/my-documents', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'index']);
    Route::get('/add-document', [App\Http\Controllers\dts\user\AddDocumentController::class, 'index']);
    Route::get('/incoming', [App\Http\Controllers\dts\user\IncomingController::class, 'index']);
    Route::get('/received', [App\Http\Controllers\dts\user\ReceivedController::class, 'index']);
    Route::get('/forwarded', [App\Http\Controllers\dts\user\ForwardedController::class, 'index']);
    Route::get('/view', [App\Http\Controllers\dts\user\ViewDocumentController::class, 'index']);
    Route::get('/track', function () {
     $data['title'] = 'Search';
     return view('dts.users.contents.search.search')->with($data);
    });
}); 

//USER ACTIONS//
Route::prefix('dts/us/')->group(function  () {
    
    //My Documents
    Route::post('/update-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'update']);
    Route::post('/delete-my-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'delete']);
    Route::post('/add-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'store']);

    Route::post('/receive-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'receive']);
    Route::post('/forward-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'forward']);
    

    
}); 



//WATCHLISTED ROUTES//
Route::middleware(['WatchAdminCheck'])->prefix('watchlisted/admin')->group(function  () {
    Route::get('/dashboard', [App\Http\Controllers\watchlisted\admin\DashboardController::class, 'index']);
    Route::get('/list', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'index']);  
    Route::get('/restore', [App\Http\Controllers\watchlisted\admin\RestoreListController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\watchlisted\admin\AddWatchController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\watchlisted\admin\SearchController::class, 'index']);
    Route::get('/manage-program', [App\Http\Controllers\watchlisted\admin\ManageProgramController::class, 'index']);
    Route::get('/change-code', [App\Http\Controllers\watchlisted\admin\ChangeSecurityController::class, 'index']);
    Route::get('/view_profile', [App\Http\Controllers\watchlisted\admin\ViewProfileController::class, 'index']);
}); 

//WATCHLISTED ACTIONS//
Route::prefix('wl')->group(function  () {

    

    //Dashboard
    Route::get('/data-per-barangay', [App\Http\Controllers\watchlisted\admin\DashboardController::class, 'data_per_barangay']); 

    //Remove List
    Route::post('/ch-stat', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'change_status']); 
    Route::post('/delete', [App\Http\Controllers\watchlisted\admin\RestoreListController::class, 'delete']); 

    //Add List
    Route::post('/add', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'store']); 

    //Search
    Route::post('/search-query', [App\Http\Controllers\watchlisted\admin\SearchController::class, 'search']); 

    //Programs
    Route::post('/add-program', [App\Http\Controllers\watchlisted\admin\ManageProgramController::class, 'store']); 
    Route::post('/delete-program', [App\Http\Controllers\watchlisted\admin\ManageProgramController::class, 'delete']);
    Route::post('/update-program', [App\Http\Controllers\watchlisted\admin\ManageProgramController::class, 'update']);

    //Records
    Route::post('/add-record', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'add_record']);
    Route::post('/update-record', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'update_record']);
    Route::post('/delete-record', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'delete_record']);
    Route::post('/s-p-p', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'save_record_program']);

    //Change Code
    Route::post('/change-code', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'change_code']);

}); 
Route::post('/v-u', [App\Http\Controllers\dts\auth\AuthController::class, 'verify_user']);
Route::post('/v-c', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'verify_code']);

Route::get('/dts_logout', [App\Http\Controllers\dts\auth\AuthController::class, 'dts_logout']);
Route::get('/wl_logout', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'wl_logout']);