<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class TransaksiList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        if (Gate::denies('manage-transaksis')) {
            abort(403);
        }
        $transaksi = Transaksi::latest()
            ->when($this->search !== '', function ($query) {
                $query->where('total_bayar', 'like', '%' . $this->search . '%')
                    ->orWhereHas('kamar', function ($q) {
                        $q->where('no_kamar', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('user', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate(5);

        return view('livewire.transaksi-list', [
            'transaksis' => $transaksi
        ]);
    }
}
