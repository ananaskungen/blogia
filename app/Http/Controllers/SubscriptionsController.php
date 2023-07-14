<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public function index()
    {
        $subscriptions = Subscription::with('user')->get();
        return view('subscriptions', compact('subscriptions'));
    }



}
