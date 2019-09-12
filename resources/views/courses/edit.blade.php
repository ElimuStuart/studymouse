@extends('layouts.app')

@section('content')
<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url({{ asset('images/img_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <h1 data-aos="fade-up" data-aos-delay="0">{{$course->name}}</h1>
                <p data-aos="fade-up"  class="text-white" data-aos-delay="100">${{ $course->time }} / Month</p>
            </div>

            
            </div>
        </div>
        
        </div>
    </div>
    </div>
</div>

<div class="site-section">
<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-5">
            <div class="mb-5">
                <h3 class="text-black">Edit Course: {{$course->name}}</h3>

                <div class="mb-5 border rounded">
                    <form method="POST" class="form-box" action="{{action('CoursesController@update', $course->id)}}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="courseName">Name</label>
                            <input type="text" value="{{$course->name}}" class="form-control" id="courseName" aria-describedby="courseName" placeholder="Course Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="courseDescription">Description</label>
                            <textarea name="description" value="{{$course->description}}" class="form-control" id="courseDescription" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="courseTime">Time</label>
                            <input type="text" value="{{$course->time}}" class="form-control" id="courseTime" placeholder="Time" name="time">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" value="{{$course->start_date}}" class="form-control" id="start_date" placeholder="Start Date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" value="{{$course->end_date}}" class="form-control" id="end_date" placeholder="End Date" name="end_date">
                        </div>
                        <button type="submit" class="btn btn-primary  py-3 px-5 btn-pill">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
