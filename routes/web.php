<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPermissionsController;
use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionsController;
use App\Http\Controllers\Admin\UserRolesController;
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
use App\Http\Controllers\AppModules\AppModuleController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MainSiteController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Ayrshare\AyrProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\User\PostScheduling\PostHistoryController;
use App\Http\Controllers\User\PostScheduling\PostSchedulingController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SupportController;
use Illuminate\Support\Facades\Route;

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
Route::group(['domain' => config('app.domains.admin')], function () {
    Route::group(['guard' => 'admin', 'as' => 'admin.'], function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

            // Manage users and their roles and permissions
            Route::resource('users', UserController::class);
            Route::resource('userPermissions', UserPermissionsController::class);
            Route::resource('userRoles', UserRolesController::class);

            // Manage admins and their roles and permissions
            Route::resource('admins', AdminController::class);
            Route::resource('adminPermissions', AdminPermissionsController::class);
            Route::resource('adminRoles', AdminRolesController::class);
        });

        Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
        Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

        require __DIR__ . '/adminAuth.php';
    });
});

//website Route
Route::group(['domain' => config('app.domains.main')], function () {
    Route::group(['as' => 'main.'], function () {
        Route::get('/', [MainSiteController::class, 'index'])->name('index');
        Route::get('/privacy-policy', [MainSiteController::class, 'showPrivacyPolicy'])->name('privacy_policy');
    });
});

// Application Routes
Route::group(['domain' => config('app.domains.app')], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('image/{file}', [CommonController::class, 'displayImage'])->name('image.displayImage');

    Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
    Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

    // Routes for user panel
    Route::prefix('panel')->as('panel.')->middleware(['auth', 'verified'])->group(function () {
        Route::any('/', function () {
            return redirect()->route('panel.dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/choosePackages', [AppModuleController::class, 'index'])->name('choosePackages');
        Route::get('/packageDetails/{packageName}', [AppModuleController::class, 'packageDetails'])->name('packageDetails');

        Route::prefix('user')->as('user.')->group(function () {
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('index');
                Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('change_password');
                Route::post('/changeBasicProfile', [ProfileController::class, 'changeBasicProfile'])->name('change_basic_profile');
                Route::post('/changeAddress', [ProfileController::class, 'changeAddress'])->name('change_address');
                Route::post('/changeAvatar', [ProfileController::class, 'changeAvatar'])->name('change_avatar');
                Route::get('/ayrshareForward/{profileKey}', [AyrshareController::class, 'ayrForward'])->name('ayrshareForward');
                Route::get('/manage', [AyrProfileController::class, 'index'])->name('manage');
                Route::post('/create', [AyrshareController::class, 'createAyrProfile'])->name('createAyrProfile');
                Route::delete('/deleteProfile', [AyrshareController::class, 'deleteAyrProfile'])->name('deleteProfile');
            });
            //Routes For Support Chat System
            Route::prefix('support')->as('support.')->group(function () {
                Route::get('/submit', [SupportController::class, 'index'])->name('submit');
                Route::get('/history', [SupportController::class, 'history'])->name('history');
                Route::post('/uploadQuery', [SupportController::class, 'uploadUserQuery'])->name('uploadQuery');
                Route::get('/cancelQueryByUser/{userSupport}', [SupportController::class, 'cancelQueryByUser'])->name('cancelQueryByUser');
                Route::get('/SupportChat', [SupportController::class, 'supportChat'])->name('supportChat');
            });
            //Routes For Post Management
            Route::get('/post_scheduling', [PostSchedulingController::class, 'index'])->name('post_scheduling');
            Route::post('/post_scheduling', [PostSchedulingController::class, 'uploadPostMedia'])->name('uploading_post_media');
            Route::get('/post_history', [PostHistoryController::class, 'index'])->name('post_history');

            //Routes For Account Management for social Media 
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

            //Routes For Measure engagement 
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

            //Routes For Platforms overall Analytics 
            Route::prefix('analyze')->as('analyze.')->group(function () {
                Route::prefix('youtube')->as('youtube.')->middleware('yt.token.validate')->group(function () {
                    Route::get('/overview', [App\Http\Controllers\User\Analyze\YouTube\OverviewController::class, 'overview'])->name('overview');
                    Route::get('/videos', [App\Http\Controllers\User\Analyze\YouTube\VideosController::class, 'videos'])->name('videos');
                    Route::get('/audience', [App\Http\Controllers\User\Analyze\YouTube\AudienceController::class, 'audience'])->name('audience');
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
