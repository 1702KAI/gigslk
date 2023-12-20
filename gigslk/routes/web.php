<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;
use App\Http\Controllers\EmployerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirects','App\Http\Controllers\dashboardController@index');

// Route::resource(name:'Jobs', controller:\App\Http\Controllers\JobsController::class);
// Route::resource('jobs', \App\Http\Controllers\jobController::class);

// Route::group([
//     'prefix' => 'employer',
//     'as'=> 'employer.',
// ], function(){
//     Route::resource('job', \App\Http\Controllers\jobController::class);
// });

Route::group([
    'prefix' => 'employer',
    'as' => 'employer.',
], function () {
 // Resourceful routes for job
 Route::resource('job', \App\Http\Controllers\jobController::class);

 // Additional route for updateStatus
 Route::put('job/{id}/updateStatus', '\App\Http\Controllers\jobController@updateStatus')
     ->name('job.updateStatus');

 // Route for managing bids
 Route::get('manage-bids', [EmployerController::class, 'manageBids'])
     ->name('manageBids');

 // Route for viewing a bid
 Route::get('bids/{jobId}/view', [EmployerController::class, 'viewBid'])
     ->name('viewJob');

 // Route for editing a bid
 Route::get('bids/{bidId}/edit', [EmployerController::class, 'editBid'])
     ->name('editJob');
});


Route::group([
    'prefix' => 'freelancer',
    'as' => 'freelancer.',
], function () {
    Route::resource('job', \App\Http\Controllers\jobSearchController::class);
    
    // Add a route for the BidController
    Route::post('jobs/{job}/bids', [\App\Http\Controllers\BidController::class, 'store'])
        ->name('jobs.submitBid');

    // Routes for BidController
    Route::get('bids/{bid}', [\App\Http\Controllers\FreelancerController::class, 'showBid'])
        ->name('bids.show');
    
    Route::get('bids/{bid}/edit', [\App\Http\Controllers\FreelancerController::class, 'editBid'])
        ->name('bids.edit');
    
    Route::put('bids/{bid}', [\App\Http\Controllers\FreelancerController::class, 'updateBid'])
        ->name('bids.update');
    
    Route::delete('bids/{bid}', [\App\Http\Controllers\FreelancerController::class, 'destroyBid'])
        ->name('bids.destroy');

    Route::get('manage-bids', [\App\Http\Controllers\FreelancerController::class, 'manageBids'])
        ->name('manageBids');
});



// Route::resource('bids', BidController::class);



// Route::put('/jobs/{job}/update-status', 'App\Http\Controllers\jobController@updateStatus')->name('jobs.updateStatus');
// Route::get('/jobSearch/{job}', 'App\Http\Controllers\jobSearchController@show')->name('jobSearch.show');