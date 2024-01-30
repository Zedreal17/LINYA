<?php
use App\Http\Controllers\ChartController;
use App\Http\Controllers\facultyController;
use App\Http\Controllers\updateAPprovalController;
use App\Models\FacultyInformation;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Announcement;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;    
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    // Check if the user is already authenticated
    if (auth()->check()) {
        // Redirect to the home page
        return redirect('/home');
    }

    // If not authenticated, show the login page
    return view('/auth/login');
});
Route::get('/dashboard/pdf/departmentRequest', [DashboardController::class, 'generatePdfForDepartmentRequest']);
Route::get('/dashboard/pdf/department-count', [DashboardController::class, 'generatePdfForDepartmentCount']);
Route::get('/dashboard/pdf/summarydep', [DashboardController::class, 'summarydep']);
Route::get('/print1', function () {
    
    return view('/print1');
});
Route::get('/view1', function () {
    $posts = Announcement::all();
    return view('/view1' , ['posts'=> $posts]);
});

Route::get('/announcement', function () {
    $posts = Announcement::where('announcement_status', 'ACTIVE')->get();
return view('/announcement', ['posts' => $posts]);
});
// Route::get('/announcement',[AnnouncementController::class,'index']);
Route::post('/announcement', [AnnouncementController::class, 'stored'])->name('announcement.stored');

Route::get('/dashboard', [DashboardController::class, 'countAppointments']);
// Route::get('/dashboartd', [ChartController::class,'appointmentReasonsChart']);
// Route::get('/home', function () {
//     return view('/home');
// });
Route::get('/home',[HomeController::class,'index']);
Route::get('/facultyinfo', function () {
    $posts = FacultyInformation::where('facultyStatus', 'ACTIVE')->get();
return view('/facultyinfo', ['posts' => $posts]);
});
Route::post('/stored', [facultyController::class, 'stored'])->name('facultyinfo.stored');

Route::get('/home/{department}', [HomeController::class, 'department'])->name('department');

Route::get('/editQueue/{post}', [HomeController::class,'showPost']);
Route::put('/editQueue/{post}', [HomeController::class,'editPost']);
Route::put('/missedQueue/{post}', [HomeController::class,'missPost']);

Route::get('/schedule', [ScheduleController::class,'index']);
Route::get('/schedule/computer-studies', [ScheduleController::class, 'computerStudiesSchedule']);
Route::get('/schedule/electrical-engineering', [ScheduleController::class, 'electricalEngineeringSchedule']);
Route::get('/schedule/civil-engineering', [ScheduleController::class, 'CivilEngineeringSchedule']);
Route::get('/schedule/arch-engineering', [ScheduleController::class, 'ArchitecturalEngineeringSchedule']);


Route::get('/studentdata/computer-studies', [StudentController::class, 'computerStudiesSchedule']);
Route::get('/studentdata/electrical-engineering', [StudentController::class, 'electricalEngineeringSchedule']);
Route::get('/studentdata/civil-engineering', [StudentController::class, 'CivilEngineeringSchedule']);
Route::get('/studentdata/arch-engineering', [StudentController::class, 'ArchitecturalEngineeringSchedule']);
//Route::get('/appointment', [AppointmentController::class,'countAppointments']);
Route::get('/appointment', [AppointmentController::class,'index']);


Route::get('/facultyApprovalView/{id}', [updateAPprovalController::class, 'facultyApprovalView']);
Route::get('/getAppointmentDetails/{id}', [AppointmentController::class,'getAppointmentDetails']);

Route::put('/updateAppointment/{post}', [AppointmentController::class,'updateAppointment']);

Route::put('/updateAppointmentwithfaculty/{id}', [AppointmentController::class, 'updateAppointmentwithfaculty'])->name('update.appointment.with.faculty');


Route::put('/rejectAppointment/{post}', [AppointmentController::class,'rejectAppointment']);

Route::get('/studentdata', function () {
    return view('/studentdata');
});
Route::get('/profile', function () {
    return view('/profile');
});
Route::post('/uploadProfileImage/{user}', [RegisterController::class, 'updateImage']);


Route::post('/store', [AnnouncementController::class, 'store']);

Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product', [ProductController::class,'store'])->name('product.store');

Route::put('/editQueueAnnounce/{id}', [AnnouncementController::class, 'updateAnnouncement']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
