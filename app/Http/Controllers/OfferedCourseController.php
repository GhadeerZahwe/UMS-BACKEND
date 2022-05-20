<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\OfferedCourse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;

class OfferedCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OfferedCourse::all();    //select * from offered_course

    }



    public function FindOfferedCourses(Request $request)
    {
        $this->validate($request, [
            'semester_id' => 'required|exists:semester,id',
            'faculty_id' => 'required|exists:offered_course,id',
        ]);
        $semester_id = $request->semester_id;
        $faculty_id = $request->faculty_id;
        $faculty = Course::where('faculty_id', $faculty_id)->value('id');
        $data = OfferedCourse::where('semester_id', $semester_id)->where('course_id', $faculty)->get();
        return $data;
    }

    public function SelectOfferedCourse(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|exists:course,id',
            'instructor_id' => 'required|exists:instructor,id',
        ]);
        $course_id = $request->course_id;
        $instructor_id = $request->instructor_id;
        $data = OfferedCourse::where('course_id', $course_id)->where('instructor_id', $instructor_id)->get();
        return $data;
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
            'offered_course_room' => 'required|string',
            'offered_course_time' => 'required|string',
            'offered_course_date' => 'required|string',
            'offered_course_section' => 'required|string',
            'semester_id' => 'required|exists:semester,id',
            'instructor_id' => 'required|exists:semester,id',
            'course_id' => 'required|exists:semester,id',
        ]);

        $offered_course_room = $request->offered_course_room; //315B
        $offered_course_time = $request->offered_course_time;
        $offered_course_date = $request->offered_course_date;
        $offered_course_section = $request->offered_course_section;
        $semester_id = $request->semester_id;
        $instructor_id = $request->instructor_id;
        $course_id = $request->course_id;


//        INSERT INTO offered_course (offered_course_room)
//        VALUES ($offered_course_room);
//        =>>>
        // $createNew //=
        //
        OfferedCourse::create([
            'offered_course_room' => $offered_course_room,
            'offered_course_time' => $offered_course_time,
            'offered_course_date' => $offered_course_date,
            'offered_course_section' => $offered_course_section,
            'semester_id' => $semester_id,
            'instructor_id' => $instructor_id,
            'course_id' => $course_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfferedCourse $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'offered_course_room' => 'required|string',
            'offered_course_time' => 'required|string',
            'offered_course_date' => 'required|string',
            'offered_course_section' => 'required|string',
            'semester_id' => 'required|exists:semester,id',
            'instructor_id' => 'required|exists:semester,id',
            'course_id' => 'required|exists:semester,id',
        ]);
        $OfferedCourse = OfferedCourse::findOrFail($id); //ex:math
        $OfferedCourse->update($request->all());

        return $OfferedCourse;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OfferedCourse $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $OfferedCourse = OfferedCourse::findOrFail($id); //math
        $OfferedCourse->delete();
    }
}
