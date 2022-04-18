<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Crud;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserOTPController;
use App\Http\Controllers\UploadController;
use App\Models\Properties;

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

Route::get('/dropzone', function () {
    return view('dropzone');
});
Route::post('save-images', function(Request $request){
    $image= $request->file('file');
    $imageName= time(). '.'. $image->extension();
    $image->move(public_path('images'), $imageName);
    return response()->json(['success'=>$imageName]);
});

Route::get('/registerme', function () {
    return view('auth.register_old');
});
Route::get('/', function () {
    return view('frontend.homepage');
});
Route::get('/request-status', function () {
    return view('frontend.message');
})->name('request.status');

Route::get('/listing', function () {
    return view('frontend.listing');
});
Route::get('/listing-details', function () {
    return view('frontend.detail-listing');
});
Route::get('/about-us', function () {
    return view('frontend.about');
});
Route::get('/contact-us', function () {
    return view('frontend.contact');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('agent')->group( function (){
    Route::get('/list', [AgentController::class,'view'])->name('agent.view');
    Route::get('/add', [AgentController::class,'addAgent'])->name('agent.add');
    Route::post('/save', [AgentController::class, 'postAgent']);

    Route::get('/profile', [AgentController::class,'agentProfile'])->name('agent.profile');

    Route::get('/profile/{id}', [AgentController::class,'agentProfileId'])->name('agent.profile.id');

    Route::post('/profile/update/{id}', [AgentController::class,'agentProfileUpdate'])->name('agent.update');

    Route::post('/update/business/{id}', [AgentController::class,'agentBusinessUpdate'])->name('agent.update.business');

    Route::post('/upload/logo/{id}', [AgentController::class,'uploadLogo'])->name('agent.logo.upload');

    Route::get('/logo/fetch', [AgentController::class,'fetchLogo'])->name('agent.logo.fetch');

    Route::get('/logo/delete', [AgentController::class,'deleteLogo'])->name('agent.logo.delete');

    Route::post('upload', [UploadController::class, 'storeLogo']);
});


Route::middleware(['auth:sanctum', 'verified'])->prefix('packages')->group( function (){
    Route::get('/list', [PackagesController::class,'view'])->name('package.list');
    Route::get('/add', [PackagesController::class,'create'])->name('package.add');
    Route::post('/store', [PackagesController::class,'store'])->name('package.store');
    Route::get('/edit/{id}', [PackagesController::class,'edit'])->name('package.edit');
    Route::post('/update/{id}', [PackagesController::class,'update'])->name('package.update');
    Route::delete('/delete/{id}', [PackagesController::class,'delete'])->name('package.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('category')->group( function (){
    Route::get('/list', [CategoryController::class,'view'])->name('category.list');
    Route::get('/add', [CategoryController::class,'create'])->name('category.add');
    Route::post('/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('amenities')->group( function (){
    Route::get('/list', [AdminController::class,'view'])->name('amenity.list');
    Route::get('/add', [AdminController::class,'create'])->name('amenity.add');
    Route::post('/store', [AdminController::class,'store'])->name('amenity.store');
    Route::get('/edit/{id}', [AdminController::class,'edit'])->name('amenity.edit');
    Route::post('/update/{id}', [AdminController::class,'update'])->name('amenity.update');
    Route::delete('/delete/{id}', [AdminController::class,'delete'])->name('amenity.delete');
});

Route::post('/signup-request', [AdminController::class,'signUpRequest'])->name('signup.request');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/packages', [PackagesController::class,'getPackages'])->name('package.list'); */

/* Route::middleware(['auth:sanctum', 'verified'])->get('/package/add', [PackagesController::class,'createPackage'])->name('package.add'); */

Route::middleware(['auth:sanctum', 'verified'])->prefix('properties')->group( function (){

Route::get('/', [PropertyController::class, 'view'])->name('property.view');
Route::get('details/{id}', [PropertyController::class, 'details'])->name('property.details');
Route::get('/add', [PropertyController::class, 'add'])->name('property.add');
Route::post('/store/{id}', [PropertyController::class, 'store'])->name('property.store');
});

Route::get('users', Crud::class);

Route::get('forget-password', [UserOTPController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('send-agent-otp', [UserOTPController::class, 'submitAgentForm'])->name('send.agent.otp');
Route::get('reset-password/{token}/{email}', [UserOTPController::class, 'showAgentResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [UserOTPController::class, 'submitAgentResetPasswordForm'])->name('reset.password.post');

Route::post('save-image', [PropertyController::class, 'saveImage'])->name('save.property.images');

Route::get('profile', function(){
    return view('backend.profile');
});
