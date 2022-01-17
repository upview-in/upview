<?php

use App\Http\Controllers\Api\YouTube\ChannelController;
use App\Http\Controllers\Api\YouTube\CommentController;
use App\Http\Controllers\Api\YouTube\VideoController;
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
    // YouTube api routes
    Route::prefix('youtube')->as('youtube.')->group(function () {
        Route::prefix('channel')->as('channel.')->group(function () {
            Route::post('/search', [ChannelController::class, 'getChannelListFromName'])->name('getChannelListFromName');
            Route::post('/details', [ChannelController::class, 'getChannelDetailsFromID'])->name('getChannelDetailsFromID');
            Route::post('/top', [ChannelController::class, 'getTopChannelsList'])->name('getTopChannelsList');
            Route::post('/mine', [ChannelController::class, 'getMineChannelList'])->name('getMineChannelList');
            Route::post('/analytics/mine', [ChannelController::class, 'getMineChannelAnalytics'])->name('getMineChannelAnalytics');
        });

        Route::prefix('videos')->as('videos.')->group(function () {
            Route::post('/', [VideoController::class, 'getVideoListFromChannelID'])->name('getVideoListFromChannelID');
            Route::post('/search', [VideoController::class, 'getVideoListFromName'])->name('getVideoListFromName');
            Route::post('/details', [VideoController::class, 'getVideoDetailsFromVideoID'])->name('getVideoDetailsFromVideoID');
        });

        Route::prefix('comments')->as('comments.')->group(function () {
            Route::post('/', [CommentController::class, 'getCommentThreadFromVideoID'])->name('getCommentThreadFromVideoID');
        });
    });
});
