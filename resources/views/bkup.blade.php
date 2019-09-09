<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <p>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
            </div>
            <div class="card">
                <form method="POST" action="{{ action('SubscriptionsController@store') }}" id="payment-form1">
                    @csrf                    
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element1">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="{{ $plan->id }}" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- <button class="btn btn-dark" type="submit">Pay</button> -->
                        <button class="btn btn-dark" id="card-button" data-secret="{{ $intent->client_secret }}">
                            Update Payment Method
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- index blade -->


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