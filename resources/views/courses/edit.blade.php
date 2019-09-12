@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Course: {{$course->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{action('CoursesController@update', $course->id)}}">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
