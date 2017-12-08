<?php

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

use App\Feed;
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/feeds', function (Request $request) use ($router) {
    $AUTH_KEY = 'x-limerence-key';
    $AUTH_VALUE = 'sugar-knife-59ef758f-993f-481a-b7ff-abb5ae04af91';

    if ($request->hasHeader($AUTH_KEY) && $request->header($AUTH_KEY) == $AUTH_VALUE) {
        $feeds = Feed::orderBy('created_at', 'desc')->paginate(50);
        return response()->json([
            'status' => 'OK',
            'message' => null,
            'object' => $feeds,
            'code' => 200,
        ]);
    } else {
        return response()->json([
            'status' => 'Bad Request',
            'message' => 'Akses ditolak.',
            'object' => null,
            'code' => 403,
        ]);
    }
});