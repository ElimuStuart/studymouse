@extends('layouts.app')

@section('content')

<div class="site-section courses-title bg-dark" id="courses-section">
    <div class="container mt-5 pt-5">
    <div class="row mb-0 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
        <h2 class="section-title">{{ $plan->name }}</h2>
        </div>
    </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mb-5">

        <div class="mb-5">
            <h3 class="text-black">Plan Description</h3>
            <p class="mb-4">
            <strong class="text-black mr-3">Schedule: </strong>
            </p>
            <p>{{$plan->description}}</p>
            <div class="row mb-4 mt-4">
            <div class="col-lg-12">
            
            <div class="mb-5 text-center border rounded course-instructor">
                <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Material</h3>
                <div class="mb-2 d-flex justify-content-between align-items-center">
                  
                </div>
            </div>
            
            </div>
            
            </div>
            
        </div>
        
        </div>

        
        
    </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <p>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
            </div>
            <div class="card">
                <form method="POST" action="{{ action('SubscriptionsController@store') }}" id="payment-form">
                    @csrf                    
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
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
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>

window.onload = function () {

const stripe = Stripe('{{ env("STRIPE_KEY") }}');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

cardButton.addEventListener('click', async (e) => {
    e.preventDefault();
    const { setupIntent, error } = await stripe.handleCardSetup(
        clientSecret, cardElement, {
            payment_method_data: {
                billing_details: { name: "sara" }
            }
        }
    );

    console.log(setupIntent)

    if (error) {
        // Display "error.message" to the user...
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
    } else {
        // The card has been verified successfully...
        console.log(setupIntent)
        stripeTokenHandler(setupIntent);
    }
});

const stripeTokenHandler = (token) => {
    // Insert the token ID into the form so it gets submitted to the server
    const form = document.getElementById('payment-form');
    const hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.payment_method);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

}


</script>
@endsection