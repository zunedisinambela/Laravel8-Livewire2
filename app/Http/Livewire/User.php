<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User as tableUser;

class User extends Component
{
    use WithPagination;
    public $paginate = 10;
    protected $paginationTheme = 'bootstrap';
    public $name, $email, $password;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'name.min' => 'Min 4 karakter',
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Bukan format email',
        'email.unique' => 'Email ini sudah terdaftar',
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password min 4 karakter'
    ];

    // validasi secara realtime
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function saveDataUser()
    {
        $validation = $this->validate();

        tableUser::create($validation);
        session()->flash('message', 'Data berhasil disimpan');

        $this->clearForm();
        $this->emit('addUser');
    }

    public function render()
    {
        return view('livewire.user',['users' => tableUser::orderBy('name', 'ASC')->paginate($this->paginate)])->extends('layouts.main')->section('content');
    }
}
