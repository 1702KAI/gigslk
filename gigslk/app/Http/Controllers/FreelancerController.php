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
        // Add validation logic
        $bid = Bid::findOrFail($id);
        $bid->update($request->all());

        return redirect()->route('freelancer.manageBids')->with('success', 'Bid updated successfully');
    }

    public function destroyBid($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete();

        return redirect()->route('freelancer.manageBids')->with('success', 'Bid deleted successfully');
    }
}
