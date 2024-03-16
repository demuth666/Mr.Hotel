<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Kamar;

class KamarForm extends Form
{
    public $no_kamar = '';
    public $kelas_kamar = '';
    public $harga_kamar = '';
    public $status_kamar = '';

    public ?Kamar $kamar = null;

    public function setKamar(Kamar $kamar = null)
    {
        $this->kamar = $kamar;
        $this->no_kamar = $kamar->no_kamar;
        $this->kelas_kamar = $kamar->kelas_kamar;
        $this->harga_kamar = $kamar->harga_kamar;
        $this->status_kamar = $kamar->status_kamar;
    }

    public function save()
    {
        $this->validate();
        if (empty($this->kamar)) {
            Kamar::create($this->only(['no_kamar', 'kelas_kamar', 'harga_kamar']));
        } else {
            $this->kamar->update($this->only(['no_kamar', 'kelas_kamar', 'harga_kamar', 'status_kamar']));
        }
        $this->reset();
    }

    public function rules()
    {
        return [
            'no_kamar' => ['required', 'numeric', 'unique:kamars,no_kamar,' . optional($this->kamar)->id],
            'kelas_kamar' => 'required|string',
            'harga_kamar' => 'required|numeric',
        ];
    }

    protected $messages = [
        'no_kamar.required' => 'Nomor kamar tidak boleh kosong.',
        'no_kamar.numeric' => 'Nomor kamar harus berupa angka.',
        'no_kamar.unique' => 'Nomor kamar sudah ada.',
        'kelas_kamar.required' => 'Kelas kamar tidak boleh kosong.',
        'kelas_kamar.string' => 'Kelas kamar harus berupa huruf.',
        'harga_kamar.required' => 'Harga kamar tidak boleh kosong.',
        'harga_kamar.numeric' => 'Harga kamar harus berupa angka.'
    ];
}