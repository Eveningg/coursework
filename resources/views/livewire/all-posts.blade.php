<div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Search</label>
            <input type="text" class="form-control" placeholder="Keyword...">
        </div>
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Category</label>
            <select name="" class="form-select">
                <option value="">-- No Selected --</option>
                <option value="">Categ 1</option>
                <option value="">Categ 2</option>
                <option value="">Categ 3</option>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="" class="form-label">Authorr</label>
            <select name="" class="form-select">
                <option value="">-- No Selected --</option>
                <option value="">Author 1</option>
                <option value="">Author 2</option>
                <option value="">Author 3</option>
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
        {{$posts->links('livewire::bootstrap') }}
    </div>
</div>
