<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    //

    public function index() {
        $plans = Plan::get();


        return view('plans', compact("plans"));
    }

    public function show(Plan $plan, Request $request) {
        $intent = auth()->user()->createSetupIntent();

        return view("subscription", compact("plan", "intent"));
         
    }

    public function subscription(Request $request) {
        // Set the Stripe API key
        \Stripe\Stripe::setApiKey('sk_test_51NSfTfEUXj56HOPmyTQcbtFGaSH0nZoJCP6wLd4kQX7P9DsMmzYqqWAFaopkLwFMq5tK6xZ4zW3Z5P3XLJUoI0TV00SsXaZfXv');
    
        $plan = Plan::find($request->plan);
    
        // Create the customer with the address details
        $customer = \Stripe\Customer::create([
            'name' => $request->name,
            'email' => $request->user()->email,
            'address' => [
                'line1' => '123 Main St',
                'city' => 'City',
                'state' => 'State',
                'postal_code' => '12345',
                'country' => 'US',
            ],
        ]);
    
        // Create the subscription for the customer
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create($request->token, [
                'customer' => $customer->id,
            ]);
    
        return view("success");
    }
    


}
