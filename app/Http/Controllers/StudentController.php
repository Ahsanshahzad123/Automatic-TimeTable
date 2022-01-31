<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class StudentController extends Controller
{
    public function index()
    {
        $course = Course::latest()->get();
        $user = User::find(auth()->user()->id);
        //return $user->courses->name;
        if(auth()->user()->roles()->first()->name == "Student") {
            return view('student.student',compact('course','user'));
            
        } else {
            return redirect()->route('admin.admin');  
       }
    }
    public function registerCourse($id)
    {
        $user = User::find(auth()->user()->id);
        $course = Course::findorfail($id);
        $check = false;
        if($user->courses->contains($id)) 
       {
        return redirect()->back()->with('message', 'Course is already Registerd!');
       }
        else{
            foreach ($user->courses as $users)
            {
                $from = $users->from;
                $to = $users->to;
                if($from<=$course->from || $course->from <= $to | $from<=$course->to ||  $course->to<= $to )
                {
                    $check = true;
                    return redirect()->back()->with('message', 'Time Slot has already course!');
                }
            }
            if(!$check)
            {
                $user->courses()->attach($id);
                return redirect()->back()->with('created', 'Course Registerd successfully!');
            }
           
        }
        
        
    }


}
