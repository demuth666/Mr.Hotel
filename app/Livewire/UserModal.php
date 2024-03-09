<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Roles;
use App\Livewire\Forms\UserForm;
use App\Models\User;

class UserModal extends ModalComponent
{
    public ?User $user = null;
    public UserForm $form;

    public function mount(User $user = null)
    {
        if ($user->exists) {
            $this->form->setUser($user);
        }
    }
    public function render()
    {
        return view('livewire.user-modal', [
            'roles' => Roles::all(),
        ]);
    }

    public function save()
    {
        $this->form->save();
        $this->closeModal();
        $this->dispatch('refresh-user-list');
    }
}
