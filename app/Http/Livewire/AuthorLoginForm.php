<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{

    public $email, $password;

    public function LoginHandler(){
        
    }

    public function render()
    {
        return view('livewire.author-login-form');
    }
}
