<div class="flex items-center">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    <!-- Left Section -->
    <div class="flex-1 max-w-xs">
        <div class="bg-white shadow-xl rounded-lg py-3">
            <div class="photo-wrapper p-2">
                <!-- Use the user's profile image URL -->
                <img class="w-32 h-32 rounded-full mx-auto" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
            </div>
            <div class="p-2">
                <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ auth()->user()->name }}</h3>
                <div class="text-center text-gray-400 text-xs font-semibold">
                    <p>{{ auth()->user()->job_title }}</p>
                </div>
                <table class="text-xs my-3">
                    <tbody>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Address</td>
                            <td class="px-2 py-2">{{ auth()->user()->address }}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                            <td class="px-2 py-2">{{ auth()->user()->phone }}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                            <td class="px-2 py-2">{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Location</td>
                            <td class="px-2 py-2">Colombo, Srilanka</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Rate</td>
                            <td class="px-2 py-2">10$/h</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Tags</td>
                            <td class="px-2 py-2">Web</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center my-3">
                    <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium" href="#">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="flex-1">
        <div class="flex flex-col space-y-5 m-5">
            <div class="relative rounded bg-gray-200 shadow">
                <div class="bg-green-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow">
                    <i class="fas fa-envelope inline-block w-5"></i>
                </div>

                <div class="float-right top-0 right-0 m-3">
                    <div class="text-right text-sm">Active Gigs</div>
                    <div class="text-right text-3xl">25</div>
                </div>
            </div>

            <div class="relative rounded bg-gray-200 shadow">
                <div class="bg-red-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow">
                    <i class="fas fa-envelope inline-block w-5"></i>
                </div>

                <div class="float-right top-0 right-0 m-3">
                    <div class="text-right text-sm">Active Bids</div>
                    <div class="text-right text-3xl">10</div>
                </div>
            </div>

            <div class="relative rounded bg-gray-200 shadow">
                <div class="bg-yellow-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow">
                    <i class="fa-regular fa-star inline-block w-5"></i>
                </div>

                <div class="float-right top-0 right-0 m-3">
                    <div class="text-right text-sm">Rating</div>
                    <div class="text-right text-3xl">5</div>
                </div>
            </div>
        </div>
    </div>
</div>


