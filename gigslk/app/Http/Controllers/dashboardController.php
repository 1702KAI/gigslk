<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\User;

class dashboardController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            $navLinks = $this->getNavLinks($role);

            // Retrieve active bids count based on the authenticated user's role
            $activeBidsCount = 0; // Default value

            if ($role == 2) { // Freelancer
                $activeBidsCount = Bid::where('freelancer_id', Auth::user()->id)
                    ->where('status', 'active')
                    ->count();
            }

            $jobCount = 0; // Default value

            if ($role == 3) { // Employer
                $jobCount = Auth::user()->jobs()->count();
            }

            if ($role == 1) {
                return view('superadmin.dashboard', compact('navLinks', 'activeBidsCount'));
            } elseif ($role == 2) {
                return view('freelancer.dashboard', compact('navLinks', 'activeBidsCount'));
            } elseif ($role == 3) {
                return view('employer.dashboard', compact('navLinks', 'jobCount'));
            } else {
                // Handle other roles or unexpected cases
                return abort(403, 'Unauthorized');
            }
        } else {
            // Handle the case when the user is not authenticated
            // You might redirect to the login page or show a different view
            return redirect()->route('login');
        }
    }


   public function getNavLinks($role)
{
    switch ($role) {
        case 1: // Superadmin
            return [
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link href="' . route('jobs.index') . '" :active="request()->routeIs(\'jobs.index\')">
                                        ' . __('Post a job') . '
                                    </x-nav-link>
                                </div>',
                ],
                // Add more superadmin-specific links
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                   <p> This is another link </p>
                                </div>',
                ],
                // Add more superadmin-specific links
            ];

        case 2: // Freelancer
            return [
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link href="' . route('freelancer.job.index') . '" :active="request()->routeIs(\'jobs.index\')">
                                        ' . __('Post a job') . '
                                    </x-nav-link>
                                </div>',
                ],
                // Add more freelancer-specific links
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                  <p> This is another link </p>
                                </div>',
                ],
                // Add more freelancer-specific links
            ];

        case 3: // Employer
            return [
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link href="' . route('employer.job.index') . '" :active="request()->routeIs(\'jobs.index\')">
                                        ' . __('Post a job') . '
                                    </x-nav-link>
                                </div>',
                ],
                // Add more employer-specific links
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <p> This is another link </p>
                                </div>',
                ],
                // Add more employer-specific links
                [
                    'html' => '<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <p> This is another link </p>
                                </div>',
                ],
                // Add more employer-specific links
            ];

        default:
            // Handle other roles or unexpected cases
            return [];
    }
}
}