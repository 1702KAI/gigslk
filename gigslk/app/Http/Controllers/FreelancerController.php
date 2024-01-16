<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Job;
use Auth;

class FreelancerController extends Controller
{
    public function manageBids()
    {
        // Get the authenticated freelancer
        $freelancer = Auth::user();

        // Retrieve bids associated with the freelancer, along with related job and employer information
        $bids = Bid::with(['job.user'])->where('freelancer_id', $freelancer->id)->get();

        return view('freelancer.bidIndex', compact('bids'));
    }
    public function showBid($id)
    {
        $bid = Bid::with(['job.user'])->findOrFail($id);

        return view('freelancer.showBid', compact('bid'));
    }

    public function editBid($id)
    {
        $bid = Bid::findOrFail($id);

        return view('freelancer.editBid', compact('bid'));
    }

    public function updateBid(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'proposal' => 'required|string',
            'portfolio' => 'nullable|string',
            // 'status' => 'required|in:active,inactive,in-progress,completed', // Adjust the options based on your status values
            // Add more validation rules for other fields as needed
        ]);

        // Find the bid by ID
        $bid = Bid::findOrFail($id);

        // Update the bid with the validated data
        $bid->update($validatedData);

        // Redirect back to the manageBids page with a success message
        return redirect()->route('freelancer.manageBids')->with('success', 'Bid updated successfully');
    }

    public function destroyBid($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete();

        return redirect()->route('freelancer.manageBids')->with('success', 'Bid deleted successfully');
    }
}
