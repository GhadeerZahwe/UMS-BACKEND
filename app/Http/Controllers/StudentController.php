<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Student::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'blood_type' => 'required|string',
            'gender' => 'required|string',
            'phone_number' => 'required|string',
            'mobile_number' => 'required|string',
            'personal_email' => 'required|string',
            'martial_status' => 'required|string',
            'mother_name' => 'required|string',
            'street' => 'required|string',
            'building' => 'required|string',
            'floor' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|string',
            'major_id' => 'required',
            'user_id' => 'required',
        ]);

        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $blood_type = $request->blood_type;
        $gender = $request->gender;
        $phone_number = $request->phone_number;
        $mobile_number = $request->mobile_number;
        $personal_email = $request->personal_email;
        $martial_status = $request->martial_status;
        $mother_name = $request->mother_name;
        $street = $request->street;
        $building = $request->building;
        $floor = $request->floor;
        $city = $request->city;
        $email = $request->email;
        $major_id = $request->major_id;
        $user_id = $request->user_id;


        Student::create([
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'blood_type' => $blood_type,
            'gender' => $gender,
            'phone_number' => $phone_number,
            'mobile_number' => $mobile_number,
            'personal_email' => $personal_email,
            'martial_status' => $martial_status,
            'mother_name' => $mother_name,
            'street' => $street,
            'building' => $building,
            'floor' => $floor,
            'city' => $city,
            'email' => $email,
            'major_id' => $major_id,
            'user_id' => $user_id,
        ]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'blood_type' => 'required|string',
            'gender' => 'required|string',
            'phone_number' => 'required|string',
            'mobile_number' => 'required|string',
            'personal_email' => 'required|string',
            'martial_status' => 'required|string',
            'mother_name' => 'required|string',
            'street' => 'required|string',
            'building' => 'required|string',
            'floor' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|string',
            'major_id' => 'required',
            'user_id' => 'required',
        ]);
        $Student = Student::findOrFail($id);
        $Student->update($request->all());

        return $Student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Student = Student::findOrFail($id);
        $Student->delete();
    }
}
