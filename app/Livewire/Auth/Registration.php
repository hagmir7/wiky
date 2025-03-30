<?php

namespace App\Livewire\Auth;

use App\Enums\UserStatusEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Registration extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function register()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'status' => UserStatusEnum::Active,
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.auth.registration');
    }
}
