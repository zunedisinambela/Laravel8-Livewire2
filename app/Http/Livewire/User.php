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

    public function render()
    {
        return view('livewire.user',['users' => tableUser::orderBy('name', 'ASC')->paginate($this->paginate)])->extends('layouts.main')->section('content');
    }
}
