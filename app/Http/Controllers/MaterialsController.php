<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

use App\Material;

use App\Course;

class MaterialsController extends Controller
{

    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=> 'required',
            'material' => 'required|file|max:2048'
        ]);
        
        $course_id = session('course_id');

        $material = new Material;
        $material->description = $request->input('description');

        // check if profile image has been uploaded
        if ($request->has('material')) {
            // get image file
            $file = $request->file('material');
            // make image name based on username and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // define folder path
            $folder = '/uploads/files/';
            // make file path where image will be stored [folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $file->getClientOriginalExtension();
            // upload the image
            $this->uploadOne($file, $folder, 'public', $name);
            // set user profile image path in database to filePath
            $material->material = $filePath;
        }

        $course = Course::find($course_id);
        $course->materials()->save($material);

        return redirect('/tutor/course/'.$course_id)->with('success', 'Post Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
