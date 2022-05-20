<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Attendance::all();
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
            'attendance_day' => 'required|string',
            'attendance_status' => 'required|string',
            'studentregistration_id' => 'required',
        ]);

        $attendance_day = $request->attendance_day;
        $attendance_status = $request->attendance_status;
        $studentregistration_id = $request->studentregistration_id;


        Attendance::create([
            'attendance_day' => $attendance_day,
            'attendance_status' => $attendance_status,
            'studentregistration_id' => $studentregistration_id,
        ]);
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $id)
    {

        $this->validate($request, [
            'attendance_day' => 'required|string',
            'attendance_status' => 'required|string',
            'studentregistration_id' => 'required',
        ]);
        $attendance= Attendance::findOrFail($id);
        $attendance->update($request->all());

        return $attendance;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $id)
    {
        $attendance= Attendance::findOrFail($id);
        $attendance->delete();
    }
}
