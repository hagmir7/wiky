<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $email;
    public $avatar;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|max:1024',
        ]);

        $user = Auth::user();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;

        // Handle avatar upload
        if ($this->avatar) {
            // Clear previous avatar
            $user->clearMediaCollection('users-avatar');

            // Add new avatar
            $user->addMedia($this->avatar->getRealPath())
                ->toMediaCollection('users-avatar');
        }

        $user->save();

        session()->flash('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        $validatedData = $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify current password
        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Current password is incorrect.');
            return;
        }

        // Update password
        $user->password = Hash::make($this->new_password);
        $user->save();

        // Clear password fields
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        session()->flash('success', 'Password changed successfully.');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }

    #[Layout('components.layouts.base')]
    public function render()
    {
        return view('livewire.auth.profile');
    }
}
