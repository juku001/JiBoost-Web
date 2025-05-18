<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SpecialDocumentsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('isFirstUser');
Route::get('privacy-policy', [SpecialDocumentsController::class, 'privacy']);
Route::get('app', [SpecialDocumentsController::class, 'app'])->name('playstore');

Route::middleware(['guest.api'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'create'])->name('login');
    Route::get('/register/start', [RegistrationController::class, 'type'])->name('auth.register.type');
    Route::post('/check/email', [RegistrationController::class, 'validateEmail'])->name('auth.register.validate.email');
    Route::post('/check/mobile', [RegistrationController::class, 'validateMobile'])->name('auth.register.validate.mobile');
    Route::post('/signup/start', [RegistrationController::class, 'store'])->name('signup');

    //new here
    Route::get('forgot_password', [AuthController::class, 'forgot'])->name('password.forgot');
    Route::post('forgot_password', [AuthController::class, 'email'])->name('password.email');
    Route::get('verify', [AuthController::class, 'send_code'])->name('password.send');
    Route::post('verify', [AuthController::class, 'verify'])->name('password.verify');
    Route::post('resend', [AuthController::class, 'resend'])->name('password.resend');
    Route::get('reset_password', [AuthController::class, 'reset'])->name('password.reset');
    Route::post('reset_password', [AuthController::class, 'resetPassword'])->name('password.new');
});

Route::middleware(['api.auth'])->group(function () {

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('update_password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        Route::get('/delete', [AuthController::class, 'destroy'])->name('profile.delete'); //not yet done.
        Route::get('display-photo', [ProfileController::class, 'display'])->name('profile.display.photo');
        Route::post('display-photo', [ProfileController::class, 'upload'])->name('profile.display.photo.upload');
        Route::delete('display-photo', [ProfileController::class, 'destroy'])->name('profile.display.photo.delete');
    });

    Route::prefix('notifications')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
    });
    Route::prefix('community')->group(function () {
        Route::get('/', [CommunityController::class, 'index'])->name('community.index');
    });

    Route::get('/help-center', [FaqController::class, 'help'])->name('helpcenter.index');

    Route::middleware(['isNotAdmin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

        Route::get('/payments', [PaymentController::class, 'index'])->name('dashboard.payments');
        Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('dashboard.payments.show');

        Route::get('/results', [ExamResultController::class, 'index'])->name('dashboard.results');
        Route::get('/results/{id}', [ExamResultController::class, 'show'])->name('dashboard.results.show');

        Route::get('/subscribe', [SubscriptionController::class, 'index'])->name('dashboard.subscription');
        Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('dashboard.subscribe');
        Route::get('/confirmation/{ref}', [SubscriptionController::class, 'wait'])->name('dashboard.subscription.wait');
        Route::prefix('exams')->group(function () {
            Route::get('/', [ExamController::class, 'index'])->name('dashboard.exams');
            Route::get('/{id}', [ExaminationController::class, 'series'])->name('examination.series');
            Route::get('/{id}/deny', [ExaminationController::class, 'deny'])->name('examination.series.deny');
            Route::get('/{id}/deduct', [ExaminationController::class, 'deduct'])->name('examination.series.deduct');
            Route::get('/{sub}/{series}', [ExaminationController::class, 'examInfo'])->name('examination.series.show');
            Route::get('/{sub}/{series}/start', [ExaminationController::class, 'startExam'])->name('examination.series.start');
            Route::post('/{sub}/{series}/submit', [ExaminationController::class, 'submitExam'])->name('examination.series.submit');
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('admin')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard.admin.home');
        Route::get('users', [UsersController::class, 'index'])->name('dashboard.admin.users');
        Route::get('payments', [PaymentController::class, 'admin'])->name('dashboard.admin.payments');
        Route::get('quotes', [QuoteController::class, 'index'])->name('dashboard.admin.quotes');
        Route::post('quote/add', [QuoteController::class, 'store'])->name('admin.quote.add');
        // Route::get('exams', [ExamController::class, 'admin'])->name('dashboard.admin.exams');
        Route::prefix('exams')->group(function () {
            Route::get('add_series', [ExamController::class, 'add_series'])->name('admin.exams.add_series');
            Route::post('add_series', [ExamController::class, 'series_add'])->name('admin.exams.series_add');

            Route::get('series', [ExamController::class, 'series'])->name('admin.exams.series');
            Route::get('series/{levelSub}', [ExamController::class, 'show'])->name('admin.exams.series.show');
            Route::get('series/{levelSub}/questions/{seriesId}', [ExamController::class, 'questions'])->name('admin.exams.questions.show');
            Route::get('series/{levelSub}/questions/{seriesId}/add', [ExamController::class, 'addQuestions'])->name('admin.exams.questions.add');
            Route::post('series/{levelSub}/questions/{seriesId}/add', [ExamController::class, 'questionAdd'])->name('admin.exams.questions.store');

            Route::get('add_subjects', [ExamController::class, 'add_subjects'])->name('admin.exams.add_subjects');
        });

        Route::prefix('delete')->group(function () {
            Route::get('question/{id}', [QuestionController::class, 'destroy'])->where('id', '[0-9]+')->name('admin.delete.question');
        });

    })->middleware('isAdmin');
});





// Route::get('/tester', function () {
//     $questions = [
//         // **Chemical Equations**
//         'chemical' => '\\( CH_4 + 2O_2 \\rightarrow CO_2 + 2H_2O \\)',

//         // **Differential Equation**
//         'differential' => '\\( \\frac{dy}{dx} = x^2 + y^2 \\)',

//         // **Quadratic Equation**
//         'quadratic' => '\\( ax^2 + bx + c = 0 \\)',

//         // **Integral Calculus**
//         'integral' => '\\( \\int_0^1 x^2 dx \\)',

//         // **Summation Notation**
//         'summation' => '\\( \\sum_{n=1}^{\\infty} \\frac{1}{n^2} \\)',

//         // **Pythagorean Theorem**
//         'pythagorean' => '\\( a^2 + b^2 = c^2 \\)',

//         // **Binomial Theorem**
//         'binomial' => '\\( (a + b)^n = \\sum_{k=0}^{n} \\binom{n}{k} a^{n-k} b^k \\)',

//         // **Limits**
//         'limit' => '\\( \\lim_{x \\to \\infty} \\frac{1}{x} = 0 \\)',

//         // **Logarithmic Identity**
//         'logarithm' => '\\( \\log_a (bc) = \\log_a b + \\log_a c \\)',

//         // **Matrix Representation**
//         'matrix' => '\\( A = \\begin{bmatrix} a & b \\\\ c & d \\end{bmatrix} \\)',

//         // **Trigonometric Identity**
//         'trigonometry' => '\\( \\sin^2 x + \\cos^2 x = 1 \\)',



//         // **Einstein's Mass-Energy Equation**
//         'einstein' => '\\( E = mc^2 \\)',

//         // **Probability Formula**
//         'probability' => '\\( P(A \\cap B) = P(A) P(B) \\)',

//         // **Vector Dot Product**
//         'dot_product' => '\\( \\mathbf{A} \\cdot \\mathbf{B} = |\\mathbf{A}| |\\mathbf{B}| \\cos \\theta \\)',

//         // **Fourier Series**
//         'fourier' => '\\( f(x) = a_0 + \\sum_{n=1}^{\\infty} a_n \\cos(nx) + b_n \\sin(nx) \\)'
//     ];

//     return view('tester', compact('questions'));
// });



// Route::get('/tester_add', function () {
//     return view('tester_quill');
// });

// Route::post('/test_add', function (Request $request) {

//     return response()->json($request);


// })->name('test.latex');