<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $course = Course::latest()->get();
        $user = User::role('Student')->latest()->get();
        if(auth()->user()->roles()->first()->name == "Super Admin") {
            return view('admin.admin',compact('course','user'));   
        } else {
            return redirect()->route('student.student');
       }
    }
    public function course(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->hours = $request->hour;
        $course->from = $request->from;
        $course->to = $request->to;
        $course->day = $request->day;

        $course->save();
        return redirect()->back()->with('created', 'Course created successfully!');
    }
    public function student(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users'
        ]);

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->assignRole('Student');

        $user->save();
        return redirect()->back()->with('created', 'Course created successfully!');
    }
}
