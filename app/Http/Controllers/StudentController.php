<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

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
        return view('students.index')->with('courses', $courses);
    }

}
