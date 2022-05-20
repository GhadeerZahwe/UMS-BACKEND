<?php

namespace App\Http\Controllers;

use App\Models\PrerequisiteCourse;
use Illuminate\Http\Request;

class PrerequisiteCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PrerequisiteCourse::all();
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'course_id' => 'required|string',
        ]);

        $course_id = $request->major_name;


        PrerequisiteCourse::create([
            'course_id' => $course_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrerequisiteCourse  $prerequisiteCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(PrerequisiteCourse $prerequisiteCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrerequisiteCourse  $prerequisiteCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            '   course_id' => 'required|string',
        ]);
        $PrerequisiteCourse = PrerequisiteCourse::findOrFail($id);
        $PrerequisiteCourse ->update($request->all());

        return $PrerequisiteCourse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrerequisiteCourse  $prerequisiteCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PrerequisiteCourse = PrerequisiteCourse::findOrFail($id);
        $PrerequisiteCourse->delete();
    }
}
