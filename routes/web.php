<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnquiryController;
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

Route::middleware('web')->group(function () {
    // Home routes
    Route::view('/', 'home')->name('home');
    Route::view('/home', 'home');
    Route::view('/homepage', 'home');
    Route::view('/index', 'home')->name('home');

    // Main navigation page routes
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');
    Route::view('/appointments', 'appointments')->name('appointments');
   
    Route::view('/selfservice/forgot-password', 'portal.forgot')->name('forgot-password');

    // Form submissions in website
    Route::post('/subscribe', [NewsletterController::class, 'newsletter_subscription'])->name('newsletter.subscribe');
    Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');
    Route::post('/book-appointment', [EnquiryController::class, 'book_appointment'])->name('enquiry.book_appointment');
    
    // Services routes
    Route::prefix('services')->group(function () {
        Route::view('/', 'services')->name('services');
        Route::view('/dental', 'services.dental')->name('services.dental');
        Route::view('/eye', 'services.eye')->name('services.eye');
        Route::view('/general-medicine', 'services.general')->name('services.general');
        Route::view('/geriatric', 'services.geriatric')->name('services.geriatric');
        Route::view('/obstetrics', 'services.obstetrics')->name('services.obstetrics');
        Route::view('/surgery', 'services.surgery')->name('services.surgery');
        Route::view('/pharmacy', 'services.pharmacy')->name('services.pharmacy');
        Route::view('/laboratory', 'services.laboratory')->name('services.laboratory');
        Route::view('/ultrasound', 'services.ultrasound')->name('services.ultrasound');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
      // Route::get('/selfservice/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('selfservice')->group(function () {
            // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            // Route::get('/appointments/list', [AppointmentController::class, 'index'])->name('appointment.index');
            // Route::get('/enquiry/list', [EnquiryController::class, 'index'])->name('enquiry.index');
              // list users
            // Route::get('/users/list', [UserController::class, 'index'])->name('users.index');
             // edit/update user
            // Route::patch('/users/{user_id}', [UserController::class, 'update'])->name('users.update');
            // delete (archive) user
            // Route::delete('/users/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');
            //block and unblock user
            // Route::get('/{user_id}/block', [UserController::class, 'block'])->name('users.block');
            // Route::get('/{user_id}/unblock', [UserController::class, 'unblock'])->name('users.unblock');
    });

    Route::prefix('selfservice')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/appointments/list', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/enquiry/list', [EnquiryController::class, 'index'])->name('enquiry.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::view('/portal', 'portal.login')->name('login');

        // Users Management 
        Route::prefix('users')->group(function () {
            Route::get('/list', [UserController::class, 'index'])->name('users.index');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            // Create
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            // Edit users
            Route::patch('/{user_id}', [UserController::class, 'update'])->name('users.update');
            // Delete (Archive)
            Route::delete('/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');
            // Block & Unblock – use POST for state changes
            Route::post('/{user_id}/block', [UserController::class, 'block'])->name('users.block');
            Route::post('/{user_id}/unblock', [UserController::class, 'unblock'])->name('users.unblock');
        });

          // Contacts Management
          Route::prefix('contacts')->middleware(['auth', 'verified'])->group(function () {
              Route::get('/list', [\App\Http\Controllers\Contacts::class, 'index'])->name('contacts.index');
              Route::post('/', [\App\Http\Controllers\Contacts::class, 'store'])->name('contacts.store');
              Route::patch('/{id}', [\App\Http\Controllers\Contacts::class, 'update'])->name('contacts.update');
              Route::delete('/{id}', [\App\Http\Controllers\Contacts::class, 'destroy'])->name('contacts.destroy');
              Route::post('/import', [\App\Http\Controllers\Contacts::class, 'import'])->name('contacts.import');
              Route::get('/export', [\App\Http\Controllers\Contacts::class, 'export'])->name('contacts.export');
          });

          // SMS Management 
          Route::prefix('sms')->middleware(['auth', 'verified'])->group(function () {
              Route::get('/list', [\App\Http\Controllers\SmsController::class, 'index'])->name('sms.index');
              Route::post('/', [\App\Http\Controllers\SmsController::class, 'store'])->name('sms.store');
              Route::patch('/{id}', [\App\Http\Controllers\SmsController::class, 'update'])->name('sms.update');
              Route::delete('/{id}', [\App\Http\Controllers\SmsController::class, 'destroy'])->name('sms.destroy');
              Route::post('/send-to-all', [\App\Http\Controllers\SmsController::class, 'sendToAllContacts'])->name('sms.send_all');
          });

          // Reports
          Route::prefix('reports')->middleware(['auth', 'verified'])->group(function () {
              Route::get('/appointments', [\App\Http\Controllers\ReportsController::class, 'appointments'])->name('reports.appointments');
              Route::get('/users', [\App\Http\Controllers\ReportsController::class, 'users'])->name('reports.users');
              Route::get('/enquiries', [\App\Http\Controllers\ReportsController::class, 'enquiries'])->name('reports.enquiries');
              Route::get('/contacts', [\App\Http\Controllers\ReportsController::class, 'contacts'])->name('reports.contacts');
              Route::get('/sms', [\App\Http\Controllers\ReportsController::class, 'sms'])->name('reports.sms');
          });
      });
});

// Route::get('/selfservice/dashboard', function () {
//     return view('/portal/dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
