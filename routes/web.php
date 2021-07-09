<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\getAcc;
use App\Http\Controllers\getPages;
use App\Http\Controllers\getPosts;
use App\Http\Controllers\managePosts;
use App\Http\Controllers\postContent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

// Routes for user panel
Route::prefix('panel')->as('panel.')->middleware(['auth'])->group(function () {

    Route::redirect('/', '/panel/dashboard', 301);

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    Route::prefix('user')->as('user.')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('change_password');
            Route::post('/changeBasicProfile', [ProfileController::class, 'changeBasicProfile'])->name('change_basic_profile');
            Route::post('/changeAddress', [ProfileController::class, 'changeAddress'])->name('change_address');
            Route::post('/changeAvatar', [ProfileController::class, 'changeAvatar'])->name('change_avatar');
        });

        Route::prefix('measure')->as('measure.')->group(function () {
            Route::prefix('market-research')->as('market_research.')->group(function () {
                Route::prefix('channel-intelligence')->as('channel_intelligence.')->group(function () {
                    Route::get('/', [ChannelIntelligence::class, 'index'])->name('index');
                    Route::get('/youtube/channel/details', [ChannelIntelligence::class, 'channelDetails'])->name('channel_details');
                });
                Route::prefix('video-intelligence')->as('video_intelligence.')->group(function () {
                    Route::get('/', [VideoIntelligence::class, 'index'])->name('index');
                    Route::get('/youtube/video/details', [VideoIntelligence::class, 'videoDetails'])->name('video_details');
                });
            });
        });

        Route::prefix('analyse')->as('analyse.')->group(function () {
            Route::prefix('instagram')->as('instagram.')->group(function () {
                Route::prefix('overview')->as('overview.')->group(function () {
                    Route::get('/', [ChannelIntelligence::class, 'index'])->name('index');
                    Route::get('/youtube/channel/details', [ChannelIntelligence::class, 'channelDetails'])->name('channel_details');
                });
            });
        });
    });
});


Route::get('/get-token', function () {
    return view('get-access-token');
});


Route::get('/get-pages', [getPages::class, 'index']);

Route::get('/get-insta-acc', [getAcc::class, 'index']);


Route::get('/get-posts', [getPosts::class, 'index']);


Route::get('/manage/posts', function () {
    return view('manage-posts');
});

Route::post('/manage/posts', function () {
    return view('manage-posts');
});



Route::get('/test', function () {
    return view('test');
});

Route::get('/hashtags', function () {
    return view('search-hashtag');
});

Route::post('/hashtags', function () {
    return view('search-hashtag');
});

Route::get('/insights/profile', function () {
    return view('profile-compare');
});


Route::get('/insights/posts', function () {
    return view('post-insights');
});


Route::post('insights-result', function () {
    return view('profile-insights');
});

Route::get('post-upload', [postContent::class, 'index']);
Route::post('post-upload', [postContent::class, 'uploadFile'])->name('uploadFile');



require __DIR__ . '/auth.php';
