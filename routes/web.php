<?php
use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\chatsController;
use App\Http\Controllers\UserProfilesController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/auth/{provider}/redirect', [ProviderController::class,'redirect']);

Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','verified','onboard']);;

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/deleteSessions', [App\Http\Controllers\HomeController::class, 'deleteSessions']);
Route::post('/user-account/deletesessions', [App\Http\Controllers\HomeController::class, 'passdeleteSessions']);

Route::post('/updateavatar', [App\Http\Controllers\HomeController::class, 'updateavatar']);
Route::post('/updateAccountInfo', [App\Http\Controllers\HomeController::class, 'updateAccountInfo']);
Route::post('/newpassword', [App\Http\Controllers\HomeController::class, 'newpassword']);

Auth::routes(['verify' => true]);






Route::controller(App\Http\Controllers\ManagerController::class)->group(function () {
    Route::get('/clients', 'clients');
    Route::post('/newClient', 'newClient');
});




Route::resource('manager', ManagerController::class);



 
Route::controller(chatsController::class)->group(function () {
    Route::get('/chats', 'Chats');
    Route::post('/incomingSms', 'incoming');
});



// Onboarding
Route::middleware(['auth'])->group(function () {
    Route::get('/onboarding', [UserProfilesController::class, 'showOnboardingForm'])->name('onboarding.show');
    Route::post('/onboarding', [UserProfilesController::class, 'submitOnboarding'])->name('onboarding.submit');
});


