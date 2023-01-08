<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    //Assigning num of posts to show per page, search keyword, author keyword, category keyword search, orderBy to desc
    use WithPagination;
    public $perPage = 4;

    //Listener that waits for user to activate the deletePostAction to delete a post.
    protected $listeners = [
        'deletePostAction'
    ];

    //Page resets to default when refreshed.
    public function mount(){
        $this->resetPage();
    }

    //Page resets to default when refreshed while updating for a search keyword.
    public function updatingSearch(){
        $this->resetPage();
    }

    //Page resets to default when refreshed while updating for a search category.
    public function updatingCategory(){
        $this->resetPage();
    }

    //Page resets to default when refreshed while updating for a search author.
    public function updatingAuthor(){
        $this->resetPage();
    }
    

    //When a user is an admin, they see ALL POSTS. A standard user will only see his/her posts.
     public function render()
     {
         return view('livewire.all-posts',[
             'posts'=> auth()->user()->type == 1 ? 
                     Post::paginate($this->perPage) : Post::where('author_id', auth()->id())->paginate($this->perPage)
         ]);
    }

    public function deletePostAction($id){
        dd('Yes, Delete');
    }

    //Provides users with a 'Are you sure?' option after pressing delete button
    public function deletePost($id){
        $this->dispatchBrowserEvent('deletePost',[
            'title'=>"Are You Sure?",
            'html'=>"You want to delete this post...",
            'id'=>$id
        ]);
    }
    

    //returning the values of posts that fit criteria of the search terms, allowing users and admins to search for posts.
    // public function render()
    // {
    //     return view('livewire.all-posts',[
    //         'posts'=> auth()->user()->type == 1 ?
    //                     Post::search(trim($this->search))
    //                         ->when($this->category, function($query){
    //                             $query->where('category_id', $this->$category);
    //                         })
    //                         ->when($this->author, function($query){
    //                             $query->where('author_id', $this->$author);
    //                         })
    //                         ->when($this->orderBy, function($query){
    //                             $query->orderBy('id', $this->orderBy);
    //                         })
    //                         ->paginate($this->perPage) : 
    //                     Post::search(trim($this->search))
    //                         ->when($this->category, function($query){
    //                             $query->where('category_id',$this->category);
    //                         })
    //                         ->where('author_id', auth()->id())
    //                         ->when($this->orderBy, function($query){
    //                             $query->orderBy('id', $this->orderBy);
    //                         })
    //                         ->paginate($this->perPage)
    //     ]);
    // }
}
