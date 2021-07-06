<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\User\Measure\MarketResearch\ChannelIntelligence;
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
            });
        });
    });
});

require __DIR__ . '/auth.php';
