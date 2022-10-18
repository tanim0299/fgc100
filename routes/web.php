<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\mainmenuController;
use App\Http\Controllers\sub_menuController;
use App\Http\Controllers\committeeController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\aboutAnniversary;
use App\Http\Controllers\convenerSpeech;
use App\Http\Controllers\magazineController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\photogalleryController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\termsConditionController;
use App\Http\Controllers\privacyPolicyController;
use App\Http\Controllers\refundPolicyController;
use App\Http\Controllers\SslCommerzPaymentController;

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

Route::get('/sms', [FrontendController::class, 'sms']);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/advisors-panel/{id}', [FrontendController::class, 'advisors_panel']);
Route::get('/convenior-committee', [FrontendController::class, 'convenior_committee']);
Route::get('/sub-committee', [FrontendController::class, 'sub_committee']);
Route::get('/convenior-speach', [FrontendController::class, 'convenior_speach']);
Route::get('/member-secretary-speach', [FrontendController::class, 'membersecretary_speach']);
Route::get('/events', [FrontendController::class, 'events']);
Route::get('/magazine', [FrontendController::class, 'magazine']);
Route::get('/festival-gallery', [FrontendController::class, 'festival_gallery']);
Route::get('/registered-students', [FrontendController::class, 'registered_students']);
Route::get('/print_data', [FrontendController::class, 'print_data']);
Route::get('/registration-form', [FrontendController::class, 'registration_form']);
Route::get('/present-registration-form', [FrontendController::class, 'present_registration_form']);
Route::get('/ex-registration-form', [FrontendController::class, 'ex_registration_form']);
Route::get('/view_news/{id}', [FrontendController::class, 'view_news']);
Route::get('/fgc_history', [FrontendController::class, 'fgc_history']);
Route::get('/terms-condition', [FrontendController::class, 'terms_condition']);
Route::get('/privacy-policy', [FrontendController::class, 'privacy_policy']);
Route::get('/refund-policy', [FrontendController::class, 'refund_policy']);

Route::get('/student_login', [FrontendController::class, 'student_login']);
Route::post('/studentLoginAttempt', [FrontendController::class, 'studentLoginAttempt']);
Route::get('/student_logout', [FrontendController::class, 'student_logout']);
Route::get('/std_dashboard', [FrontendController::class, 'student_dashboard'])->middleware('students');
Route::get('/std_info_edit/{type}/{id}', [FrontendController::class, 'std_info_edit']);
Route::post('/ex_update_info/{id}', [FrontendController::class, 'ex_update_info']);
Route::post('/present_info_update/{id}', [FrontendController::class, 'present_info_update']);
Route::get('/make_payment', [FrontendController::class, 'make_payment']);
Route::get('/id_card', [FrontendController::class, 'id_card']);
Route::get('/invoice', [FrontendController::class, 'invoice']);
Route::get('/ex_invoice/{id}', [FrontendController::class, 'ex_invoice']);
Route::get('/present_invoice/{id}', [FrontendController::class, 'present_invoice']);
Route::get('/download_reciept', [FrontendController::class, 'download_reciept']);

Route::get('/registration_procedure',[FrontendController::class,'vedio']);

Route::post('/present_registration', [RegistrationController::class, 'present_registration']);
Route::post('/ex_registration', [RegistrationController::class, 'ex_registration']);

Route::get('/present_payment/{id}', [RegistrationController::class, 'presentpayment']);
Route::get('/ex_payment/{id}', [RegistrationController::class, 'expayment']);


Route::post('/check_phone', [RegistrationController::class, 'check_phone']);


Route::get('/foget_pass', [RegistrationController::class, 'foget_pass']);
Route::post('/verify_number', [RegistrationController::class, 'verify_number']);

Route::get('/otp/{phone}', [RegistrationController::class, 'otp']);
Route::post('/verify_otp', [RegistrationController::class, 'verify_otp']);
Route::get('/change_pass/{id}', [RegistrationController::class, 'change_pass']);
Route::post('/change_password', [RegistrationController::class, 'change_password']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [BackendController::class, 'index']);


Route::get('/addMainMenu', [mainmenuController::class, 'index']);
Route::post('/mainMenuStore', [mainmenuController::class, 'store']);
Route::get('/viewMainMenu', [mainmenuController::class, 'view']);
Route::get('/editMainMenu/{id}', [mainmenuController::class, 'edit']);
Route::post('/mainMenuUpdate/{id}', [mainmenuController::class, 'update']);
Route::get('/deleteMainMenu/{phone}', [mainmenuController::class, 'delete']);



Route::get('/addSubMenu', [sub_menuController::class, 'index']);
Route::post('/subMenuStore', [sub_menuController::class, 'store']);
Route::get('/viewSubMenu', [sub_menuController::class, 'view']);
Route::get('/editSubMenu/{id}', [sub_menuController::class, 'edit']);
Route::post('/subMenuUpdate/{id}', [sub_menuController::class, 'update']);
Route::get('/deleteSubMenu/{id}', [sub_menuController::class, 'delete']);



Route::get('/create_admin', [adminController::class, 'index']);
Route::post('/registerAdmin', [adminController::class, 'store']);
Route::get('/viewAdmin', [adminController::class, 'view']);
Route::get('/editAdmin/{id}', [adminController::class, 'edit']);
Route::post('/updateAdmin/{id}', [adminController::class, 'update']);
Route::get('/deleteAdmin/{id}', [adminController::class, 'delete']);



Route::get('/add_committee', [committeeController::class, 'index']);
Route::post('/committeeStore', [committeeController::class, 'store']);
Route::get('/view_committee', [committeeController::class, 'view']);
Route::get('/edit_committee/{id}', [committeeController::class, 'edit']);
Route::post('/committeeUpdate/{id}', [committeeController::class, 'update']);
Route::get('/delete_committee/{id}', [committeeController::class, 'delete']);



Route::get('/add_member', [memberController::class, 'index']);
Route::post('/memberStore', [memberController::class, 'store']);
Route::get('/view_member', [memberController::class, 'view']);
Route::get('/edit_member/{id}', [memberController::class, 'edit']);
Route::post('/memberUpdate/{id}', [memberController::class, 'update']);
Route::get('/delete_member/{id}', [memberController::class, 'delete']);



Route::get('/about_anniversary', [aboutAnniversary::class, 'index']);
Route::post('/aboutanniversary_update', [aboutAnniversary::class, 'store']);

Route::get('/convener_speech', [convenerSpeech::class, 'index']);
Route::post('/convenerspeech_update', [convenerSpeech::class, 'store']);

Route::get('/add_magazine', [magazineController::class, 'index']);
Route::post('/magazine_store', [magazineController::class, 'store']);


Route::get('/anniversary_guideline', [settingsController::class, 'index']);
Route::post('/guideline_update', [settingsController::class, 'store']);


Route::get('/add_news', [newsController::class, 'index']);
Route::post('/news_store', [newsController::class, 'store']);
Route::get('/edit_news/{id}', [newsController::class, 'edit']);
Route::post('/news_update/{id}', [newsController::class, 'update']);
Route::get('/delete_news/{id}', [newsController::class, 'delete']);


Route::get('/add_photo', [photogalleryController::class, 'index']);
Route::post('/photo_store', [photogalleryController::class, 'store']);
Route::get('/edit_photo/{id}', [photogalleryController::class, 'edit']);
Route::post('/photo_update/{id}', [photogalleryController::class, 'update']);
Route::get('/delete_photo/{id}', [photogalleryController::class, 'delete']);


Route::get('/presentStudent', [studentController::class, 'presentStudent']);
Route::get('/ex_students', [studentController::class, 'ex_students']);
Route::get('/familyMember', [studentController::class, 'familyMember']);
Route::post('/getpresentStudents', [studentController::class, 'getpresentStudents']);
Route::post('/getexStudents', [studentController::class, 'getexStudents']);
Route::post('/getfamilyMember', [studentController::class, 'getfamilyMember']);



Route::get('/termsCondition', [termsConditionController::class, 'index']);
Route::post('/terms_condition_update', [termsConditionController::class, 'terms_condition_update']);


Route::get('/privacyPolicy', [privacyPolicyController::class, 'index']);
Route::post('/privacyPolicyUpdate', [privacyPolicyController::class, 'update']);

Route::get('/refundPolicy', [refundPolicyController::class, 'index']);
Route::post('/refundPolicyUpdate', [refundPolicyController::class, 'update']);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
