@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Plans</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($plans as $plan)
                        @if($current_subscription->stripe_plan == $plan->name)
                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                            Current : {{ $current_subscription->stripe_plan }}
                            <span class="badge badge-light badge-pill p-2">${{ number_format($plan->cost, 2) }}</span>
                        </li>
                        @else
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-link pull-right">{{ $plan->name }}</a>
                            <span class="badge badge-primary badge-pill p-2">${{ number_format($plan->cost, 2) }}</span>
                        </li>
                        @endif
                        
                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection