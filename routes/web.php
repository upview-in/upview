<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProfileController;

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

// Admin Routes
Route::group(["domain" => env("ADMIN_DOMAIN", "admin.upview.localhost")], function () {
    Route::group(['guard' => 'admin', 'as' => 'admin.'], function () {
        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('users', UserController::class);
        });
        require __DIR__ . '/adminAuth.php';
    });
});


// Application Routes
Route::group(["domain" => env("APP_DOMAIN", "app.upview.localhost")], function () {

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
                    Route::get('/overview', [App\Http\Controllers\User\Analyze\Instagram\InstagramOverviewController::class, 'overview'])->name('overview');
                });
            });
        });
    });

    require __DIR__ . '/auth.php';
});
