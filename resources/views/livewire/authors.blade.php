<div>
    <div class="page-header d-print-none mb-2">

        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Authors
                </h2>      
            </div>
            <!-- Page Title Actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user...">
                    <a href="#" class="btn btn-primary" data-bs-target='#add_author_modal' data-bs-toggle='modal'>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2='19'></line>
                        <line x1='5' y1='12' x2='19' y2='12'></line></svg>
                        New Author
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards">

        @forelse($authors as $author)



        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4 text-center">
                <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ $author->picture }})"></span>
                <h3 class="m-0 mb-1"><a href="#">{{ $author->name }}</a></h3>
                <div class="text-muted">{{ $author->email }}</div>
                <div class="mt-3">
                    <span class="badge bg-purple-lt">{{ $author->authorType->name }}</span>
                </div>
                </div>
                <div class="d-flex">
                <a href="#" class="card-btn">Edit</a>
                <a href="#" class="card-btn">Delete</a>
                </div>
            </div>
        </div>
        @empty
            <span class="text-danger">No Author Found!</span>
        @endforelse
    </div>

{{-- MODALS --}}
<div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Author</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Text</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Input a Placeholder">
                    </div>
                </form>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>
