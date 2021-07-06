<?php

use App\Http\Controllers\Api\YoutubeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/tokens/create', function (Request $request) {
    if ($request->has(['email', 'password']) && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $token = Auth::user()->createToken($request->email . $request->password);
        return ['token' => $token->plainTextToken];
    }
    return abort(404);
});

Route::middleware('auth:sanctum')->group(function () {
    // Youtube api routes
    Route::prefix('youtube')->as('youtube.')->group(function () {
        Route::prefix('channel')->as('channel.')->group(function () {
            Route::post('/channel/search', [YoutubeController::class, 'getChannelListFromName'])->name('getChannelListFromName');
            Route::post('/channel/details', [YoutubeController::class, 'getChannelDetailsFromID'])->name('getChannelDetailsFromID');
        });

        Route::prefix('videos')->as('videos.')->group(function () {
            Route::post('/', [YoutubeController::class, 'getVideoListFromChannelID'])->name('getVideoListFromChannelID');
            Route::post('/details', [YoutubeController::class, 'getVideoDetailsFromVideoID'])->name('getVideoDetailsFromVideoID');
        });

        Route::prefix('comments')->as('comments.')->group(function () {
            Route::post('/', [YoutubeController::class, 'getCommentThreadFromVideoID'])->name('getCommentThreadFromVideoID');
        });
    });
});
