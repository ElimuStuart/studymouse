<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;
use Auth;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $user = User::find(Auth::id());
        if ($user->subscriptions[0]->stripe_plan == "Basic") {
            $courses = $courses->take(1);
        } else {
            # code...
        }
        
        return view('students.index')->with('courses', $courses);
    }

    public function show($id)
    {
        // $this->authorize('show', StudentController::class);
        // $tutor = User::find(Auth::id());
        $course = Course::find($id);
        $materials = $course->materials;
        $tutors = $course->users;
        session(['course_id' => $course->id]);
        $context = [
            'course'=> $course,
            'materials' => $materials,
            'tutors' => $tutors
        ];

        return view('tutors.course')->with('context', $context);
    }
}
