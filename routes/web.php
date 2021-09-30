<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ListController;

//Youtube User classes
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;


//Instagram User Classes


use Illuminate\Support\Facades\Route;

//Instagram API Classes
use App\Http\Controllers\Api\Instagram\GetAccountController;
use App\Http\Controllers\Api\Instagram\GetPagesController;
use App\Http\Controllers\Api\Instagram\GetPostsController;
use App\Http\Controllers\Api\Instagram\PostContentController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\PagesController;

use App\Http\Controllers\User\Analyze\Instagram\InstagramOverviewController;

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
Route::prefix('panel')->as('panel.')->middleware(['auth', 'verified'])->group(function () {

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

        Route::prefix('account')->as('account.')->group(function () {
            Route::get('/list', [ProfileController::class, 'accountsManager'])->name('accounts_manager');
            Route::get('/add/youtube', [AccountController::class, 'addYoutubeAccount'])->name('addYoutubeAccount');
            Route::get('/add/facebook', [AccountController::class, 'addFacebookAccount'])->name('addFacebookAccount');
            Route::get('/add/instagram', [AccountController::class, 'addInstagramAccount'])->name('addInstagramAccount');
            Route::get('/connect/youtube', [AccountController::class, 'getYoutubeAccess'])->name('getYoutubeAccess');
            Route::get('/connect/facebook', [AccountController::class, 'getFacebookAccess'])->name('getFacebookAccess');
            Route::get('/connect/instagram', [AccountController::class, 'getInstagramAccess'])->name('getInstagramAccess');
            Route::get('/unlink/{id}', [AccountController::class, 'unlinkAccount'])->name('unlinkAccount');
            Route::get('/setDefault/{id}/{platform}', [AccountController::class, 'setDefaultAccount'])->name('setDefaultAccount');
            Route::get('/setDefault/session', [AccountController::class, 'setSessionDefaultAccount'])->name('setSessionDefaultAccount');
            Route::get('/setDefault/page', [PagesController::class, 'setSessionDefaultPage'])->name('setSessionDefaultPage');
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

        Route::prefix('analyze')->as('analyze.')->group(function () {
            Route::prefix('youtube')->as('youtube.')->middleware('yt.token.validate')->group(function () {
                Route::get('/overview', [App\Http\Controllers\User\Analyze\Youtube\OverviewController::class, 'overview'])->name('overview');
                Route::get('/videos', [App\Http\Controllers\User\Analyze\Youtube\VideosController::class, 'videos'])->name('videos');
                Route::get('/audience', [App\Http\Controllers\User\Analyze\Youtube\AudienceController::class, 'audience'])->name('audience');
            });

            Route::prefix('facebook')->as('facebook.')->group(function () {
                Route::get('/overview', [App\Http\Controllers\User\Analyze\Facebook\FacebookOverviewController::class, 'overview'])->name('overview');
                Route::get('/media', [App\Http\Controllers\User\Analyze\Facebook\FacebookOverviewController::class, 'overview'])->name('media');
            });

            Route::prefix('instagram')->as('instagram.')->group(function () {
                Route::get('/overview', [InstagramOverviewController::class, 'overview'])->name('overview');
            });
        });
    });
});


Route::get('/get-token', function () {
    return view('get-access-token');
});


Route::get('/get-pages', [GetPagesController::class, 'index']);

Route::get('/get-insta-acc', [GetAccountController::class, 'index']);


Route::get('/get-posts', [GetPostsController::class, 'index']);


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

Route::get('post-upload', [PostContentController::class, 'index']);
Route::post('post-upload', [PostContentController::class, 'uploadFile'])->name('uploadFile');



require __DIR__ . '/auth.php';
