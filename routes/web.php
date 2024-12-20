    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\SessionController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CertificateController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\FoodinfoController;
    use App\Http\Controllers\InboxController;
    use App\Http\Controllers\AdminInboxController;
    use App\Http\Controllers\NibController;
    use App\Http\Controllers\TrainingController;
    use App\Http\Controllers\UserTrainingController;
    use App\Http\Controllers\permohonancontroller;
    use App\Http\Controllers\TesController;
    use App\Http\Controllers\UpdateStatusFoodInfo;
    use App\Http\Controllers\rateController;
    use Illuminate\Support\Facades\Route;


    Route::middleware(['guest'])->group(function () {
        Route::get('/tes', [TesController::class, 'index']);
        Route::get('/', function () {
            return view('landingPage');
        });
        Route::get('/login', [SessionController::class, 'index']);
        Route::post('/login', [SessionController::class, 'login'])->name('login');
        Route::get('/register', [Sessioncontroller::class, 'register']);

        Route::post('/CreateRegister', [SessionController::class, 'CreateRegister']);
      
        // 
      
    });


    //user
    Route::middleware(['auth'])->group(function () {

        Route::middleware(['Akses:user'])->group(function () {
            Route::middleware(['verif'])->group(function () {

            Route::resource('/profil', ProfileController::class);
            Route::resource('/layanan/pilihPelatihan', UserTrainingController::class);
            Route::resource('/layanan/makanSiang', FoodinfoController::class);
            Route::resource('/layanan/dokumen', NibController::class);
            Route::resource('/inbox', InboxController::class);
            Route::get('/layanan/pengajuan', [CertificateController::class, 'index']);
            Route::post('/pengajuan/create', [CertificateController::class, 'store'])->name('req.store');
            Route::get('/dashboard', [UserController::class, 'index']);
            Route::resource('/Permohonan', permohonancontroller::class);
            Route::get('/layanan', [UserController::class, 'service']);
            Route::resource('/surveyKepuasan', rateController::class);
            //email vrif
        });
        Route::get('/email/verify', [SessionController::class, 'showVerificationNotice'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [SessionController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    // Mengirim ulang email verifikasi
    Route::post('/email/verification-notification', [SessionController::class, 'resendVerification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
        });




        Route::get('/logout', [SessionController::class, 'logout']);

        //admin

        Route::middleware(['Akses:admin'])->group(function () {
            Route::resource('/ajukanPelatihan', TrainingController::class);
            Route::get('/InboxAdmin', [AdminInboxController::class, 'index']);
            Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('pengajuan.index');
            Route::post('/admin/dashboard/{id}/approve', [AdminController::class, 'approve'])->name('pengajuan.approve');
            Route::post('/admin/dashboard/{id}/approvenib', [AdminController::class, 'approveNib'])->name('pengajuan.approveNib');
            Route::post('/admin/pengajuan/{id}/reject', [AdminController::class, 'reject'])->name('pengajuan.reject');
            Route::post('/admin/pengajuan/{id}/rejectnib', [AdminController::class, 'rejectNib'])->name('pengajuan.rejectNib');
            Route::put('/approved/{Foodinfo}', [UpdateStatusFoodInfo::class, 'approved']);
            Route::put('/rejected/{Foodinfo}', [UpdateStatusFoodInfo::class, 'rejected']);
            Route::delete('/Delete/{Foodinfo}', [UpdateStatusFoodInfo::class, 'DeleteDataInfoFood']);
            Route::delete('/DeleteCerti/{Certificate}', [AdminController::class, 'deleteCertificate']);
            Route::delete('/DeleteNib/{Nib}', [AdminController::class, 'deleteNib']);


            Route::get('/export-users', [UserController::class, 'exportUsers']);
            Route::get('/export-report', [CertificateController::class, 'exportCertificates']);
            Route::get('/export-nib', [NibController::class, 'exportNib']);
        });
    });
