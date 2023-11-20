<x-guest-layout>
<!-- resources/views/livewire/registration.blade.php -->
<div class="bg-gray-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
        {{-- <img src="images/register-landing.jpg" alt="Placeholder Image" class="object-cover w-full h-full"> --}}
        <img src="{{ asset('images/register-landing.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <!-- Right: Registration Form -->
    <div class="lg:w-1/2 p-8">
            <x-authentication-card>
                <x-slot name="logo">
                    {{-- <x-jet-authentication-card-logo /> --}}
                </x-slot>
        
                <x-validation-errors class="mb-4" />
        
                <form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}">
                    @csrf
        
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="role_id" value="{{ __('Register as:') }}" />
                        <select name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="2">Freelancer</option>
                            <option value="3">Employer</option>
                        </select>
                    </div>
        
                    <div class="mt-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" class="block mt-1 w-full" type="text" :value="old('address')" name="address" />
                    </div>
        
                    <div class="mt-4" x-show="role_id == 2">
                        <x-label for="job_title" value="{{ __('Job Title') }}" />
                        <x-input id="job_title" class="block mt-1 w-full" type="text" :value="old('job_title')" name="job_title" />
                    </div>
        
                    <div class="mt-4" x-show="role_id == 3">
                        <x-label for="company_name" value="{{ __('Company Name (Optional)') }}" />
                        <x-input id="company_name" class="block mt-1 w-full" type="text" :value="old('company_name')" name="company_name" />
                    </div>
        
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms"/>
        
                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif
        
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
        
                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
    </div>
</div>
</x-guest-layout>
