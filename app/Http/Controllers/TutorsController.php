<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;
use Auth;

class TutorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('tutor');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutor = User::find(Auth::id());
        $courses = $tutor->courses;

        return view('students.index', compact('courses', 'courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
