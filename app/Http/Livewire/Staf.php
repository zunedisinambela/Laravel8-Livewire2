<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Staf extends Component
{
    public $name;
    public $email;
    public $no_telp;
    public $success;

    public $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'no_telp' => 'required|min:12',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'name.min' => 'minimal 6 karakter',
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Bukan format email',
        'no_telp.required' => 'No telpon tidak boleh kosong',
        'no_telp.min' => 'No telpon min 12 karakter'
    ];

    // validasi secara realtime
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function save()
    {
        $this->validate();

        $this->success = 'Data berhasil disimpan';
    }

    public function render()
    {
        return view('livewire.staf')->extends('layouts.main')->section('content');
    }
}
