<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class AllPosts extends Component
{
    //Assigning num of posts to show per page, search keyword, author keyword, category keyword search, orderBy to desc
    use WithPagination;
    public $perPage = 4;
    public $search = null;
    public $author = null;
    public $category = null;
    public $orderBy = 'desc';

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

    //returning the values of posts that fit criteria of the search terms, allowing users and admins to search for posts.
    public function render()
    {
        return view('livewire.all-posts',[
            'posts'=> auth()->user()->type == 1 ?
                        Post::search(trim($this->search))
                            ->when($this->category, function($query){
                                $query->where('category_id', $this->$category);
                            })
                            ->when($this->author, function($query){
                                $query->where('author_id', $this->$author);
                            })
                            ->when($this->orderBy, function($query){
                                $query->orderBy('id', $this->orderBy);
                            })
                            ->paginate($this->perPage) : 
                        Post::search(trim($this->search))
                            ->when($this->category, function($query){
                                $query->where('category_id',$this->category);
                            })
                            ->where('author_id', auth()->id())
                            ->when($this->orderBy, function($query){
                                $query->orderBy('id', $this->orderBy);
                            })
                            ->paginate($this->perPage)
        ]);
    }
}
