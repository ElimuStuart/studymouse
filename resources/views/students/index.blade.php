@extends('layouts.app')

@section('content')
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
