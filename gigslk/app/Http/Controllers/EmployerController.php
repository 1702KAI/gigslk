<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Job;
use App\Models\User;
use App\Models\Project;
use App\Notifications\BidAcceptedNotification;
use Auth;

class EmployerController extends Controller
{
    public function manageBids()
{
    // Get the authenticated employer
    $employer = Auth::user();

    // Retrieve jobs associated with the employer that have active bids
    $jobsWithActiveBids = Job::where('user_id', $employer->id)
        ->whereHas('bids', function ($query) {
            $query->where('status', 'active');
        })
        ->with(['bids', 'bids.freelancer'])
        ->get();

    // Flatten the active bids to get all bids associated with the employer's jobs
    $activeBids = $jobsWithActiveBids->pluck('bids')->flatten();

    // Filter out bids with a status other than 'active'
    $activeBids = $activeBids->filter(function ($bid) {
        return $bid->status === 'active';
    });

    // Retrieve unique freelancers who have active bids on jobs associated with the employer
    $activeFreelancerCount = $activeBids->unique('freelancer_id')->count('freelancer_id');

    // Group active bids by job ID and get the total number of active bids for each job
    $totalActiveBidsByJob = $activeBids->groupBy('job_id')->map(function ($activeBidsForJob) {
        return $activeBidsForJob->count();
    });

    return view('employer.bidIndex', compact('activeBids', 'activeFreelancerCount', 'totalActiveBidsByJob'));
}


public function viewBid($jobId)
{
    // Retrieve only active bids with associated job and freelancer information for the specified job
    $activeBids = Bid::with(['freelancer'])
        ->where('job_id', $jobId)
        ->where('status', 'active')
        ->get();

    // Retrieve job information from the jobs table
    $job = Job::find($jobId);

    return view('employer.viewJob', compact('job', 'activeBids'));
}


    

    public function editBid($bidId)
    {
        $job = Bid::findOrFail($bidId);
        return view('employer.editJob', compact('job'));
    }

    public function acceptBid(Bid $bid)
    {
        // Notify the freelancer that their bid has been accepted
        // $bid->freelancer->notify(new BidAcceptedNotification($bid->job));
    
        // Update the status of the accepted bid to 'in-progress'
        $bid->update(['status' => 'in-progress']);
    
        // Update the statuses of other bids for the same job to 'declined'
        $jobBids = Bid::where('job_id', $bid->job_id)->where('id', '!=', $bid->id)->get();
    
        foreach ($jobBids as $otherBid) {
            $otherBid->update(['status' => 'declined']);
        }
    
        // Check if a project already exists for this job
        $existingProject = Project::where('job_id', $bid->job_id)->first();
    
        // If a project doesn't exist, create a new project record
        if (!$existingProject) {
            $project = Project::create([
                'job_id' => $bid->job_id,
                'freelancer_id' => $bid->freelancer_id,
                'bid_proposal' => $bid->proposal,
                'freelancer_portfolio' => $bid->portfolio,
                'project_owner' => Auth::user()->name, // Assuming the employer's name is the project owner
                'budget' => $bid->job->budget,
                'timeline' => $bid->job->duration,
                'status' => 'in-progress', // or any default status
            ]);
        }
    
        return redirect()->route('employer.viewJob', $bid->job->id)->with('success', 'Bid accepted successfully');
    }
    
    

    public function declineBid(Bid $bid)
{
    // Additional logic if needed

    // Update the bid status to 'inactive'
    $bid->update(['status' => 'declined']);

    return redirect()->route('employer.viewJob', $bid->job->id)->with('success', 'Bid declined successfully');
}


}
