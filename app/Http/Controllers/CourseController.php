<?php

namespace App\Http\Controllers;

use App\Http\Resources\Courses\CourseResources;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::all();
    }


    public function SearchCourses(Request $request)
    {
        $returned = [];
        $returned['results'] = [];

        if ($request->has('term') && !empty($request->term)) {
            $term = trim($request->term);
            $data = Course::where('course_name', 'like', '%' . $term . '%')
                ->paginate(6);
            $current_page = $data->currentPage();
            $lastPage = $data->lastPage();
            if ($current_page < $lastPage)
                $returned['pagination'] = ['more' => true];
            $items = CourseResources::collection($data);
            $returned['results'] = $items;
        }
        return Response::json($returned);
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
            'course_name' => 'required|string',
            'course_credit' => 'required|string',
            'course_description' => 'required|string',
            'course_code' => 'required|string',
            'faculty_id' => 'required',
        ]);

        $course_name = $request->course_name;
        $course_credit = $request->course_credit;
        $course_description = $request->course_description;
        $course_code = $request->course_code;
        $faculty_id = $request->faculty_id;


        Course::create([
            'course_name' => $course_name,
            'course_credit' => $course_credit,
            'course_description' => $course_description,
            'course_code' => $course_code,
            'faculty_id' => $faculty_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_name' => 'required|string',
            'course_credit' => 'required|string',
            'course_description' => 'required|string',
            'course_code' => 'required|string',
            'faculty_id' => 'required|integer',
        ]);

        $Course = Course::findOrFail($id);
        $Course->update($request->all());

        return $Course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Course = Course::findOrFail($id);
        $Course->delete();
    }
}
