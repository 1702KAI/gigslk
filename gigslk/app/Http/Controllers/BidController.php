<?php

// app/Http/Controllers/BidController.php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $bids = Bid::all();
        return view('bids.index', compact('bids'));
    }

    public function create()
    {
        // Add logic to prepare data for creating a new bid
        return view('bids.create');
    }

    public function store(Request $request, Job $job)
    {
        // Validate bid information
        $request->validate([
            'proposal' => 'required|string',
            'portfolio' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        // Create a bid associated with the job
        $bid = $job->bids()->create([
            'freelancer_id' => auth()->id(),
            'proposal' => $request->input('proposal'),
            'portfolio' => $request->input('portfolio'),
            'status' => 'active',
            // Add more bid fields as needed
        ]);

        return redirect()->route('freelancer.job.index', $job->id)->with('success', 'Bid placed successfully');
    }

    public function show($id)
    {
        $bid = Bid::findOrFail($id);
        return view('bids.show', compact('bid'));
    }

    public function edit($id)
    {
        $bid = Bid::findOrFail($id);
        // Add logic to prepare data for editing a bid
        return view('bids.edit', compact('bid'));
    }

    public function update(Request $request, $id)
    {
        // Add validation logic
        $bid = Bid::findOrFail($id);
        $bid->update($request->all());

        return redirect()->route('bids.index')->with('success', 'Bid updated successfully');
    }

    public function destroy($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete();

        return redirect()->route('bids.index')->with('success', 'Bid deleted successfully');
    }
}

