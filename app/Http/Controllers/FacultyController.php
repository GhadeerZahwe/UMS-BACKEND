<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Faculty::all();
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
            'faculty_name' => 'required|string',
            'faculty_code' => 'required|string',
        ]);

        $faculty_name = $request->faculty_name;
        $faculty_code = $request->faculty_code;


        Faculty::create([
            'faculty_name' => $faculty_name,
            'faculty_code' => $faculty_code,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'faculty_name' => 'required|string',
            'faculty_code' => 'required|string',

        ]);
        $faculty = Faculty::findOrFail($id);
        $faculty->update($request->all());

        return $faculty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faculty $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
    }
}
