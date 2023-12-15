<?php

/** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Parking Subscription for 2023/2024 year',
                        ],
                        'unit_amount'  => 50 * 100,

                    ],
                    'quantity'   => 1,
                ],
            ],

            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $user = auth()->user();

        $userfound = User::find($user->id);
        $user->parking_subscription = 1;
        $userfound->save();

        return view('checkout')->with("success", "You have successfully subscribed!");
    }
}
