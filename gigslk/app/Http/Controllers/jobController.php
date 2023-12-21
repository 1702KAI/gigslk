<?php

namespace App\Http\Controllers;

use App\Models\Job; // Make sure to import the Job model
use Illuminate\Http\Request;
use Auth;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Retrieve jobs associated with the authenticated user
        $jobs = $user->jobs;
    
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|string',
            'budget' => 'required|numeric',
            'duration' => 'required|integer',
            // Add more validation rules as needed
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Create a new job and associate it with the authenticated user
        $job = $user->jobs()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'skills' => $request->input('skills'),
            'budget' => $request->input('budget'),
            'duration' => $request->input('duration'),
            'user_email' => $user->email,
            'role_id' => $user->role_id,
            'user_id' => $user->id, // Add user_id
            'status' => 'active',
            // Add more fields as needed
        ]);

        return redirect()->route('employer.job.index')->with('success', 'Job listing created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules as needed
        ]);

        $job->update($request->all());

        return redirect()->route('employer.job.index')->with('success', 'Job listing updated successfully');
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,in-progress,completed',
        ]);

        $job = Job::findOrFail($id);
        $job->update(['status' => $request->input('status')]);

        return redirect()->route('employer.job.show', $job->id)->with('success', 'Job status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
    // Delete associated bids (assuming bids have a foreign key relationship with jobs)
    $job->bids()->delete();

    // Delete the job
    $job->delete();

    return redirect()->route('employer.job.index')->with('success', 'Job listing deleted successfully');
    }
}
