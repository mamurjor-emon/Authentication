<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(SubscriberRequest $request)
    {
        Subscriber::create([
            'email' => $request->email,
        ]);
        return back()->with('success', 'Subscribe Successful!');
    }
}
