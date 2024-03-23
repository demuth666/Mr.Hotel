<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Kamar;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Storage;

class KamarList extends Component
{
    use WithPagination;

    public $search = '';

    #[On('refresh-kamar-list')]

    public function delete(Kamar $kamar)
    {
        !is_null($kamar->image) && Storage::delete($kamar->image);
        $kamar->delete();
        $this->reset();
        $this->dispatch(
            'alert-delete',
            message: 'Data kamar berhasil dihapus',
            position: 'top-end',
            type: 'success',
            timer: 1500
        );
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
