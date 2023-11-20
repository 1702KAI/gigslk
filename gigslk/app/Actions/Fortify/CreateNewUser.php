<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'role_id' => ['required', 'numeric' ], // Assuming roles 2 and 3 are valid
            'address' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'], // For Freelancers
            'company_name' => ['nullable', 'string', 'max:255'], // For Employers
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'],
            'address' => $input['address'] ?? null,
            // For Freelancers
            'job_title' => $input['job_title'] ?? null,
            // For Employers
            'company_name' => $input['company_name'] ?? null,
        ]);
    }
}
