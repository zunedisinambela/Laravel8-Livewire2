<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User as tableUser;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    use WithPagination;
    public $paginate = 10;
    protected $paginationTheme = 'bootstrap';
    public $ids, $name, $email, $password;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:4'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'name.min' => 'Min 4 karakter',
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Bukan format email',
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
        $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];
        tableUser::insert($data);
        session()->flash('add', 'Data berhasil disimpan');

        $this->clearForm();
        $this->emit('addUser');
    }

    public function detailDataUser($id)
    {
        $user = tableUser::where('id',$id)->first();
        $this->ids = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function updateDataUser()
    {
        $validation = $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];
        tableUser::where('id', $this->ids)->update($data);

        session()->flash('edit', 'Data berhasil diubah');

        $this->clearForm();
        $this->emit('editUser');
    }

    public function render()
    {
        return view('livewire.user',['users' => tableUser::orderBy('name', 'ASC')->paginate($this->paginate)])->extends('layouts.main')->section('content');
    }
}
