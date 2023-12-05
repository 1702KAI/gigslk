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


<div>
    <!-- 
  
  more components on : web3templates.com
  
  https://play.tailwindcss.com/49jCSZQqJP -->


<div class="relative flex  flex-col jus items-center justify-center overflow-hidden bg-gray-50 p-6 sm:py-12">
    <h1 class="">Your Listings</h1>
    <div class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
      <div>
        <span class="text-blue-800 text-sm">Engineering</span>
        <h3 class="font-bold mt-px">Senior Full Stack Backend Engineer</h3>
        <div class="flex items-center gap-3 mt-2">
          <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">Full-time</span>
          <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg> Remote, UK</span>
        </div>
      </div>
      <div>
        <button class="bg-blue-400 text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
    </svg>
    </svg></button>
      </div>
       </div>
       <br>
       <div class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
        <div>
          <span class="text-blue-800 text-sm">Engineering</span>
          <h3 class="font-bold mt-px">Senior Full Stack Backend Engineer</h3>
          <div class="flex items-center gap-3 mt-2">
            <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">Full-time</span>
            <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg> Remote, UK</span>
          </div>
        </div>
        <div>
          <button class="bg-blue-400 text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
      </svg>
      </svg></button>
        </div>
         </div>
         <br>
         <div class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
            <div>
              <span class="text-blue-800 text-sm">Engineering</span>
              <h3 class="font-bold mt-px">Senior Full Stack Backend Engineer</h3>
              <div class="flex items-center gap-3 mt-2">
                <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">Full-time</span>
                <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg> Remote, UK</span>
              </div>
            </div>
            <div>
              <button class="bg-blue-400 text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
          </svg></button>
            </div>
             </div>
             <br>
             <div class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
                <div>
                  <span class="text-blue-800 text-sm">Engineering</span>
                  <h3 class="font-bold mt-px">Senior Full Stack Backend Engineer</h3>
                  <div class="flex items-center gap-3 mt-2">
                    <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">Full-time</span>
                    <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg> Remote, UK</span>
                  </div>
                </div>
                <div>
                  <button class="bg-blue-400 text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
              </svg></button>
                </div>
                 </div>
                 <br>
                 <div class="bg-white  shadow-xl shadow-gray-100 w-full max-w-4xl flex flex-col sm:flex-row gap-3 sm:items-center  justify-between px-5 py-4 rounded-md">
                    <div>
                      <span class="text-blue-800 text-sm">Engineering</span>
                      <h3 class="font-bold mt-px">Senior Full Stack Backend Engineer</h3>
                      <div class="flex items-center gap-3 mt-2">
                        <span class="bg-blue-100 text-blue-700 rounded-full px-3 py-1 text-sm">Full-time</span>
                        <span class="text-slate-600 text-sm flex gap-1 items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg> Remote, UK</span>
                      </div>
                    </div>
                    <div>
                      <button class="bg-blue-400 text-white font-medium px-4 py-2 rounded-md flex gap-1 items-center">Apply Now <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                  </svg>
                  </svg></button>
                    </div>
                     </div>
                     <br>
    </div>
</div>
