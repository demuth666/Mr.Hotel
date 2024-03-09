<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class TransaksiList extends Component
{
    public function render()
    {
        return view('livewire.transaksi-list', [
            'transaksis' => Transaksi::latest()->paginate(5)
        ]);
    }
}
