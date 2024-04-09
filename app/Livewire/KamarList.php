<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Kamar;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Storage;

class KamarList extends Component
{
    use WithPagination;

    public $search = '';

    #[On('refresh-kamar-list')]

    public function delete(Kamar $kamar)
    {
        !is_null($kamar->image) && Storage::disk('public')->delete($kamar->image);
        $kamar->delete();
        $this->reset();
        $this->dispatch('refresh-kamar-list');
    }

    public function render()
    {
        if (Gate::denies('manage-kamars')) {
            abort(403);
        }
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
