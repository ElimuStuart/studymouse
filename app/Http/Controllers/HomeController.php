<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $tutors = User::where('role', 'tutor');
        $students = User::where('role', 'student');
        return view('home', [
            'courses' => $courses,
            'tutors' => $tutors,
            'students' => $students
        ]);
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

        return view('show', $context);
    }


    public function store(Request $request, $id) {
        $course = Course::find($id);
        $tutor = User::all()->where('name', '=', $request->name);

        $course->users()->attach($tutor);

        return back()->with('success', 'Tutor attached successfully');
    }
}
