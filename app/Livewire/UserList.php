<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserWeb as User;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class UserList extends Component
{
    use WithPagination;

    public $search = '';

    #[On('refresh-user-list')]
    public function render()
    {
        $user = User::latest()
            ->when($this->search !== '', fn(Builder $query) => $query
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%'))
            ->paginate(5);

        return view('livewire.user-list', [
            'users' => $user
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}
