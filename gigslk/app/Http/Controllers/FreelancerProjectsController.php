<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Bid;
use Auth;

class FreelancerProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch projects where the freelancer is involved
        $ongoingProjects = Project::where('freelancer_id', Auth::id())
            ->where('status', 'in-progress')
            ->get();

        $rejectedProjects = Bid::where('freelancer_id', Auth::id())
            ->where('status', 'declined')
            ->get();

        $completedProjects = Project::where('freelancer_id', Auth::id())
            ->where('status', 'completed')
            ->get();

        return view('freelancer.manageProjects.index', compact('ongoingProjects', 'rejectedProjects', 'completedProjects'));
    }

    public function details($id)
    {
        // Fetch the project details based on the $id parameter
        $project = Project::findOrFail($id);

        // You can pass the $project variable to the view or perform additional logic

        return view('freelancer.manageProjects.details', compact('project'));
    }

    public function sendMessage(Request $request, $projectId)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string',
        ]);

        // Broadcast the message
        broadcast(new MessageSent($request->input('message')))->toOthers();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
