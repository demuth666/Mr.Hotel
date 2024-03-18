<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Kamar;
use Livewire\WithFileUploads;

class KamarForm extends Form
{
    public $no_kamar = '';
    public $kelas_kamar = '';
    public $harga_kamar = '';
    public $status_kamar = '';
    public $image = '';

    public ?Kamar $kamar = null;

    use WithFileUploads;

    public function setKamar(Kamar $kamar = null)
    {
        $this->kamar = $kamar;
        $this->no_kamar = $kamar->no_kamar;
        $this->kelas_kamar = $kamar->kelas_kamar;
        $this->harga_kamar = $kamar->harga_kamar;
        $this->status_kamar = $kamar->status_kamar;
        $this->image = $kamar->image;
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image = $this->image->store('kamar', 'public');
        }

        if (empty ($this->kamar)) {
            Kamar::create($this->only(['no_kamar', 'kelas_kamar', 'harga_kamar', 'image']));
        } else {
            $this->kamar->update($this->only(['no_kamar', 'kelas_kamar', 'harga_kamar', 'status_kamar', 'image']));
        }
        $this->reset();
    }

    public function rules()
    {
        return [
            'no_kamar' => ['required', 'numeric', 'unique:kamars,no_kamar,' . optional($this->kamar)->id],
            'kelas_kamar' => 'required|string',
            'harga_kamar' => 'required|numeric',
            'image' => 'nullable|image|max:1024'
        ];
    }

    protected $messages = [
        'no_kamar.required' => 'Nomor kamar tidak boleh kosong.',
        'no_kamar.numeric' => 'Nomor kamar harus berupa angka.',
        'no_kamar.unique' => 'Nomor kamar sudah ada.',
        'kelas_kamar.required' => 'Kelas kamar tidak boleh kosong.',
        'kelas_kamar.string' => 'Kelas kamar harus berupa huruf.',
        'harga_kamar.required' => 'Harga kamar tidak boleh kosong.',
        'harga_kamar.numeric' => 'Harga kamar harus berupa angka.',
        'image.required' => 'Gambar kamar tidak boleh kosong.',
        'image.image' => 'Gambar kamar harus berupa file gambar.',
        'image.max' => 'Ukuran gambar kamar maksimal 1MB.'
    ];
}