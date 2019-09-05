@extends('layouts.app')

@section('content')

<div class="site-section courses-title bg-dark" id="courses-section">
      <div class="container mt-5 pt-5">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">@if ($courses->count() > 0) Your Courses @else You are not assigned any courses yet. @endif</h2>
          </div>
        </div>
      </div>
    </div>

    @if ($courses->count() > 0)
    <div class="site-section courses-entry-wrap"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

            @foreach($courses as $course)
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="/student/course/{{$course->id}}"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="/student/course/{{$course->id}}">{{$course->name}}</a></h3>
                <p>{{ Str::limit($course->description, 30, '...') }} </p>
              </div>
              <!-- <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div> -->
            </div>
            @endforeach

            

          </div>

         

        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>

    @endif

@endsection



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if ($courses->count() > 0)
                    <div class="list-group">
                        @foreach($courses as $course)
                        <a href="/tutor/course/{{$course->id}}" class="list-group-item list-group-item-action">{{$course->name}}</a>

                        @endforeach
                    </div>
                    @else
                    You are not assigned any courses yet.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
