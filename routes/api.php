<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\programController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\FeedbackVideoController;
use App\Http\Controllers\Api\ProfilesController;
use App\Http\Controllers\FacebookLeadController;


Route::middleware('auth:api')->group(function () {
Route::get('/protected-data', function () {
return response()->json(['message' => 'This is protected data only accessible with a valid token.', ]);
    });
});



Route::post('/login', [LoginController::class, 'login']);
Route::post('/sendOtp', [OtpController::class, 'sendOtp']);
Route::post('/verifyOtp', [OtpController::class, 'verifyOtp']);


Route::get('/program_list', [programController::class, 'program_list']);
Route::get('/programs_details/{id}', [ProgramController::class, 'programs_details']);
Route::get('/country_list', [programController::class, 'country_list']);
Route::get('/university_list', [programController::class, 'university_list']);
Route::get('/uni_filter_data', [programController::class, 'uni_filter_data']);




Route::post('/contact_us_list', [ContactUsController::class, 'contact_us_list']);
Route::post('/contact_us', [ContactUsController::class, 'contact_us']);


Route::get('/get_add', [ContactUsController::class, 'get_add']);

Route::post('/student_register', [LoginController::class, 'student_register']);
Route::post('/student_login', [LoginController::class, 'student_login']);


Route::get('/feedbackVideos',[FeedbackVideoController::class,'feedbackVideos']);



Route::post('/updateStudent_profile', [ProfilesController::class, 'updateStudent_profile']);


Route::get('/fb/webhook', [FacebookLeadController::class, 'verify']);
Route::post('/fb/webhook', [FacebookLeadController::class, 'webhook']);








