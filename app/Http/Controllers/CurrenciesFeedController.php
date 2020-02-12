<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zttp\Zttp;

class CurrenciesFeedController extends Controller
{
    public function index()
    {
        $rates_feed = Zttp::get(env('EXCHANGERATES_FEED_API') . 'latest?symbols=EUR&base=USD')->body();

        return response()->json([
            'ratesFeed' => $rates_feed,
        ]);
    }
}
