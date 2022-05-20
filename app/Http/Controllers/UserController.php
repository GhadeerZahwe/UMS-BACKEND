<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024']
        ]);

        $username = $request->username;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = User::query()->create([
            'name' => $username,
            'email' => $email,
            'password' => $password
        ]);

        if ($request->hasFile('photo')) {
            $user->updateProfilePhoto($request->file('photo'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024']
        ]);
        $User = User::findOrFail($id);
        $User->update($request->except('photo'));

        if ($request->hasFile('photo')) {
            $User->updateProfilePhoto($request->file('photo'));
        }


        return $User;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
    }
}
