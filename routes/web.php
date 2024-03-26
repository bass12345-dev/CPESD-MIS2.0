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

    return redirect('http://cpesd-infosys.wuaze.com/');
    // return view('welcome');
});


// Route::get('/dts/print/routing_slip', function () {
//     return view('dts/print/routing_slip');
// });

Route::get('/dts/print', [App\Http\Controllers\dts\auth\AuthController::class, 'print']);

Route::get('/dts/register', [App\Http\Controllers\dts\auth\AuthController::class, 'register']);

Route::get('/dts', [App\Http\Controllers\dts\auth\AuthController::class, 'index'])->middleware(['UsersCheck']);



// Route::get('/watchlisted', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'index'])->middleware(['WatchLoginCheck']);

//ADMIN ROUTES//
Route::middleware(['SessionGuard', 'IsAdmin'])->prefix('dts/admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\dts\admin\DashboardController::class, 'index']);
    Route::get('/all-documents', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'index']);
    Route::get('/offices', [App\Http\Controllers\dts\admin\OfficesController::class, 'index']);
    Route::get('/doc-types', [App\Http\Controllers\dts\admin\DocTypesController::class, 'index']);
    Route::get('/final-actions', [App\Http\Controllers\dts\admin\FinalActionsController::class, 'index']);
    Route::get('/manage-users', [App\Http\Controllers\dts\admin\ManageUsersController::class, 'index']);
    Route::get('/manage-staff', [App\Http\Controllers\dts\admin\SetReceiverController::class, 'index']);
    Route::get('/logged-in-history', [App\Http\Controllers\dts\admin\LoggedInHistoryController::class, 'index']);
    Route::get('/view', [App\Http\Controllers\dts\admin\ViewDocumentController::class, 'index']);
});


//ADMIN ACTIONS//
Route::middleware(['SessionGuard'])->prefix('dts')->group(function () {
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
    Route::post('/delete-user', [App\Http\Controllers\dts\admin\ManageUsersController::class, 'delete_user']);
    Route::post('/c-p-t-u', [App\Http\Controllers\dts\admin\ManageUsersController::class, 'change_p_t_u']);

    // Manage Staff
    Route::post('/u-r', [App\Http\Controllers\dts\admin\SetReceiverController::class, 'update_receiver']);
    Route::post('/u-oic', [App\Http\Controllers\dts\admin\SetReceiverController::class, 'update_oic']);

    //Documents
    Route::post('/delete-documents', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'delete']);

    Route::post('/complete-document', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'complete']);
    Route::post('/cancel-document', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'cancel_document']);
    Route::post('/cancel-documents', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'cancel_documents']);
    Route::post('/revert-document', [App\Http\Controllers\dts\admin\AllDocumentsController::class, 'revert_document']);
});



//USER ROUTES//
Route::middleware(['SessionGuard'])->prefix('dts/user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\dts\user\DashboardController::class, 'index']);
    Route::get('/my-documents', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'index']);
    Route::get('/add-document', [App\Http\Controllers\dts\user\AddDocumentController::class, 'index']);
    Route::get('/incoming', [App\Http\Controllers\dts\user\IncomingController::class, 'index']);
    Route::get('/received', [App\Http\Controllers\dts\user\ReceivedController::class, 'index']);
    Route::get('/forwarded', [App\Http\Controllers\dts\user\ForwardedController::class, 'index']);
    Route::get('/view', [App\Http\Controllers\dts\user\ViewDocumentController::class, 'index']);


    Route::get('/my-profile', [App\Http\Controllers\dts\user\ProfileController::class, 'index']);

    Route::get('/print-slip', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'print_slip']);

    Route::get('/print-slips', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'print_slips']);

    Route::get('/track', function () {
        $data['title'] = 'Search';
        return view('dts.users.contents.search.search')->with($data);
    });
});

//USER ACTIONS//
Route::middleware(['SessionGuard'])->prefix('dts/us')->group(function () {

    //My Documents
    Route::post('/update-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'update']);
    Route::post('/delete-my-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'delete']);
    Route::post('/add-d', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'store']);

    Route::post('/receive-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'receive']);
    Route::post('/forward-document', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'forward']);
    Route::post('/update-profile', [App\Http\Controllers\dts\user\ProfileController::class, 'update']);
    Route::post('/ck', [App\Http\Controllers\dts\user\ProfileController::class, 'check']);
    //Update User Password
    Route::post('/u-p', [App\Http\Controllers\dts\user\ProfileController::class, 'update_password']);
    //Update Forward
    Route::post('/u-f-d', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'update_forwarded']);
    //Update Remarks
    Route::post('/u-f-r', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'update_remarks']);
    //Cancel Document
    Route::post('/c-doc', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'cancel_document']);
    //Get Incoming in Receiver
    Route::get('/g-r-i', [App\Http\Controllers\dts\user\MyDocumentsController::class, 'get_receiver_incoming']);
});


//Receiver ROUTES//
Route::middleware(['SessionGuard', 'IsReceiver'])->prefix('dts/receiver')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\dts\receiver\DashboardController::class, 'index']);
    // Route::get('/pending', [App\Http\Controllers\dts\receiver\PendingController::class, 'index']);
    Route::get('/all-documents', [App\Http\Controllers\dts\receiver\ReceivedDocumentsController::class, 'index']);
    Route::get('/incoming', [App\Http\Controllers\dts\receiver\IncomingController::class, 'index']);
    Route::get('/received', [App\Http\Controllers\dts\receiver\ReceivedController::class, 'index']);
});


//Receiver ACTIONS//
Route::middleware(['SessionGuard'])->prefix('dts/r')->group(function () {

    //My Documents
    Route::post('/complete-document', [App\Http\Controllers\dts\receiver\ReceivedController::class, 'complete']);

    Route::post('/a-n', [App\Http\Controllers\dts\receiver\IncomingController::class, 'add_note']);
});


//Auth Watchlisted
Route::get('/watchlisted', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'new_user_login'])->middleware(['WatchLoginCheck']);

//WATCHLISTED admin ROUTES//
Route::middleware(['IsLoggedInCheck', 'WatchAdminCheck'])->prefix('watchlisted/admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\watchlisted\admin\DashboardController::class, 'index']);
    Route::get('//to-approve', [App\Http\Controllers\watchlisted\admin\ToApproveController::class, 'index']);
    Route::get('/list', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'index']);
    Route::get('/restore', [App\Http\Controllers\watchlisted\admin\RestoreListController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\watchlisted\admin\AddWatchController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\watchlisted\admin\SearchController::class, 'index']);
    Route::get('/manage-program', [App\Http\Controllers\watchlisted\admin\ManageProgramController::class, 'index']);
    Route::get('/change-code', [App\Http\Controllers\watchlisted\admin\ChangeSecurityController::class, 'index']);
    Route::get('/view_profile', [App\Http\Controllers\watchlisted\admin\ViewProfileController::class, 'index']);
});



//WATCHLISTED user ROUTES//
Route::middleware(['IsLoggedInCheck', 'WatchUserCheck'])->prefix('watchlisted/user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\watchlisted\user\DashboardController::class, 'index']);
    Route::get('/approved', [App\Http\Controllers\watchlisted\user\ApprovedListController::class, 'index']);
    Route::get('/pending', [App\Http\Controllers\watchlisted\user\PendingListController::class, 'index']);
    Route::get('/removed', [App\Http\Controllers\watchlisted\user\RemovedController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\watchlisted\user\AddController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\watchlisted\user\SearchController::class, 'index']);
    Route::get('/view_profile', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'index']);
});



//USer Actions

Route::middleware(['IsLoggedInCheck', 'WatchUserCheck'])->prefix('wl/user')->group(function () {


    //Records
    Route::post('/a-p', [App\Http\Controllers\watchlisted\user\AddController::class, 'store']);
    Route::post('/d-p', [App\Http\Controllers\watchlisted\user\PendingListController::class, 'delete']);


    Route::post('/update', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'update_information']);

    //Records
    Route::post('/add-record', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'add_record']);
    Route::post('/update-record', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'update_record']);
    Route::post('/delete-record', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'delete_record']);
    Route::post('/s-p-p', [App\Http\Controllers\watchlisted\user\ViewProfileController::class, 'save_record_program']);

    //Search
    Route::post('/search-query', [App\Http\Controllers\watchlisted\user\SearchController::class, 'search']);
});



//WATCHLISTED Admin ACTIONS//
Route::middleware(['IsLoggedInCheck', 'WatchAdminCheck'])->prefix('wl')->group(function () {



    //Dashboard
    Route::get('/data-per-barangay', [App\Http\Controllers\watchlisted\admin\DashboardController::class, 'data_per_barangay']);

    //Remove List
    Route::post('/ch-stat', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'change_status']);
    Route::post('/delete', [App\Http\Controllers\watchlisted\admin\RestoreListController::class, 'delete']);

    //Approve
    Route::post('/app-p', [App\Http\Controllers\watchlisted\admin\ToApproveController::class, 'approve']);

    //Add List
    Route::post('/add', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\watchlisted\admin\ActiveListController::class, 'update_information']);
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
    // Route::post('/change-code', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'change_code']);
});

//DTS
Route::post('/r-u', [App\Http\Controllers\dts\auth\AuthController::class, 'register_user']);
Route::post('/v-u', [App\Http\Controllers\dts\auth\AuthController::class, 'verify_user']);
Route::get('/dts_logout', [App\Http\Controllers\dts\auth\AuthController::class, 'dts_logout']);
Route::post('/up-pas', [App\Http\Controllers\dts\auth\AuthController::class, 'strong_password']);

//Watchlisted
Route::post('/w-v-u', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'verify_user']);
Route::post('/v-c', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'verify_code']);
Route::get('/wl_logout', [App\Http\Controllers\watchlisted\auth\AuthController::class, 'wl_logout']);
