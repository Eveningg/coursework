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
                        @livewire('author-personal-details')
                    </div>
                </div>
                <div class="tab-pane" id="tabs-password">
                    <div>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control" name="example-text-input" placeholder="Current Password:">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="example-text-input" placeholder="New Password:">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="example-text-input" placeholder="Confirm New Password:">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    
@endsection