<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class UserList extends Component
{
    #[On('refresh-user-list')]
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::latest()->paginate(5)
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
