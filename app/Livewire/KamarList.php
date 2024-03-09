<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Kamar;

class KamarList extends Component
{
    #[On('refresh-kamar-list')]

    public function delete(Kamar $kamar)
    {
        $kamar->delete();
    }

    public function render()
    {
        return view('livewire.kamar-list', [
            'kamars' => Kamar::latest()->paginate(5)
        ]);
    }
}
