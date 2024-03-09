<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public $nik = '';
    public $name = '';
    public $email = '';
    public $password = '';
    public $phone = '';
    public $role_id = '';

    public ?User $user = null;

    public function setUser(User $user = null)
    {
        $this->user = $user;
        $this->nik = $user->nik;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role_id = $user->role_id;
    }

    public function save()
    {
        $this->validate();
        if (empty($this->user)) {
            User::create($this->only(['nik', 'name', 'email', 'password', 'phone', 'role_id']));
        } else {
            $this->user->update($this->only(['nik', 'name', 'email', 'password', 'phone', 'role_id']));
        }
        $this->reset();
    }

    public function rules()
    {
        return [
            'nik' => ['required', 'numeric', 'unique:users,nik,' . optional($this->user)->id],
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . optional($this->user)->id,
            'password' => 'required|string',
            'phone' => 'required|numeric',
            'role_id' => 'required|numeric',
        ];
    }

    protected $messages = [
        'nik.required' => 'NIK tidak boleh kosong.',
        'nik.numeric' => 'NIK harus berupa angka.',
        'nik.unique' => 'NIK sudah ada.',
        'name.required' => 'Nama tidak boleh kosong.',
        'name.string' => 'Nama harus berupa huruf.',
        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Email harus berupa email.',
        'email.unique' => 'Email sudah ada.',
        'password.required' => 'Password tidak boleh kosong.',
        'password.string' => 'Password harus berupa huruf.',
        'phone.required' => 'Nomor telepon tidak boleh kosong.',
        'phone.numeric' => 'Nomor telepon harus berupa angka.',
        'role_id.required' => 'Role tidak boleh kosong.',
        'role_id.numeric' => 'Role harus berupa angka.',
    ];
}
