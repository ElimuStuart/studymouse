<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;
use Auth;

class TutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutor = User::find(Auth::id());
        $courses = $tutor->courses;

        return view('tutors.index', compact('courses', 'courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $materials = $course->materials;

        return view('tutors.course', compact('course', 'course'));
    }
}
