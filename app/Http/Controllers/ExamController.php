<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\OfferedCourse;
use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Exam::all();

//        $id = Auth::user()->id;
//        return $id;
    }

//    public function FindFinalsSchedule(Request $request)
//    {
//        $this->validate($request, [
//            'semester_id' => 'required|exists:semester,id',
//        ]);
//        $semester_id = $request->semester_id;
//
//        $data = Exam::query()
//            ->whereHas('offered_course', function ($query) use ($semester_id) {
//                $query->where('semester_id', $semester_id);
//            })
//            ->whereHas('offered_course.studentregistration', function ($query) {
//                $query->where('student_id', Auth::id());
//            })
//            ->with(['offered_course' => function ($query) use ($semester_id) {
//                $query->where('semester_id', $semester_id);
//            }, 'offered_course.studentregistration' => function ($query) {
//                $query->where('student_id', Auth::id());
//                $query->select(['id', 'course_status', 'offered_course_id', 'student_id']);
//
//            }, 'offered_course.course', 'offered_course.semester'])
//            ->get();
//        return $data;
//    }

    public function FinalExamSchedule()
    {
        $exams = Exam::all();
        foreach ($exams as $exam) {
            $offered_course_id = $exam['offered_course_id'];
            $course_id = OfferedCourse::where('id', $offered_course_id)->value('course_id');
            $course_name = Course::where('id', $course_id)->value('course_name');
            $offered_course_section = OfferedCourse::where('id', $offered_course_id)->value('offered_course_section');
            $exam_time = $exam['exam_time'];
            $exam_room = $exam['exam_room'];
            $exam_date = $exam['exam_date'];
            $exam_array[] = [
                'course_name' => $course_name,
                'offered_course_section' => $offered_course_section,
                'exam_time' => $exam_time,
                'exam_room' => $exam_room,
                'exam_date' => $exam_date
            ];
        }
        return $exam_array;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'exam_date' => 'required|string',
            'exam_room' => 'required|string',
            'exam_time' => 'required|string',
            'student_id' => 'required|string',
            'offered_course_id' => 'required|string',
        ]);

        $exam_date = $request->exam_date;
        $exam_room = $request->exam_room;
        $exam_time = $request->exam_time;
        $student_id = $request->student_id;
        $offered_course_id = $request->offered_course_id;


        Exam::create([
            'exam_date' => $exam_date,
            'exam_room' => $exam_room,
            'exam_time' => $exam_time,
            'student_id' => $student_id,
            'offered_course_id' => $offered_course_id,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'exam_date' => 'required|string',
            'exam_room' => 'required|string',
            'exam_time' => 'required|string',
            'student_id' => 'required|string',
            'offered_course_id' => 'required|string',
        ]);

        $Exam = Exam::findOrFail($id);
        $Exam->update($request->all());

        return $Exam;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Exam = Exam::findOrFail($id);
        $Exam->delete();
    }
}
