@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$course->name}}</h5>
                <p class="card-text">{{$course->description}}</p>
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
        </div>
    </div>
</div>
@endsection