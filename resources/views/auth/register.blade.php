@extends('layouts.app')

@section('content')

<div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Learn From The Expert</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas necessitatibus.</p>
                  @guest
                  <p data-aos="fade-up" data-aos-delay="300"><a href="{{ route('register') }}" class="btn btn-primary py-3 px-5 btn-pill">Admission Now</a></p>
                  @else

                  @endguest
                </div>
                
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">

                  @include('inc.register')

                </div>

              </div>
            </div>
            
          </div>
        </div>
      </div>
</div>


@endsection
