<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Authors extends Component

{
    use WithPagination;
    public $name, $email, $username, $author_type, $direct_publisher;
    public $search;
    public $perPage = 4;
    public $selected_author_id;
    public $blocked = 0;

    protected $listeners = [
        'resetForms',
        'deleteAuthorAction'
    ];

    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

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

        if($this->isOnline()){
            $default_password = Random::generate(8);

            $author = new User();
            $author->name = $this->name;
            $author->email = $this->email;
            $author->username = $this->username;
            $author->password = Hash::make($default_password);
            $author->type = $this->author_type;
            $author->direct_publish = $this->direct_publisher;
            $saved = $author->save();

            $data = array(
                'name' => $this->name,
                'username' => $this->username,
                'email'=>$this->email,
                'password'=>$default_password,
                'url'=>route('author.profile'),
            );

            $author_email = $this->email;
            $author_name = $this->name;

            if($saved){
                $this->showToastr('Something Went Wrong!', 'error');
            }

            $this->showToastr('New Author Created.', 'success');
            $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
            $this->dispatchBrowserEvent('hide_add_author_modal');

        }else{
            $this->showToastr('You Are Offline. Check Connection - Submit Form Again.', 'error');
        }
    }

    public function deleteAuthor($author){
        $this->dispatchBrowserEvent('deleteAuthor',[
            'title'=>"Are You Sure?",
            'html'=>"You want to delete this Author: <br><b>".$author['name'].'</b>',
            'id'=>$author['id'],
        ]);
    }

    public function deleteAuthorAction($id){

        $author = User::find($id);
        $path = 'back/dist/img/authors/';
        $author_picture = $author->getAttributes()['picture'];
        $picture_full_path = $path.$author_picture;
    
        if($author_picture != null || File::exists(public_path($picture_full_path))){
            File::delete(public_path($picture_full_path));
        }
        
        $author->delete();
        $this->showToastr('Author has been successfull deleted.', 'info');
        
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site,"r")){
            return true;
        }else{
            return false;
        }
    }
    public function render()
    {
        return view('livewire.authors',[
            'authors'=>User::search(trim($this->search))
                        ->where('id','!=',auth()->id())->paginate($this->perPage),
        ]);
    }
}
