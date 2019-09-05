@extends('layouts.app')

@section('content')
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
