<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendSMSController;
use App\Http\Controllers\SMSTemplateController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SenderIDController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SubscriptionController;
//use App\Http\Controllers\dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('php/', function () {
    return phpinfo();
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
   

    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    // User Management
//     Route::resource('/users', UserController::class); //->except(['show']);
    Route::put('/user/change-password/{username}', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::get('/profile/store-settings', [ProfileController::class, 'store_settings'])->name('profile.store.settings');
    Route::post('/profile/store-settings', [ProfileController::class, 'store_settings_store'])->name('profile.store.settings.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/customers', CustomerController::class);
    

  
    //for sms sending 
    Route::post('/sms/send', [SendSMSController::class, 'send'])->name('sms.send');
    Route::get('/sms/send', [SendSMSController::class, 'showSendSmsPage'])->name('sms.send');
    Route::get('/sms/templates', [SendSMSController::class, 'index'])->name('sms.templates.index');
    // for viewing the sms templates 
    Route::resource('sms_templates', SMSTemplateController::class);

    // for the message logs 
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/status', [MessageController::class, 'fetchStatusUpdates']);

// for report 
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/report', [ReportController::class, 'showReport'])->name('report.show');

// the sender ID


Route::get('/broacast', [SenderIDController::class, 'index'])->name('broadcast.index');
Route::post('/broadcast', [SenderIDController::class, 'store'])->name('sender-id.store');
// for the help&support


Route::get('/support', [SupportController::class, 'index'])->name('support.index');
Route::post('/support/submit-feedback', [SupportController::class, 'submitFeedback'])->name('support.submit-feedback');



Route::middleware(['auth'])->group(function () {
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/plans', [SubscriptionController::class, 'plans'])->name('subscriptions.plans');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe');
    Route::get('/overage', [SubscriptionController::class, 'overageCharge'])->name('subscriptions.overage');
});

   
});
Route::get('/payment/{plan}', [SubscriptionController::class, 'paymentPage'])->name('subscriptions.payment');
Route::post('/payment/confirm', [SubscriptionController::class, 'confirmPayment'])->name('subscriptions.confirm');
Route::get('/contact-us', [SubscriptionController::class, 'contact'])->name('subscriptions.contact');


//-------------THE ROUTES TO THE Roman Website place ,WELCOMES ----------------

Route::get('/Welcome', function () {
    return view('front.about_master');   // The welcome page
})->name('about_master.route');

Route::get('/About Us', function () {
    return view('front.habout');       // The About  page
})->name('habout.route');

Route::get('/Contact', function () {
    return view('front.contact');       // The Contact  page
})->name('contact.route');

Route::get('/OurPricing', function () {
    return view('front.price');       // The pricing   page
})->name('price.route');

Route::get('/OurServices', function () {
    return view('front.service');   // The services  page
})->name('service.route');

Route::get('/Our Team', function () {
    return view('front.team');   // The  team   page
})->name('team.route');

// terms & conditions
Route::get('Terms&Conditions', function () {
    return view('terms&policy.index');   // The  team   page
})->name('index.route');

require __DIR__.'/auth.php';

Route::get('test/', function (){
    return view('test');
});