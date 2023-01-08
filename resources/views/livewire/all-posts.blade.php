<div>

    <!-- row dedeciated to my search functions for a post.  -->
    <div class="row">

        <!-- searchs for keywords of a post -->
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Search</label>
            <input type="text" class="form-control" placeholder="Keyword..." wire:model='search'>
        </div>
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Category</label>
            <select class="form-select" wire:model='category'>
                <option value="">-- No Selected --</option>
                @foreach(\App\Models\SubCategory::whereHas('posts')->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- only admins can access a drop-down menu to sort by user (type==1 means admin account) -->
        @if(auth()->user()->type == 1)
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Author</label>
            <select class="form-select" wire:model='author'>
                <option value="">-- No Selected --</option>
                @foreach(\App\Models\User::whereHas('posts')->get() as $author)
                <option value="{{ $author -> id}}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        @endif


        <!-- creating a drop-down menu to sort posts by either ascending or descending order -->
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">orderBy</label>
            <select class="form-select" wire:model='orderBy'>
                <option value="asc">ASC</option>
                <option value="desc">DESC</option>
            </select>
        </div>
    </div>



    <div class="row row-cards">

    @forelse($posts as $post)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <img src="/storage/images/post_images/thumbnails/resized_{{$post->featured_image}}" alt="" class="card-img-top">
            <div class="card-body p-2">
                <h3 class="m-0 mb-1">{{$post->post_title}}</h3>
            </div>
            <div class="d-flex">
                <a href="" class="card-btn">Edit</a>
                <a href="" class="card-btn">Delete</a>
            </div>
        </div>
    </div>
    @empty
        <span class="text-danger">No Posts found</span>
    @endforelse
    </div>

    <div class="d-block mt-2">
        {{$posts->links('livewire::simple-bootstrap') }}
    </div>
</div>
