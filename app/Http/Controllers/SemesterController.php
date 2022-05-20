<?php

namespace App\Http\Controllers;

use App\Http\Resources\Semester\SemesterResources;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Semester::all();
    }

//    public function findSemester(Request $request): JsonResponse
//    {
//        $returned = [];
//        $returned['results'] = [];
//
//        if ($request->has('term') && !empty($request->term)) {
//            $term = trim($request->term);
//            $data = Semester::where('semester_name', 'like', $term . '%')
//                ->paginate(6);
//            $current_page = $data->currentPage();
//            $lastPage = $data->lastPage();
//            if ($current_page < $lastPage)
//                $returned['pagination'] = ['more' => true];
//            $items = SemesterResources::collection($data);
//            $returned['results'] = $items;
//        }
//        return Response::json($returned);
//    }

       /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'semester_name' => 'required|string',
            'academic_year' => 'required|string',
        ]);

        $semester_name = $request->semester_name;
        $academic_year = $request->academic_year;


        Semester::create([
            'semester_name' => $semester_name,
            'academic_year' => $academic_year,
        ]);
    }


        /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'semester_name' => 'required|string',
            'academic_year' => 'required|string',
        ]);

        $Semester= Semester::findOrFail($id);
        $Semester->update($request->all());

        return $Semester;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Semester = Semester::findOrFail($id);
        $Semester->delete();
    }
}
