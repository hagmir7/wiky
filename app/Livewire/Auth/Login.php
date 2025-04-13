<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function login()
    {
        $validatedData = $this->validate();

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ], $this->remember)) {
            session()->regenerate();
            return redirect()->intended(route('home'));
        }

        $this->addError('email', 'The provided credentials do not match our records.');
        $this->addError('password', 'The provided credentials do not match our records.');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
