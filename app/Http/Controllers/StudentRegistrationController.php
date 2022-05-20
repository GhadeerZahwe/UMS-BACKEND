<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\OfferedCourse;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentRegistration::all();
    }

    public function FindStudentRegistrationCourses(Request $request)
    {
        $user = auth()->user();
        $student_id = $user['id'];
//        $current_student= Student::where('user_id',$student_id)->get();
        $current_registration= StudentRegistration::where('student_id',$student_id)->get();
        $offered_courses_id= StudentRegistration::where('student_id',$student_id)->value('offered_course_id');
        $offered_courses= StudentRegistration::where('student_id',$student_id)->get();
        $courses = OfferedCourse::where('course_id',$offered_courses_id)->get();
//        $courses_names=Course::where('id',$courses_id)->get();
        $courses_details=['course_name','course_code','course_credit'];
//        foreach ($courses as $course){


//        }
//        $courses_names=Course::where('id',1)->get();

        return $courses;
    }


    public function FindStudentRegistration(Request $request)
    {
        $this->validate($request, [
            'semester_id' => 'required|exists:semester,id',
        ]);
        $semester_id = $request->semester_id;

        return StudentRegistration::query()
            ->whereHas('offered_course', function ($query) use ($semester_id) {
                $query->where('semester_id', $semester_id);
            })
            ->with(['offered_course' => function ($query) use ($semester_id) {
                $query->where('semester_id', $semester_id);
            }, 'offered_course.instructor', 'offered_course.course', 'offered_course.semester'])
            ->where('student_id', Auth::id())->get();
    }

//    public function FindStudentRegistration(Request $request)
//    {
//        $this->validate($request, [
//            'semester_id' => 'required|exists:semester,id',
//        ]);
//        $semester_id = $request->semester_id;
//
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'letter_grade' => 'nullable|string',
                'passed_failed_grade' => 'nullable|string',
                'mark_grade' => 'nullable|string',
                'attendance' => 'required|string',
                'course_status' => 'required|string',
                'assignments_grade' => 'nullable|string',
                'midterm_grade' => 'nullable|string',
                'participation_grade' => 'nullable|string',
                'quizzes_grade' => 'nullable|string',
                'finalExam_grade' => 'nullable|string',
                'total_grade' => 'nullable|string',
                'student_id' => 'required|string',
                'offered_course_id' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response(['error' => $e->errors()], 400);
        }

        $letter_grade = $request->letter_grade;
        $passed_failed_grade = $request->passed_failed_grade;
        $mark_grade = $request->mark_grade;
        $attendance = $request->attendance;
        $course_status = $request->course_status;
        $student_id = $request->student_id;
        $assignments_grade = $request->assignments_grade;
        $midterm_grade = $request->midterm_grade;
        $participation_grade = $request->participation_grade;
        $quizzes_grade = $request->quizzes_grade;
        $finalExam_grade = $request->finalExam_grade;
        $total_grade = $request->total_grade;
        $offered_course_id = $request->offered_course_id;


        StudentRegistration::create([
            'letter_grade' => $letter_grade,
            'passed_failed_grade' => $passed_failed_grade,
            'mark_grade' => $mark_grade,
            'attendance' => $attendance,
            'student_id' => $student_id,
            'course_status' => $course_status,
            'offered_course_id' => $offered_course_id,
            'assignments_grade' => $assignments_grade,
            'midterm_grade' => $midterm_grade,
            'participation_grade' => $participation_grade,
            'quizzes_grade' => $quizzes_grade,
            'finalExam_grade' => $finalExam_grade,
            'total_grade' => $total_grade,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StudentRegistration $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'letter_grade' => 'nullable|string',
            'passed_failed_grade' => 'nullable|string',
            'mark_grade' => 'nullable|string',
            'attendance' => 'required|string', //bde a3mello drop w a3mello new table
            'course_status' => 'required|string',
            'assignments_grade' => 'nullable|string',
            'midterm_grade' => 'nullable|string',
            'participation_grade' => 'nullable|string',
            'quizzes_grade' => 'nullable|string',
            'finalExam_grade' => 'nullable|string',
            'total_grade' => 'nullable|string',
            'student_id' => 'required|string',
            'offered_course_id' => 'required|string',
        ]);
        $StudentRegistration = StudentRegistration::findOrFail($id);
        $StudentRegistration->update($request->all());
        return $StudentRegistration;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StudentRegistration $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $StudentRegistration = StudentRegistration::findOrFail($id);
        $StudentRegistration->delete();
    }
}
