@extends('layouts.app')

@section('content')

<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url('images/img_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <h1 data-aos="fade-up" data-aos-delay="0">Course Plans</h1>
                <p data-aos="fade-up" data-aos-delay="100">4 Lessons / 12 Week &bullet; 2,193 students &bullet; <a href="#" class="text-white">6 comments</a></p>
            </div>

            
            </div>
        </div>
        
        </div>
    </div>
    </div>
</div>


<div class="site-section"  data-aos="fade" data-aos-delay="100">
    <div class="container">
    <div class="row">

        @foreach($plans as $plan)
        <div class="col-md-4">


            <div class="course bg-white h-100 align-self-stretch p-3">
                <figure class="m-0">
                <a href="{{ route('plans.show', $plan->slug) }}"><img src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
                </figure>
                <div class="course-inner-text py-4 px-4">
                <span class="course-price">${{ number_format($plan->cost, 2) }}</span>
                <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
                <h3><a href="{{ route('plans.show', $plan->slug) }}">{{$plan->name}}</a></h3>
                <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
                </div>
                <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 
                    @if (Auth::user()->subscribed($plan->name) == "true")
                    Current
                    @else
                    2,193 students
                    @endif
                    </div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                </div>
            </div>
        

        </div>
        @endforeach

        

    </div>
    
    </div>
</div>
    


@endsection