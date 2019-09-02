@extends('layouts.app')

@section('content')
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
@endsection
