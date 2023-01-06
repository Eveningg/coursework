<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorChangedPasswordForm extends Component
{
    public $current_password, $new_password, $confirm_new_password;

    public function changePassword(){
        $this->validate([
            'current_password'=>[
                'required', function($attribute, $value, $fail){
                    if(!Hash::check($value, User::find(auth('web')->id())->password)){
                        return $fail(_('The Current Password is Incorrect!'));
                    }
                }
            ],
            'new_password'=>'required|min:5|max:25',
            'confirm_new_password'=>'same:new_password'
        ],[
            'current_password.required'=>'Enter Your Current Password:',
            'new_password.required'=>'Enter New Password:',
            'confirm_new_password.same'=>'The Confirmation Password must Equal New Password!'
        ]);
    }
    public function render()
    {
        return view('livewire.author-changed-password-form');
    }
}
