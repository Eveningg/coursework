<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Authors extends Component
{
    public $name, $email, $username, $author_type, $direct_publisher;

    public function addAuthor(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'username'=>'required|unique:users,username|min:6|max:25',
            'author_type'=>'required',
            'direct_publisher'=>'required',
        ],[
            'author_type.required'=>'Choose Author Type',
            'direct_publisher.required'=>'Specify Author Publication Access',
        ]);
    }
    public function render()
    {
        return view('livewire.authors',[
            'authors'=>User::where('id','!=',auth()->id())->get(),
        ]);
    }
}
