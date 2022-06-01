<?php

use App\Models\Properties;
use App\Http\Livewire\Crud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\_RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserOTPController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PropertyController;
use App\Http\Livewire\Admin\AccessControlList;
use App\Http\Controllers\_PermissionController;
use App\Http\Controllers\DevelopmentController;
use App\Http\Controllers\_AccessControlController;


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



Route::post('save-images', function(Request $request){
    $image= $request->file('file');
    $imageName= time(). '.'. $image->extension();
    $image->move(public_path('images'), $imageName);
    return response()->json(['success'=>$imageName]);
});

Route::get('/registerme', function () {
    return view('auth.register_old');
});
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/request-status', function () {
    return view('frontend.message');
})->name('request.status');

Route::get('/listing', [HomeController::class, 'listingByHouses'])->name('listing');

Route::get('/property-details/{id}', [HomeController::class, 'listingById'])->name('listing.details');
Route::get('/development-details/{id}', [HomeController::class, 'developmentById'])->name('development.listing.details');
Route::get('/partners/{type}', [HomeController::class, 'userListing'])->name('partner.listing');
Route::get('/category/{name}', [HomeController::class, 'categoryListing'])->name('category.listing');
Route::get('/user-listing/{id}', [HomeController::class, 'userListing'])->name('user.listing');
Route::get('/account-suspened', [HomeController::class, 'accountSuspended'])->name('account.suspended');
Route::get('/typeahead/action', [HomeController::class, 'autocompleteLocation'])->name('autocomplete.location');
Route::post('/send/mail/{id}', [HomeController::class, 'sendPartnerMail'])->name('send.partner.mail');


Route::get('/about-us', function () {
    return view('frontend.about');
})->name('about');
Route::get('/contact-us', function () {
    return view('frontend.contact');
})->name('contact');
Route::get('/property-news', function () {
    return view('frontend.news');
})->name('news');

Route::middleware(['auth:sanctum', 'business_status'])->get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/user')->group( function (){
    Route::get('/list', [AgentController::class,'view'])->name('user.view');
    Route::get('/add', [AgentController::class,'addUser'])->name('user.add');
    Route::post('/save', [AgentController::class, 'postAgent']);

    Route::get('/profile', [AgentController::class,'userProfile'])->name('user.profile');

    Route::get('/profile/{id}', [AgentController::class,'userProfileId'])->name('user.profile.id');

    Route::post('/profile/update/{id}', [AgentController::class,'userProfileUpdate'])->name('user.update');

    Route::post('/update/business/{id}', [AgentController::class,'userBusinessUpdate'])->name('user.update.business');

    Route::post('/upload/logo/{id}', [AgentController::class,'uploadLogo'])->name('user.logo.upload');

    Route::get('/logo/fetch', [AgentController::class,'fetchLogo'])->name('user.logo.fetch');

    Route::get('/logo/delete', [AgentController::class,'deleteLogo'])->name('user.logo.delete');

    Route::post('upload', [UploadController::class, 'storeLogo']);

    Route::get('/role', [AgentController::class,'userRole'])->name('role.view');
});



Route::get('users', Crud::class);

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/packages')->group( function (){
    Route::get('/list', [PackagesController::class,'view'])->name('package.list');
    Route::get('/add', [PackagesController::class,'create'])->name('package.add');
    Route::post('/store', [PackagesController::class,'store'])->name('package.store');
    Route::get('/edit/{id}', [PackagesController::class,'edit'])->name('package.edit');
    Route::post('/update/{id}', [PackagesController::class,'update'])->name('package.update');
    Route::delete('/delete/{id}', [PackagesController::class,'delete'])->name('package.delete');
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/category')->group( function (){
    Route::get('/list', [CategoryController::class,'view'])->name('category.list');
    /* Route::get('/add', [CategoryController::class,'create'])->name('category.add'); */
    Route::post('/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/amenities')->group( function (){
    Route::get('/list', [AdminController::class,'viewAmenities'])->name('amenity.list');
    Route::get('/add', [AdminController::class,'createAmenity'])->name('amenity.add');
    Route::post('/store', [AdminController::class,'storeAmenity'])->name('amenity.store');
    Route::patch('/update/{id}', [AdminController::class,'updateAmenity'])->name('amenity.update');
    Route::delete('/delete/{id}', [AdminController::class,'deleteAmenity'])->name('amenity.delete');
});
Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/business-type')->group( function (){
    Route::get('/list', [AdminController::class,'viewBusinessTypes'])->name('business.type.list');
    Route::get('/add', [AdminController::class,'createBusinessType'])->name('business.type.add');
    Route::post('/store', [AdminController::class,'storeBusinessType'])->name('business.type.store');
    Route::patch('/update/{id}', [AdminController::class,'updateBusinessType'])->name('business.type.update');
    Route::delete('/delete/{id}', [AdminController::class,'deleteBusinessType'])->name('business.type.delete');
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/role')->group( function (){
    Route::get('/list', [_RoleController::class,'viewRole'])->name('role.list');
    Route::post('/store', [_RoleController::class,'storeRole'])->name('role.store');
    Route::patch('/update/{id}', [_RoleController::class,'updateRole'])->name('role.update');
    Route::delete('/delete/{id}', [_RoleController::class,'deleteRole'])->name('role.delete');
});
Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/permission')->group( function (){
    Route::get('/list', [_PermissionController::class,'viewPermission'])->name('permission.list');
    Route::post('/store', [_PermissionController::class,'storePermission'])->name('permission.store');
    Route::patch('/update/{name}', [_PermissionController::class,'updatePermission'])->name('permission.update');
    Route::patch('/revoke/{name}', [_PermissionController::class,'revokePermission'])->name('permission.revoke');
    Route::delete('/delete/{id}', [_PermissionController::class,'deletePermission'])->name('permission.delete');
});

Route::middleware(['auth:sanctum'])->prefix('dashboard/admin/access')->group( function (){
    Route::get('/', [_AccessControlController::class, 'viewAccessControlList'])->name('access.role.view');
    Route::patch('/update/{id}', [_AccessControlController::class,'updateAccessControlList'])->name('access.role.update');
});

Route::post('/signup-request', [AdminController::class,'signUpRequest'])->name('signup.request');

/* Route::middleware(['auth:sanctum', 'auth'])->get('/packages', [PackagesController::class,'getPackages'])->name('package.list'); */

/* Route::middleware(['auth:sanctum', 'auth'])->get('/package/add', [PackagesController::class,'createPackage'])->name('package.add'); */

Route::middleware(['auth:sanctum',  'business_status'])->prefix('/dashboard/properties')->group( function (){

    Route::get('/', [PropertyController::class, 'view'])->name('property.view');
    Route::get('details/{id}', [PropertyController::class, 'details'])->name('property.details');
    Route::get('edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
    Route::get('/add', [PropertyController::class, 'add'])->name('property.add');
    Route::post('/store/{id}', [PropertyController::class, 'store'])->name('property.store');
    Route::post('/update/{id}', [PropertyController::class, 'update'])->name('property.update');
    Route::delete('/delete/{id}', [PropertyController::class, 'delete'])->name('property.delete');

    Route::post('upload', [UploadController::class, 'storeProperties']);
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('/dashboard/developments')->group( function (){
    Route::get('/', [DevelopmentController::class, 'view'])->name('development.view');
    Route::get('details/{id}', [DevelopmentController::class, 'details'])->name('development.details');
    Route::get('edit/{id}', [DevelopmentController::class, 'edit'])->name('development.edit');
    Route::get('/add', [DevelopmentController::class, 'add'])->name('development.add');
    Route::post('/store/{id}', [DevelopmentController::class, 'store'])->name('development.store');
    Route::post('/update/{id}', [DevelopmentController::class, 'update'])->name('development.update');
    Route::delete('/delete/{id}', [DevelopmentController::class, 'delete'])->name('development.delete');
    Route::post('upload', [UploadController::class, 'storeDevelopments']);
});

Route::middleware(['auth:sanctum', 'business_status'])->prefix('dashboard/ads/')->group( function (){

Route::get('/view', [AdsController::class, 'viewTopAds'])->name('topads.view');
Route::get('delete/{id}', [AdsController::class, 'deleteTopAds'])->name('topads.delete');
Route::get('/add', [AdsController::class, 'addTopAds'])->name('topads.add');
Route::post('/store/{id}', [AdsController::class, 'storeTopAds'])->name('topads.store');
Route::post('upload', [UploadController::class, 'storeAdImage']);
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/featured/')->group( function (){
// FEATURED ADS ROUTES
Route::get('/view', [AdsController::class, 'viewFeaturedAds'])->name('featuredads.view');
Route::get('/add', [AdsController::class, 'addFeaturedAds'])->name('featuredads.add');
Route::post('/store/{id}', [AdsController::class, 'storeFeaturedAds'])->name('featuredads.store');
Route::patch('/update/{id}', [AdsController::class, 'updateFeaturedAds'])->name('featuredads.update');
Route::get('remove/{id}', [AdsController::class, 'deleteFeaturedAds'])->name('featuredads.remove');
});

Route::middleware(['auth:sanctum',  'business_status'])->prefix('dashboard/dev/ads/')->group( function (){
// FEATURED ADS ROUTES
Route::get('/view', [AdsController::class, 'viewDevelopmentAds'])->name('developmentads.view');
Route::get('/add', [AdsController::class, 'addDevelopmentAds'])->name('developmentads.add');
Route::post('/store/{id}', [AdsController::class, 'storeDevelopmentAds'])->name('developmentads.store');
Route::patch('/update/{id}', [AdsController::class, 'updateDevelopmentAds'])->name('developmentads.update');
Route::get('remove/{id}', [AdsController::class, 'deleteDevelopmentAds'])->name('developmentads.remove');
});



Route::get('forget-password', [UserOTPController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('send-user-otp', [UserOTPController::class, 'submitAgentForm'])->name('send.user.otp');
Route::get('reset-password/{token}/{email}', [UserOTPController::class, 'showAgentResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [UserOTPController::class, 'submitAgentResetPasswordForm'])->name('reset.password.post');

Route::post('save-image', [PropertyController::class, 'saveImage'])->name('save.property.images');

/* Route::get('profile', function(){
    return view('backend.profile');
});
 */
