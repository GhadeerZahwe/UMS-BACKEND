<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Major::all();
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
            'major_name' => 'required|string',
            'faculty_id' => 'required|string',
        ]);

        $major_name = $request->major_name;
        $faculty_id = $request->faculty_id;


        Major::create([
            'major_name' => $major_name,
            'faculty_id' => $faculty_id,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Major $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Major $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'major_name' => 'required|string',
            'faculty_id' => 'required|string'
        ]);
        $Major = Major::findOrFail($id);
        $Major->update($request->all());

        return $Major;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Major $major
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Major = Major::findOrFail($id);
        $Major->delete();
    }
}
