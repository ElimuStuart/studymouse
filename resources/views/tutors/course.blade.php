@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{$context['course']->name}}</div>

                <div class="card-body">
                    <p>{{$context['course']->description}}</p>

                    
                    
                   
                   
            </div>

            
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Course Material
            </div>
            @if ($context['materials']->count() > 0)
            <ul class="list-group list-group-flush">
                @foreach($context['materials'] as $material)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span >{{$material->description}}</span>
                    @if (Auth::user()->role == "tutor")
                    <form method="POST" action="{{ action('MaterialsController@destroy', $material->id) }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    @endif
                    
                </li>
                @endforeach
            </ul>
            @else
            <li class="list-group-item">No course material for this course</li>
            @endif
            @if (Auth::user()->role == "tutor")
                <!-- The Current User Can Update The Post -->
            <div class="card-footer">
                <a href="/materials/create" class="btn btn-primary" role="button" aria-disabled="true">Create</a>
            </div>
            @endif

        </div>
    </div>
    @if (Auth::user()->role == "tutor")
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Colleges
            </div>
            <ul class="list-group list-group-flush">
                @foreach($context['tutors'] as $tutor)
                <li class="list-group-item">{{$tutor->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
@endsection
