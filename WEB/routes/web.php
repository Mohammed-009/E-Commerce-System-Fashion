<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\WomenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\MenShoesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\AuthLogicController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\WomenShoesController;
use App\Http\Controllers\ChildrenShoesController;
use App\Http\Controllers\MenLifestylesController;
use App\Http\Controllers\WomenLifestyleController;
use App\Http\Controllers\ChildrenLifestyleController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth', 'is_Admin'])->group(function () {

    Route::get('/admin/admin-dashboard', [AuthLogicController::class, 'adminDashboard'])->name('adminDashboard');
    // MenController
    Route::get('/create-men', [MenController::class, 'createNewMenOfficial'])->name('createNewMenOfficial');
    Route::post('/store-men', [MenController::class, 'storeMenOfficial'])->name('storeMenOfficial');
    Route::get('/edit-men{id}', [MenController::class, 'editMenProduct'])->name('editMenProduct');
    Route::post('/update-men{id}', [MenController::class, 'updateMenProduct'])->name('updateMenProduct');
    Route::get('/delete-men{id}', [MenController::class, 'deleteMenProduct'])->name('deleteMenProduct');

        //MenLifestyleController
    Route::get('/create-lifestyleMen', [MenLifestylesController::class, 'createNewMenLifestyle'])->name('createNewMenLifestyle');
    Route::post('/store-lifestyleMen', [MenLifestylesController::class, 'storeMenLifestyle'])->name('storeMenLifestyle');
    Route::get('/edit-lifestyleMen{id}', [MenLifestylesController::class, 'editMenLifestyle'])->name('editMenLifestyle');
    Route::post('/update-lifestyleMen{id}', [MenLifestylesController::class, 'updateMenLifestyle'])->name('updateMenLifestyle');
    Route::get('/delete-lifestyleMen{id}', [MenLifestylesController::class, 'deleteMenLifestyleProduct'])->name('deleteMenLifestyleProduct');

        //MenShoesController
    Route::get('/men-shoe/create', [MenShoesController::class, 'createMenShoes'])->name('createMenShoes');
    Route::post('/men-shoe/store', [MenShoesController::class, 'storeMenShoes'])->name('storeMenShoes');
    Route::get('/men-shoe/edit{id}', [MenShoesController::class, 'editMenShoes'])->name('editMenShoes');
    Route::post('/men-shoe/update{id}', [MenShoesController::class, 'updateMenShoes'])->name('updateMenShoes');
    Route::get('/men-shoe/delete{id}', [MenShoesController::class, 'deleteMenShoes'])->name('deleteMenShoes');

    //WomenController
    Route::get('/create-women', [WomenController::class, 'createNewWomenOfficial'])->name('createNewWomenOfficial');
    Route::post('/store-women', [WomenController::class, 'storeWomenOfficial'])->name('storeWomenOfficial');
    Route::get('/edit-women{id}', [WomenController::class, 'editWomenProduct'])->name('editWomenProduct');
    Route::post('/update-women{id}', [WomenController::class, 'updateWomenProduct'])->name('updateWomenProduct');
    Route::get('/delete-women{id}', [WomenController::class, 'deleteWomenProduct'])->name('deleteWomenProduct');

        //WomenLifestyleController
    Route::get('/create-productWomenLifestyle', [WomenLifestyleController::class, 'createNewWomenLifestyle'])->name('createNewWomenLifestyle');
    Route::post('/store-productLifestyleWomen', [WomenLifestyleController::class, 'storeWomenLifestyle'])->name('storeWomenLifestyle');
    Route::get('/edit-productWomenLifestyle{id}', [WomenLifestyleController::class, 'editWomenLifestyle'])->name('editWomenLifestyle');
    Route::post('/update-productWomenLifestyle{id}', [WomenLifestyleController::class, 'updateWomenLifestyle'])->name('updateWomenLifestyle');
    Route::get('/delete-productWomenLifestyle{id}', [WomenLifestyleController::class, 'deleteWomenLifestyleProduct'])->name('deleteWomenLifestyleProduct');

            //WomenShoesController
    Route::get('/women-shoe/create', [WomenShoesController::class, 'createWomenShoes'])->name('createWomenShoes');
    Route::post('/women-shoe/store', [WomenShoesController::class, 'storeWomenShoes'])->name('storeWomenShoes');
    Route::get('/women-shoe/edit{id}', [WomenShoesController::class, 'editWomenShoes'])->name('editWomenShoes');
    Route::post('/women-shoe/update{id}', [WomenShoesController::class, 'updateWomenShoes'])->name('updateWomenShoes');
    Route::get('/women-shoe/delete{id}', [WomenShoesController::class, 'deleteWomenShoes'])->name('deleteWomenShoes');

    //ChildrenController
    Route::get('/create-children', [ChildrenController::class, 'createNewChildrenOfficial'])->name('createNewChildrenOfficial');
    Route::post('/store-children', [ChildrenController::class, 'storeChildrenOfficial'])->name('storeChildrenOfficial');
    Route::get('/edit-children{id}', [ChildrenController::class, 'editChildrenProduct'])->name('editChildrenProduct');
    Route::post('/update-children{id}', [ChildrenController::class, 'updateChildrenProduct'])->name('updateChildrenProduct');
    Route::get('/delete-children{id}', [ChildrenController::class, 'deleteChildrenProduct'])->name('deleteChildrenProduct');

        //ChildrenLifestyleController
    Route::get('/create-childLifestyle', [ChildrenLifestyleController::class, 'createChildLifestyle'])->name('createChildLifestyle');
    Route::post('/store-childLifestyle', [ChildrenLifestyleController::class, 'storeChildLifestyle'])->name('storeChildLifestyle');
    Route::get('/edit-childLifestyle{id}', [ChildrenLifestyleController::class, 'editChildLifestyle'])->name('editChildLifestyle');
    Route::post('/update-childLifestyle{id}', [ChildrenLifestyleController::class, 'updateChildLifestyle'])->name('updateChildLifestyle');
    Route::get('/delete-childLifestyle{id}', [ChildrenLifestyleController::class, 'deleteChildLifestyle'])->name('deleteChildLifestyle');

                //ChildrenShoesController
    Route::get('/children-shoe/create', [ChildrenShoesController::class, 'createChildrenShoes'])->name('createChildrenShoes');
    Route::post('/children-shoe/store', [ChildrenShoesController::class, 'storeChildrenShoes'])->name('storeChildrenShoes');
    Route::get('/children-shoe/edit{id}', [ChildrenShoesController::class, 'editChildrenShoes'])->name('editChildrenShoes');
    Route::post('/children-shoe/update{id}', [ChildrenShoesController::class, 'updateChildrenShoes'])->name('updateChildrenShoes');
    Route::get('/children-shoe/delete{id}', [ChildrenShoesController::class, 'deleteChildrenShoes'])->name('deleteChildrenShoes');

    //ProfileController
    Route::get('/profile/create-profile', [ProfileController::class, 'createProfile'])->name('createProfile');
    Route::post('/store-profile', [ProfileController::class, 'storeProfile'])->name('storeProfile');
    Route::get('/profile/edit-profile{id}', [ProfileController::class, 'editAdminProfile'])->name('editAdminProfile');
    Route::post('/profile/update-profile{id}', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/profile/delete-profile{id}', [ProfileController::class, 'deleteProfile'])->name('deleteProfile');
    Route::get('/profile/show-profiles', [ProfileController::class, 'showProfiles'])->name('showProfiles');
    Route::get('/profile/personal/show-profileInfo', [ProfileController::class, 'showPersonalInfo'])->name('showPersonalInfo');
    Route::PUT('/profile/profile-approve{id}', [ProfileController::class, 'approveUser'])->name('approveUser');
    Route::get('/accounts/show-all-accounts', [ProfileController::class, 'showAllAccounts'])->name('showAllAccounts');
    Route::get('/users/user-delete{id}', [ProfileController::class, 'deleteUser'])->name('deleteUser');

    //MessagesController
    Route::get('/message/show-message', [MessagesController::class, 'showMessages'])->name('showMessages');
    Route::PUT('/message/approve-message{id}', [MessagesController::class, 'approveMessage'])->name('approveMessage');
    Route::get('/message/delete-message{id}', [MessagesController::class, 'deleteMessage'])->name('deleteMessage');

    //PHPMailerController
    Route::post('/send/email-sent', [PHPMailerController::class, 'sendEmail'])->name('sendEmail');

});

// AuthLogicController 
Route::get('/account/register/register-admin', [AuthLogicController::class, 'ViewCreateAdminAccount'])->name('ViewCreateAdminAccount');
Route::post('store-admin', [AuthLogicController::class, 'CreateNewAdminAccount'])->name('CreateNewAdminAccount');
Route::get('/account/register-user', [AuthLogicController::class, 'ViewCreateUserAccount'])->name('ViewCreateUserAccount');
Route::post('/store-user', [AuthLogicController::class, 'CreateNewUserAccount'])->name('CreateNewUserAccount');
Route::get('/login', [AuthLogicController::class, 'LoginPage'])->name('LoginPage');
Route::post('/login-details', [AuthLogicController::class, 'LoginUserLogic'])->name('LoginUserLogic');
Route::get('/logout', [AuthLogicController::class, 'logout'])->name('logout');

//PagesController
Route::get('/', [PagesController::class, 'Index'])->name('homePage');
Route::get('/about', [PagesController::class, 'About'])->name('aboutPage');
Route::get('/contact', [PagesController::class, 'Contact'])->name('contactPage');
Route::get('/services', [PagesController::class, 'Services'])->name('servicesPage');

// MenController
Route::get('/show-men/official', [MenController::class, 'showMenOfficial'])->name('showMenOfficial');
//MenLifestyleController
Route::get('/show-lifestyle/Men', [MenLifestylesController::class, 'showMenLifestyle'])->name('showMenLifestyle');
//MenShoesController
Route::get('/men-shoe/show', [MenShoesController::class, 'showMenShoes'])->name('showMenShoes');

// //WomenController
Route::get('/show-women/official', [WomenController::class, 'showWomenOfficial'])->name('showWomenOfficial');
// WomenLifestyleController
Route::get('/show-productWomenLifestyle/lifestyle', [WomenLifestyleController::class, 'showWomenLifestyle'])->name('showWomenLifestyle');
//WomenShoesController
Route::get('/women-shoe/show', [WomenShoesController::class, 'showWomenShoes'])->name('showWomenShoes');

 //ChildrenController
Route::get('/show-children/official', [ChildrenController::class, 'showChildrenOfficial'])->name('showChildrenOfficial');
// ChildrenLifestyleController
Route::get('/show-childLifestyle/lifestyle', [ChildrenLifestyleController::class, 'showChildLifestyle'])->name('showChildLifestyle');
//ChildrenShoesController
Route::get('/children-shoe/show', [ChildrenShoesController::class, 'showChildrenShoes'])->name('showChildrenShoes');


// MessageController
Route::post('/message/send-message', [MessagesController::class, 'storeMessage'])->name('storeMessage');
// Route::get('/message/show-message', [MessagesController::class, 'showMessages'])->name('showMessages');
// Route::PUT('/message/approve-message', [MessagesController::class, 'approveMessage'])->name('approveMessage');

// Route::get('/send-mail', [PHPMailerController::class, 'mailView'])->name('mailView');
// Route::post('/send/email-sent', [PHPMailerController::class, 'sendEmail'])->name('sendEmail');


//reset password routes
// Route::get('/reset-password-form', [AuthLogicController::class, 'sendEmailForm'])->name('password.request');
// Route::post('/email-logic', [AuthLogicController::class, 'emailLogic'])->name('emailLogic');
// Route::get('/reset-password', [AuthLogicController::class, 'resetForm'])->name('resetForm');
// Route::post('/reset-logic', [AuthLogicController::class, 'resetLogic'])->name('resetLogic');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
