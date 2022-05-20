<?php

namespace App\Http\Controllers;

use App\Models\CorequisiteCourse;
use Illuminate\Http\Request;

class CorequisiteCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CorequisiteCourse::all();
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
            '   course_id' => 'required|string',
        ]);

        $course_id = $request->major_name;


        CorequisiteCourse::create([
            'course_id' => $course_id,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CorequisiteCourse  $corequisiteCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request, [
            '   course_id' => 'required|string',
        ]);
        $CorequisiteCourse = CorequisiteCourse::findOrFail($id);
        $CorequisiteCourse ->update($request->all());

        return $CorequisiteCourse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CorequisiteCourse  $corequisiteCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $CorequisiteCourse = CorequisiteCourse::findOrFail($id);
        $CorequisiteCourse->delete();
    }
}
