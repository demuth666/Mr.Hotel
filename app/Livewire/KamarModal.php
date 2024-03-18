<?php

namespace App\Livewire;

use App\Livewire\Forms\KamarForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Models\Kamar;

class KamarModal extends ModalComponent
{
    use WithFileUploads;
    public ?Kamar $kamar = null;
    public KamarForm $form;

    public function mount(Kamar $kamar = null)
    {
        if ($kamar->exists) {
            $this->form->setKamar($kamar);
        }
    }
    public function save()
    {
        $this->form->save();
        $this->closeModal();
        $this->dispatch('refresh-kamar-list');
    }

    public function render()
    {
        return view('livewire.kamar-modal');
    }
}
