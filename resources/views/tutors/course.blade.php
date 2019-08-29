@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{$context['course']->name}}
                    <br>
                    <a href="/materials/create" class="btn btn-outline-primary" role="button" aria-disabled="true">Create Material</a>
                   
                   <br>
                    @if ($context['materials']->count() > 0)
                       @foreach($context['materials'] as $material)
                       <a href='/tutor/material/{{$material->id}}' >{{$material->description}}</a>
                       @endforeach
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
