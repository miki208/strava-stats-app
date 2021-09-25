<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get(config('strava-params.webhook-callback-url'), function (Request $request) use ($router) {
    if(!$request->has(['hub.mode', 'hub.challenge', 'hub.verify_token']))
        return response()->json([], Response::HTTP_BAD_REQUEST, [], JSON_UNESCAPED_SLASHES);

    if($request->get('hub.mode') != 'subscribe' || $request->get('hub.verify_token') != config('strava-params.verify-token'))
        return response()->json([], Response::HTTP_BAD_REQUEST, [], JSON_UNESCAPED_SLASHES);

    return response()->json([
        'hub.challenge' => $request->get('hub.challenge')
    ], Response::HTTP_OK, [], JSON_UNESCAPED_SLASHES);
});

$router->post(config('strava-params.webhook-callback-url'), function (Request $request) use ($router) {
    Log::info($request);
});
