

@extends('layouts.app')

@section('content')
<div class="site-section courses-title bg-dark" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title"></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section courses-entry-wrap mb-5"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row mb-5">

          <div class="owl-carousel col-12 nonloop-block-14">

            
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">{{$courses->count()}}</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Courses</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>



            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">{{$students->count()}}</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Students</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">{{$tutors->count()}}</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="#">Tutors</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>

          </div>

         

        </div>
      </div>
    </div>

    @if ($courses->count() > 0)
    <div class="site-section courses-entry-wrap"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
          </div>
          <div class="owl-carousel col-12 nonloop-block-14">

            @foreach($courses as $course)
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="/admin/course/{{$course->id}}"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">$20</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="/admin/course/{{$course->id}}">{{$course->name}}</a></h3>
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

    @if ($tutors->count() > 0)
    <div class="site-section courses-entry-wrap mt-0"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Tutors</h2>
          </div>
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



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if ($courses->count() > 0)
                    
                    <div class="list-group">
                        @foreach($courses as $course)
                        <a href="/admin/course/{{$course->id}}" class="list-group-item list-group-item-action">
                            {{$course->name}}
                        </a>
                        @endforeach
                    </div>
                    
                    @endif

                </div>
                <div class="card-body">
                    <a href="/courses/create" class="card-link">Create Course</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
