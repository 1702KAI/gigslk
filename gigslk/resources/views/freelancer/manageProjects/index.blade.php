<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Ongoing Projects -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-2">Ongoing Projects</h3>
                @forelse($ongoingProjects as $project)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2">{{ $project->job->title }}</h4>
                            <p class="text-gray-600">{{ $project->job->description }}</p>
                            <p class="text-gray-500">Timeline: {{ $project->job->timeline }} days</p>
                            <p class="text-gray-500">Deadline: {{ $project->deadline }}</p>
                            <span class="inline-block bg-green-500 text-white px-2 py-1 rounded-full">Ongoing</span>
                            <!-- Add more project details as needed -->
                            <a href="{{ route('freelancer.myProjects.details', ['id' => $project->id]) }}" class="text-blue-500">View Details</a>
                        </div>
                    </div>
                @empty
                    <p>No ongoing projects.</p>
                @endforelse
            </div>

            <!-- Bidded Projects -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-2">Rejected Projects</h3>
                @forelse($rejectedProjects as $project)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2">{{ $project->job->title }}</h4>
                            <p class="text-gray-600">{{ $project->job->description }}</p>
                            <span class="inline-block bg-red-500 text-white px-2 py-1 rounded-full">Rejected</span>
                            <!-- Add more project details as needed -->
                        </div>
                    </div>
                @empty
                    <p>No rejected projects.</p>
                @endforelse
            </div>

            <!-- Completed Projects -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Completed Projects</h3>
                @forelse($completedProjects as $project)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-2">{{ $project->job->title }}</h4>
                            <p class="text-gray-600">{{ $project->job->description }}</p>
                            <p class="text-gray-500">Timeline: {{ $project->job->timeline }} days</p>
                            <p class="text-gray-500">Deadline: {{ $project->deadline }}</p>
                            <span class="inline-block bg-blue-500 text-white px-2 py-1 rounded-full">Completed</span>
                            <!-- Add more project details as needed -->
                            <a href="{{ route('freelancer.myProject.details', ['id' => $project->id]) }}" class="text-blue-500">View Details</a>
                        </div>
                    </div>
                @empty
                    <p>No completed projects.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
