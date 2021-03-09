<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscribersController extends Controller
{
    public function subscribe(Request $request)
    {
        if ($request['email']) {
            Subscriber::create([
                'email' => $request['email']
            ]);
            return redirect()->back()->with('Subscribed', 'Thank you for subscribing!');
        }
        return redirect()->back()->with('notSubscribed', 'There was an error while subscribing. Please try again');
    }
}
