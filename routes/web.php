<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionsController;
use App\Http\Controllers\Admin\UserRolesController;  
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\AppModules\AppModuleController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Post_Scheduling\PostSchedulingController;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SupportController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\DashboardController;
use App\Http\Requests\Api\Ayrshare\AyrJWTTokenProfileKey;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

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
        Route::middleware(['admin'])->group(function () {
            Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
            Route::resource('users', UserController::class);
            Route::resource('users/permissions', UserPermissionsController::class);
            Route::resource('users/roles', UserRolesController::class);
        });

        Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
        Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

        require __DIR__. '/adminAuth.php';
    });
});


// Application Routes
Route::group(["domain" => env("APP_DOMAIN", "app.upview.localhost")], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('image/{file}', function ($file) {
        try {
            $file = decrypt($file);
        } catch (DecryptException $e) {
            return abort(404);
        }
       
        $file = storage_path('app/'.$file);
       
        if (!File::exists($file)) { return abort(404); }
       
        $type = File::mimeType($file);
        $file = File::get($file);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    })->name('image.displayImage');

    Route::get('/api-test', [AyrshareController::class, 'index'])->name('api-test');
    Route::post('/ayrCall', [AyrshareController::class, 'index'])->name('ayrshareAPICall');


    Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
    Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

    // Routes for user panel
    Route::prefix('panel')->as('panel.')->middleware(['auth', 'verified'])->group(function () {

        Route::redirect('/', '/panel/dashboard', 301);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/choosePackages', [AppModuleController::class, 'index'])->name('choosePackages');

        Route::prefix('user')->as('user.')->group(function () {
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('index');
                Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('change_password');
                Route::post('/changeBasicProfile', [ProfileController::class, 'changeBasicProfile'])->name('change_basic_profile');
                Route::post('/changeAddress', [ProfileController::class, 'changeAddress'])->name('change_address');
                Route::post('/changeAvatar', [ProfileController::class, 'changeAvatar'])->name('change_avatar');

            });

            Route::prefix('support')->as('support.')->group(function () {
                Route::get('/submit', [SupportController::class, 'index'])->name('submit');
                Route::get('/history', [SupportController::class, 'history'])->name('history');
                Route::post('/uploadQuery', [SupportController::class, 'uploadUserQuery'])->name('uploadQuery');
                Route::get('/cancelQueryByUser/{userSupport}', [SupportController::class, 'cancelQueryByUser'])->name('cancelQueryByUser');
                Route::get('/SupportChat', [SupportController::class, 'supportChat'])->name('supportChat');
            });



            Route::get('/post_scheduling', [PostSchedulingController::class, 'index'])->name('post_scheduling');
            Route::post('/post_scheduling', [PostSchedulingController::class, 'uploadPostMedia'])->name('uploading_post_media');

            Route::prefix('account')->as('account.')->group(function () {
                Route::get('/list', [ProfileController::class, 'accountsManager'])->name('accounts_manager');
                
                // Route::get('/ayrshareForward{profileKey}', function () {
                //     return Redirect::away(AyrshareController::generateAyrJWTTokenURL(new AyrJWTTokenProfileKey(['profileKey' => '9Z9MTN2-9QM4CQK-QT68KX4-7AXB4J8']))->url);
                // })->name('ayrshareForward');
                
                Route::post('/ayrshareForward/{profileKey}', [AyrshareController::class, 'ayrshareForward'])->name('ayrshareForward');

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
