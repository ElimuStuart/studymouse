<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\User;
use Auth;


class SubscriptionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('student');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plan $plan)
    {
        // $plan = Plan::findOrFail($request->get('plan'));
        
        // $request->user()
        //     ->newSubscription('main', $plan->stripe_plan)
        //     ->create($request->stripeToken);

        // return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
        $plan = Plan::findOrFail($request->get('plan'));

        // $session = \Stripe\Checkout\Session::create([
        //     'payment_method_types' => ['card'],
        //     'line_items' => [[
        //         'name' => $plan->name,
        //         'description' => $plan->description,
        //         'amount' => $plan->cost,
        //         'currency' => 'usd',
        //         'quantity' => 1,
        //     ]],
        //     'success_url' => 'https://studymouse.com/home',
        //     'cancel_url' => 'https://example.com/cancel',
        // ]);
        
  

        // $user = auth()->user();

        $paymentMethod = $request->setupIntent;

        $user = User::find(1);
        $user->createAsStripeCustomer([
            'name' => $user->name
        ]);

        
        $stripeplan = $request->stripe_plan;
        $planid = $request->plan;

        // $user->newSubscription($stripeplan, $planid)
        //     ->trialDays(30)
        //     ->create($user->name, $paymentMethod);

        $user->subscriptions()->create([
            'name' => $user->name,
            'stripe_id' => $planid,
            'stripe_plan' => $plan->name,
            'stripe_status' => 'complete',
            'quantity' => 1,
        ]);


        return redirect()->route('student')->with('success', 'Your plan subscribed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
