<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{

    public $login_id, $password;

    public function LoginHandler(){

        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if($fieldType == 'email'){
            $this -> validate([
                'login_id'=>'required|email|exists:users,email',
                'password'=>'required|min:5',
            ].[
                'login_id'=>'Enter Your Email Address',
                'login_id.email'=>'Invalid Email Address.',
                'login_id.exists'=>'This email is not registered!',
                'password.required'=>'A Password is Required.',
            ]);
        }else{
            $this -> validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:5',

            ],[
                'login_id.required'=>'Email or Username Required.',
                'login_id.exists'=>'Username is Not Registered.',
                'password.required'=>'Password is Required.',
            ]);
        }

        $creds = array($fieldType=>$this->login_id,'password'=>$this->password);

        if(Auth::guard('web')->attempt($creds) ){
            $checkUser = User::where($fieldType, $this->login_id) -> first();
            if($checkUser->blocked==1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail','Your Account has been Blocked.');
            }else{
                return redirect()->route('author.home');
            }
        }else{
            session()->flash('fail', 'Incorrect Email/Username or Password!');
        }

        // $this->validate([
        //     'email'=>'required|email|exists:users,email',
        //     'password'=>'required|min:5'
        // ],[ 
        //     'email.required'=>'Enter Your Email Address',
        //     'email.email'=>'Invalid Email Address.',
        //     'email.exists'=>'This email is not registered!',
        //     'password.required'=>'A Password is Required.'
        // ]);

        // $creds = array('email'=>$this->email, 'password'=>$this->password);

        // if(Auth::guard('web')->attempt($creds) ){
            
        //     $checkUser = User::where('email', $this->email)->first();
        //     if($checkUser->blocked==1){
        //         Auth::guard('web')->logout();
        //         return redirect()->route('author.login')->with('fail', "Your Account has been Blocked.");
        //     }else{
        //         return redirect()->route('author.home');
        //     }
        // }else{
        //     session()->flash('fail', 'Incorrect Email or Password!');
        // }
    }

    public function render()
    {
        return view('livewire.author-login-form');
    }
}
