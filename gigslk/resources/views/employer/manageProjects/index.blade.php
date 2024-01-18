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
                            <!-- Add more project details as needed -->
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
                            <!-- Add more project details as needed -->
                        </div>
                    </div>
                @empty
                    <p>No completed projects.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
