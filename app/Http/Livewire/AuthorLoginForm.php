<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{

    public $email, $password;

    public function LoginHandler(){
        $this->validate([
            'email'=>'required|email|exists:user,email',
            'password'=>'required|min:5'
        ],[
            'email.required'=>'Enter Your Email Address',
            'email.email'=>'invalid Email Address.',
            'email.exists'=>'This email is not registered!',
            'password.required'=>'A Password is Required.'
        ]);

        $creds = array('email' => $this->email, 'password'=>$this->password);

        if(Auth::guard('web')->attempt($creds) ){

        }else{
            session()->flash('fail', 'Incorrect Email or Password!');
        }
    }

    public function render()
    {
        return view('livewire.author-login-form');
    }
}
