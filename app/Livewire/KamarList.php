<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Kamar;
use Livewire\WithPagination;

class KamarList extends Component
{
    use WithPagination;

    public $search = '';

    #[On('refresh-kamar-list')]

    public function delete(Kamar $kamar)
    {
        $kamar->delete();
    }

    public function render()
    {
        $kamar = Kamar::latest()
            ->when($this->search !== '', function ($query) {
                $query->where('no_kamar', 'like', '%' . $this->search . '%')
                    ->orWhere('kelas_kamar', 'like', '%' . $this->search . '%')
                    ->orWhere('status_kamar', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.kamar-list', [
            'kamars' => $kamar
        ]);
    }
}
