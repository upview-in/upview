<?php

// Admin namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPermissionsController;
use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\SupportController as AdminSupportController;
use App\Http\Controllers\Admin\SystemInfoController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserOrdersController;
use App\Http\Controllers\Admin\UserPermissionsController;
use App\Http\Controllers\Admin\UserRolesController;
// API Ayrshare namespace
use App\Http\Controllers\Api\Ayrshare\AyrshareController;
// Common namespace
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MainSiteController;
use App\Http\Controllers\PaymentsController;
// Support chat panel namespace
use App\Http\Controllers\Support\ChatController;
// User namespace
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Analyze\Facebook\OverviewController as FbOverviewController;
use App\Http\Controllers\User\Analyze\Instagram\OverviewController as IgOverviewController;
use App\Http\Controllers\User\Analyze\YouTube\AudienceController as YtAudienceController;
use App\Http\Controllers\User\Analyze\YouTube\OverviewController as YtOverviewController;
use App\Http\Controllers\User\Analyze\YouTube\VideosController as YtVideosController;
use App\Http\Controllers\User\Ayrshare\AyrProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
use App\Http\Controllers\User\Measure\MarketResearch\VideoIntelligence;
use App\Http\Controllers\User\PagesController;
use App\Http\Controllers\User\PlansController;
use App\Http\Controllers\User\PostScheduler\HistoryController;
use App\Http\Controllers\User\PostScheduler\SchedulerController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SocialListeningController;
use App\Http\Controllers\User\SupportController;
// Packages namespace
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

// website Route
Route::group(['domain' => config('app.domains.main'), 'as' => 'main.'], function () {
    Route::controller(MainSiteController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/solutions/socialAnalytics', 'socialAnalytics')->name('socialAnalytics');
        Route::get('/solutions/socialAnalytics/socialAnalyticsInner', 'socialAnalyticsInner')->name('socialAnalyticsInner');
        Route::get('/solutions/socialPosting', 'socialPosting')->name('socialPosting');
        Route::get('/solutions/socialAnalytics/socialPostingInner', 'socialPostingInner')->name('socialPostingInner');
        Route::get('/solutions/socialListening', 'socialListening')->name('socialListening');
        Route::get('/solutions/socialAnalytics/socialListeningInner', 'socialListeningInner')->name('socialListeningInner');
        Route::get('/blogs/{blog}', 'blog')->name('blog');
        Route::get('/pricing', 'pricing')->name('pricing');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/videos', 'videos')->name('videos');
        Route::get('/privacy-policy', 'showPrivacyPolicy')->name('privacy-policy');
        Route::get('/app-privacy-policy', 'showAppPrivacyPolicy')->name('app-privacy-policy');
        Route::get('/terms-conditions', 'showTermsAndConditions')->name('terms-conditions');
        Route::post('/contact-us', 'contactUs')->name('contact-us');
    });
});

// Application Routes
Route::group(['domain' => config('app.domains.app')], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::get('media/{dir}/{file}', [CommonController::class, 'displayMedia'])->name('media.displayMedia');

    Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
    Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

    // Smart tags management for social media posts
    Route::post('tag/suggest', [TagsController::class, 'suggest'])->name('tag.suggest');
    Route::post('tag/add', [TagsController::class, 'add'])->name('tag.add');

    // Routes for user panel
    Route::prefix('panel')->as('panel.')->middleware(['auth', 'verified'])->group(function () {
        Route::any('/', function () {
            return redirect()->route('panel.dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/maintenance', [DashboardController::class, 'maintenance'])->name('maintenance');
        Route::get('/invoice', [DashboardController::class, 'invoice'])->name('invoice');


        Route::prefix('user')->as('user.')->group(function () {
            Route::get('/social', [SocialListeningController::class, 'index'])->name('social');
            Route::get('/load-social/{hash}', [SocialListeningController::class, 'load'])->name('load');

            Route::controller(PaymentsController::class)->prefix('payment')->as('payment.')->group(function () {
                Route::get('/stripe/success/{order}', 'onSuccessOfStripePaymentGateway')->name('stripe.success');
                Route::get('/stripe/cancel/{order}', 'onCancelOfStripePaymentGateway')->name('stripe.cancel');

                Route::post('/razorpay/payment-callback/{order}', 'onPaymentCallbackOfRazorPayPaymentGateway')->name('razor-pay.callback');
            });

            Route::controller(PlansController::class)->prefix('plans')->as('plans.')->group(function () {
                Route::get('/list', 'list')->name('list');
                Route::get('/orders', 'orders')->name('orders');
                Route::get('/details/{plan}', 'details')->name('details');
                Route::get('/{plan}/buy/{paymentGateway}', 'buy')->name('buy');
            });

            Route::prefix('profile')->as('profile.')->group(function () {
                Route::controller(ProfileController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/changePassword', 'changePassword')->name('change_password');
                    Route::post('/changeBasicProfile', 'changeBasicProfile')->name('change_basic_profile');
                    Route::post('/changeAddress', 'changeAddress')->name('change_address');
                    Route::post('/changeAvatar', 'changeAvatar')->name('change_avatar');
                });

                Route::controller(AyrProfileController::class)->group(function () {
                    Route::get('/manage', 'index')->name('manage');
                });

                Route::controller(AyrshareController::class)->group(function () {
                    Route::post('/create', 'createAyrProfile')->name('createAyrProfile');
                    Route::delete('/deleteProfile', 'deleteAyrProfile')->name('deleteProfile');
                    Route::get('/ayrshareForward/{profileKey}', 'ayrForward')->name('ayrshareForward');
                });
            });

            //Routes For Support Chat System
            Route::controller(SupportController::class)->prefix('support')->as('support.')->group(function () {
                Route::get('/submit', 'index')->name('submit');
                Route::get('/history', 'history')->name('history');
                Route::post('/uploadQuery', 'uploadUserQuery')->name('uploadQuery');
                Route::get('/cancelQueryByUser/{userSupport}', 'cancelQueryByUser')->name('cancelQueryByUser');
                Route::get('/SupportChat', 'supportChat')->name('supportChat');
            });

            //Routes For Post Management
            Route::prefix('post')->as('post.')->group(function () {
                Route::get('/scheduler', [SchedulerController::class, 'index'])->name('scheduler');
                Route::post('/scheduler', [SchedulerController::class, 'uploadPostMedia'])->name('upload_media');
                Route::get('/history', [HistoryController::class, 'index'])->name('history');
            });

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
                    Route::get('/overview', [YtOverviewController::class, 'overview'])->name('overview');
                    Route::get('/videos', [YtVideosController::class, 'videos'])->name('videos');
                    Route::get('/audience', [YtAudienceController::class, 'audience'])->name('audience');
                });

                Route::prefix('facebook')->as('facebook.')->group(function () {
                    Route::get('/overview', [FbOverviewController::class, 'overview'])->name('overview');
                    Route::get('/media', [FbOverviewController::class, 'overview'])->name('media');
                });

                Route::prefix('instagram')->as('instagram.')->group(function () {
                    Route::get('/overview', [IgOverviewController::class, 'overview'])->name('overview');
                });
            });
        });
    });

    require __DIR__ . '/auth.php';
});

// Admin Routes
Route::group(['domain' => config('app.domains.admin'), 'guard' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['admin'])->group(function () {
        // Import/Export routes
        Route::post('/adminPermissions/import', [AdminPermissionsController::class, 'import'])->name('adminPermissions.import');
        Route::get('/adminPermissions/export', [AdminPermissionsController::class, 'export'])->name('adminPermissions.export');
        Route::post('/userPermissions/import', [UserPermissionsController::class, 'import'])->name('userPermissions.import');
        Route::get('/userPermissions/export', [UserPermissionsController::class, 'export'])->name('userPermissions.export');

        // Dashboard routes
        Route::controller(AdminDashboard::class)->prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/main', 'main')->name('main');
            Route::get('/server-info', 'serverInfo')->name('server.info');
            Route::get('/phpinfo', 'phpInfo')->name('phpinfo');
        });

        // Fetch system information API
        Route::controller(SystemInfoController::class)->prefix('system')->as('system.')->group(function () {
            Route::post('/CPU-info', 'getCPUInfo')->name('getCPUInfo');
            Route::post('/memory-info', 'getMemoryInfo')->name('getMemoryInfo');
        });

        Route::get('/support/queries', [AdminSupportController::class, 'queries'])->name('support.queries');
        Route::resource('support/users', AdminSupportController::class, ['as' => 'support']);

        //Manage Sales inquiry from the Main Site
        Route::get('/sales/queries', [SalesController::class, 'queries'])->name('sales.queries');

        // Manage users and their roles and permissions
        Route::resource('users', UserController::class);
        Route::resource('userPermissions', UserPermissionsController::class);
        Route::resource('userRoles', UserRolesController::class);

        // Manage admins and their roles and permissions
        Route::resource('admins', AdminController::class);
        Route::resource('adminPermissions', AdminPermissionsController::class);
        Route::resource('adminRoles', AdminRolesController::class);

        // Manage payments
        Route::resource('userOrders', UserOrdersController::class);

        // Blog management
        Route::resource('blogs', BlogController::class);
    });

    Route::get('/getStatesList', [ListController::class, 'getStateList'])->name('get_states_list');
    Route::get('/getCityList', [ListController::class, 'getCityList'])->name('get_city_list');

    require __DIR__ . '/adminAuth.php';
});

// SupportChat Routes
Route::group(['domain' => config('app.domains.support'), 'guard' => 'support', 'as' => 'support.'], function () {
    Route::middleware(['support'])->group(function () {
        Route::get('/dashboard', function () {
            return redirect()->route('support.chat.index');
        });

        Route::controller(ChatController::class)->prefix('chat')->as('chat.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/users', 'users')->name('users');
            Route::post('/messages', 'messages')->name('messages');
            Route::post('/send', 'sendMessage')->name('sendMessage');
            Route::post('/seen-status', 'seenStatus')->name('seenStatus');
        });
    });

    require __DIR__ . '/supportAuth.php';
});
