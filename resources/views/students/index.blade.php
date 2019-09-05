@extends('layouts.app')

@section('content')


<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url('images/img_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <h1 data-aos="fade-up" data-aos-delay="0">Logo Design Course</h1>
                <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
            </div>

            
            </div>
        </div>
        
        </div>
    </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscribed Courses</div>

                <div class="card-body">
                    @if ($courses->count() > 0)
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                @foreach($courses as $course)
                                <a class="list-group-item list-group-item-action @if ($loop->index == 0)active @endif " id="list-course-{{$course->id}}-list" data-toggle="list" href="#list-course-{{$course->id}}" role="tab" aria-controls="course-{{$course->id}}">{{$course->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <!-- <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div> -->
                                @foreach($courses as $course)
                                <div class="tab-pane fade  @if ($loop->index == 0)show active @endif" id="list-course-{{$course->id}}" role="tabpanel" aria-labelledby="list-course-{{$course->id}}-list">
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">{{$course->description}}</p>
                                        </div>
                                        <div class="card-body">
                                            <a href='/student/course/{{$course->id}}' >More...</a>
                                        </div>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        
                        </div>
                    </div>
                    @else
                    You do not have a subscription
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
