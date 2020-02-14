<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Zttp\Zttp;

class CurrenciesFeedController extends Controller
{
    public function index()
    {
        if (Cache::has('rates')) {
            $response = [
                'rates' => Cache::get('rates'),
                'from' => 'cache',
            ];
        } else {
            $expires_at = Carbon::now()->addMinutes(10);
            $rates_feed = Zttp::get(env('EXCHANGERATES_FEED_API') . 'latest?symbols=EUR&base=USD');
            $response = [
                'rates' => $rates_feed->body(),
                'from' => 'exchangeratesapi.io',
            ];

            if ($rates_feed->isSuccess()) {
                Cache::put('rates', $rates_feed->body(), $expires_at);
            } else {
                return response()->json([
                    'error' => 'It has ocurred an error with the external API',
                ], 424);
            }
        }

        return response()->json([
            'ratesFeed' => $response,
        ], 200);
    }
}
