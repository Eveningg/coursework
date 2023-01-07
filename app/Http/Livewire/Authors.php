<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Authors extends Component
{
    public function render()
    {
        return view('livewire.authors',[
            'authors'=>User::where('id','!=',auth()->id())->get(),
        ]);
    }
}
