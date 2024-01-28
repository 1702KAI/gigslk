<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\EmployerProjectsController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\jobSearchController;
use App\Http\Controllers\FreelancerProjectsController;
use App\Http\Controllers\PusherController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

Route::get('redirects', [dashboardController::class, 'index']);

Route::group(['prefix' => 'employer', 'as' => 'employer.'], function () {
    Route::resource('job', jobController::class);
    Route::resource('myProjects', EmployerProjectsController::class);
    Route::put('job/{id}/updateStatus', [jobController::class, 'updateStatus'])->name('job.updateStatus');
    Route::get('manage-bids', [EmployerController::class, 'manageBids'])->name('manageBids');
    Route::get('bids/{jobId}/view', [EmployerController::class, 'viewBid'])->name('viewJob');
    Route::get('bids/{bidId}/edit', [EmployerController::class, 'editBid'])->name('editJob');
    Route::post('accept-bid/{bid}', [EmployerController::class, 'acceptBid'])->name('acceptBid');
    Route::post('decline-bid/{bid}', [EmployerController::class, 'declineBid'])->name('declineBid');
});

Route::group(['prefix' => 'freelancer', 'as' => 'freelancer.'], function () {
    Route::resource('job', jobSearchController::class);
    Route::resource('myProjects', FreelancerProjectsController::class);
    Route::get('myProjects/{id}/details', [FreelancerProjectsController::class, 'details'])->name('myProjects.details');
    Route::post('jobs/{job}/bids', [BidController::class, 'store'])->name('jobs.submitBid');
    Route::get('bids/{bid}', [FreelancerController::class, 'showBid'])->name('bids.show');
    Route::get('bids/{bid}/edit', [FreelancerController::class, 'editBid'])->name('bids.edit');
    Route::put('bids/{bid}', [FreelancerController::class, 'updateBid'])->name('bids.update');
    Route::delete('bids/{bid}', [FreelancerController::class, 'destroyBid'])->name('bids.destroy');
    Route::get('manage-bids', [FreelancerController::class, 'manageBids'])->name('manageBids');
    Route::get('message',[PusherController::class,'index'])->name('message');
    Route::post('message/broadcast',[PusherController::class,'broadcast'])->name('broadcast');
    Route::post('message/recieve',[PusherController::class,'recieve'])->name('recieve');
});
