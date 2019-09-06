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
                <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
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
            <h3 class="text-black">Course Description</h3>
            <p class="mb-4">
            <strong class="text-black mr-3">Schedule: </strong> {{$course->start_date}} - {{$course->end_date}}
            </p>
            <p>{{$course->description}}</p>
            

        </div>
        
        <div class="pt-5">
            <h3 class="mb-5">Actions</h3>
            <a href="#" class="btn btn-primary">Edit</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collaapseExample" role="button" aria-expanded="false" aria-controls="collaapseExample">
              Add Tutor
            </a>
            <div class="collapse pt-3" id="collaapseExample">
            <div class="card card-body">
              <form method="POST" action="{{action('HomeController@store', $course->id)}}">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                  <div class="form-group">
                      <label for="courseName">Name</label>
                      <input type="text" class="form-control" id="courseName" aria-describedby="courseName" placeholder="Course Name" name="name">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            </div>
            
        </div>

        

        </div>

        
        <div class="col-lg-4 pl-lg-5">
        @foreach($tutors as $tutor)
        <div class="mb-5 text-center border rounded course-instructor">
            <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Instructor</h3>
            <div class="mb-4 text-center">
            <img src="{{ asset('images/person_2.jpg') }}" alt="Image" class="w-25 rounded-circle mb-4">  
            <h3 class="h5 text-black mb-4">{{$tutor->name}}</h3>
            <p>Lorem ipsum dolor sit amet sectetur adipisicing elit. Ipsa porro expedita libero pariatur vero eos.</p>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    </div>
</div>


@endsection