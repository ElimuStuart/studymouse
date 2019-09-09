@extends('layouts.app')

@section('content')

<div class="intro-section single-cover" id="home-section">
      
    <div class="slide-1 " style="background-image: url({{ asset('images/img_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-12">
            <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6">
                <h1 data-aos="fade-up" data-aos-delay="0">{{$plan->name}}</h1>
                <p data-aos="fade-up"  class="text-white" data-aos-delay="100">${{ number_format($plan->cost, 2) }} / Month</p>
            </div>

            
            </div>
        </div>
        
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
                <!-- <strong class="text-black mr-3">Schedule: </strong> -->
                </p>
                <p>{{$plan->description}}</p>
                                
            </div>

            <div class="pt-5">
                <form method="POST" class="p-5 bg-light" action="{{ action('SubscriptionsController@store') }}" id="payment-form">
                    @csrf                    
                    <div class="form-group">
                        <label for="card-element">
                            Enter your credit card information
                        </label>
                        
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        <input type="hidden" name="plan" value="{{ $plan->id }}" />
                    </div>
                    <div class="form-group">
                        <!-- <button class="btn btn-dark" type="submit">Pay</button> -->
                        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        
        </div>

        <div class="col-lg-4 pl-lg-5">

            <div class="mb-5 text-center border rounded course-instructor">
                <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Monthly Usage</h3>
                <div class="mb-4 text-center">
                <!-- <img src="images/person_2.jpg" alt="Image" class="w-25 rounded-circle mb-4">   -->
                <h3 class="h5 text-black mb-4">Next Invoice</h3>
                <p>Lorem ipsum dolor sit amet sectetur adipisicing elit. Ipsa porro expedita libero pariatur vero eos.</p>
                </div>
            </div>

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

