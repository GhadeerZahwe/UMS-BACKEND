<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfferedCourseController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CorequisiteCourseController;
use App\Http\Controllers\PrerequisiteCourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\UserController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);


//    Route::post('findOfferedCourses', [OfferedCourseController::class, 'listOfOfferedCourses']);
    Route::get('SearchCourses', [CourseController::class, 'SearchCourses']);
    Route::get('FindOfferedCourses', [OfferedCourseController::class, 'FindOfferedCourses']);
   // Route::get('IndexMySchedule', [OfferedCourseController::class, 'IndexMySchedule']);
    Route::get('SelectOfferedCourse', [OfferedCourseController::class, 'SelectOfferedCourse']);
    Route::get('FindStudentRegistration', [StudentRegistrationController::class, 'FindStudentRegistration']);
    Route::get('FindStudentRegistrationCourses', [StudentRegistrationController::class, 'FindStudentRegistrationCourses']);
    //Route::get('FindFinalsSchedule', [ExamController::class, 'FindFinalsSchedule']);
    Route::get('FinalExamSchedule', [ExamController::class, 'FinalExamSchedule']);

    Route::apiResources([
        'Users' => UserController::class,
        'OfferedCourse' => OfferedCourseController::class,
        'Student' => StudentController::class,
        'CorequisiteCourse' => CorequisiteCourseController::class,
        'Course' => CourseController::class,
        'Curriculum' => CurriculumController::class,
        'Exam' => ExamController::class,
        'Faculty' => FacultyController::class,
        'Instructor' => InstructorController::class,
        'PrerequisiteCourse' => PrerequisiteCourseController::class,
        'Semester' => SemesterController::class,
        'Major' => MajorController::class,
        'StudentRegistration' => StudentRegistrationController::class,
        'Attendance' => StudentRegistrationController::class,
    ]);
});


Route::get('test', function () {
    var_dump(1);
});

Route::get('test2', function () {
    var_dump(1);
});

