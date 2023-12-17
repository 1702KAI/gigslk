<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
use Auth;

class EmployerController extends Controller
{
    public function manageBids()
    {
         // Get the authenticated employer
         $employer = Auth::user();

         // Retrieve jobs associated with the employer that have bids
         $jobsWithBids = Job::where('user_id', $employer->id)
                            ->whereHas('bids')
                            ->with(['bids', 'bids.freelancer'])
                            ->get();

         // Flatten the bids to get all bids associated with the employer's jobs
         $bids = $jobsWithBids->pluck('bids')->flatten();

         // Retrieve unique freelancers who have bid on jobs associated with the employer
         $freelancerCount = $bids->unique('freelancer_id')->count('freelancer_id');
 
         // Group bids by job ID and get the total number of bids for each job
         $totalBidsByJob = $bids->groupBy('job_id')->map(function ($bidsForJob) {
             return $bidsForJob->count();
         });
 
         return view('employer.bidIndex', compact('bids', 'freelancerCount', 'totalBidsByJob'));
    }

    public function viewBid($bidId)
    {
        $job = Bid::with(['job', 'freelancer'])->findOrFail($bidId);
        // dd($job);
        return view('employer.viewJob', compact('job'));
        // dd($job);
    }

    public function editBid($bidId)
    {
        $job = Bid::findOrFail($bidId);
        return view('employer.editJob', compact('job'));
    }

}
