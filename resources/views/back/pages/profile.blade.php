@extends('back.layouts.pages-layout')
@section('pagesTitle', isset($pageTitle) ? $pageTitle : 'Profile')
@section('content')
    


@livewire('author-profile-header')
<hr>
<div class="row">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
            <li class="nav-item">
                <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab">Personal Details</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Change Password</a>
            </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
            <div class="tab-pane active show" id="tabs-details">
                <h4>Home tab</h4>
                <div>
                    <form method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">username</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Biography</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="email" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Textarea</label>
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="content...">Biography...</textarea>
                        </div>
                        <button type="submit" class="btn btn-priamry">Save Changes</button>   
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="tabs-password">
                <h4>Profile tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
            </div>
            </div>
        </div>
    </div>
</div>



    
@endsection