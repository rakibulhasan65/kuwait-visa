<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use Karim007\LaravelCaptcha\Facades\Captcha;
use App\Http\Controllers\Backend\VisaController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\VisaEmailController;
use App\Http\Controllers\Frontend\ManualVisaController;
use App\Http\Controllers\Backend\AdminContactController;
use App\Http\Controllers\Frontend\VisaInquiryController;
use App\Http\Controllers\Frontend\GetScanerDataController;
use App\Http\Controllers\Backend\AdminManualVisaController;
use App\Http\Controllers\Frontend\VisaInformationController;
use App\Http\Controllers\Frontend\UserElectronicVisaDownload;
use App\Http\Controllers\Frontend\ResidencyInquiriesController;
use App\Http\Controllers\Frontend\KuwaitVisaAppsModelController;
use App\Http\Controllers\Frontend\DownloadEmploymentVisaController;
Route::get('/manifest.json', function() {
    try {
        return response()->json([
            'name' => config('app.name', 'Kuwait Visa'),
            'short_name' => 'Kuwait Visa',
            'start_url' => url('/kuwait-evisa-verification/'),
            'scope' => '/kuwait-evisa-verification/',
            'display' => 'standalone',
            'background_color' => '#ffffff',
            'theme_color' => '#007bff',
            'icons' => [
                [
                    'src' => asset('images/icon/mipmap-mdpi/ic_launcher.png'),
                    'sizes' => '48x48',
                    'type' => 'image/png',
                    'purpose' => 'any maskable'
                ],
                [
                    'src' => asset('images/icon/mipmap-xxxhdpi/ic_launcher_round.png'),
                    'sizes' => '512x512',
                    'type' => 'image/png',
                    'purpose' => 'maskable'
                ]
            ]
        ])->header('Content-Type', 'application/manifest+json');
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Manifest generation failed',
            'message' => $e->getMessage()
        ], 500);
    }
})->name('pwa.manifest');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/visa-information', [VisaInformationController::class, 'index'])->name('visa-information');
Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/visa-email', [VisaEmailController::class, 'index'])->name('visa-email');
Route::get('/visa-inquiry',[VisaInquiryController::class, 'index'])->name('visa-inquiry');
Route::get('/visa-find',[VisaInquiryController::class, 'find'])->name('visa.find');
Route::get('/visa-details/{id}',[VisaInquiryController::class, 'details'])->name('visa.details');
Route::get('/visa-inquiry', [VisaInquiryController::class, 'index'])->name('visa-inquiry');
Route::get('/visa-download', [VisaInquiryController::class, 'download'])->name('visa.download');
Route::get('/kuwait-evisa-verification',[KuwaitVisaAppsModelController::class,'index'])->name('kuwait-evisa-verification');
Route::get('/web-app-visa-inquiries', [KuwaitVisaAppsModelController::class, 'visaInquiries'])->name('web-app-visa-inquiries');

Route::post('/web-app-evisa-details', [KuwaitVisaAppsModelController::class, 'visaDetails'])->name('web-app-evisa-details');
Route::get('/captcha', function () {
    return Captcha::create();
});
Route::get('/download-employment-visa', [DownloadEmploymentVisaController::class, 'downloadEmploymentVisa'])->name('download-employment-visa');
Route::get('/barcode-search-evisa', [GetScanerDataController::class, 'searchVisa']);
Route::get('/scan-visa-view-data', [GetScanerDataController::class, 'scanVisaViewData'])->name('scan-visa-view-data');
Route::get('/residency-inquiries', [ResidencyInquiriesController::class, 'residencyInquiries'])->name('residency-inquiries');
Route::get('/manual-visa', [ManualVisaController::class, 'manualVisa'])->name('manual-visa');
    Route::get('/manual-visa-download', [ManualVisaController::class, 'downloadManualVisaFromFrontend'])
    ->name('frontend-manual-visa-download');
Route::get('/captcha', function () {
    $captcha_text = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ123456789"), 0, 6);
    Session::put('captcha', $captcha_text);
    return response()->json(['captcha' => $captcha_text]);
});
Route::get('/user-electronic-visa-download', [UserElectronicVisaDownload::class, 'userElectronicVisaDownload'])->name('user-electronic-visa-download');
Route::get('/frontend-evisa-download', [UserElectronicVisaDownload::class, 'frontendEvisaDownload'])->name('frontend-evisa-download');
Route::get('/visa-verification-scan',[KuwaitVisaAppsModelController::class,'verificationScan'])->name('visa-verification-scan');
//home-visa-verification-scan
Route::get('/home-visa-verification-scan',[KuwaitVisaAppsModelController::class,'verificationScanHome'])->name('home-visa-verification-scan');
Route::get('/barcode-search', [KuwaitVisaAppsModelController::class, 'search'])->name('barcode.search');
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('frontend-manual-visas', AdminManualVisaController::class);
Route::get('/offline', function () {
    return view('frontend.offline');
});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('visas', VisaController::class);
    Route::post('/update-visa-status', [VisaController::class, 'updateVisaStatus'])->name('updateVisaStatus');
    Route::get('/evisa-download/{id}', [VisaController::class, 'downloadeVisa'])
    ->name('evisa-download');
    Route::resource('admin-manual-visas', AdminManualVisaController::class);
    Route::get('/manual-visa-download/{id}', [AdminManualVisaController::class, 'downloadManualVisa'])
    ->name('manual-visa-download');
    Route::resource('contacts', AdminContactController::class);
    Route::resource('users', UsersController::class);
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';