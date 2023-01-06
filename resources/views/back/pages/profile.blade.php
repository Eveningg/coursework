@extends('back.layouts.pages-layout')
@section('pagesTitle', isset($pageTitle) ? $pageTitle : 'Profile')
@section('content')
    



<div class="page-header">
  <div class="row align-items-center">
    <div class="col-md-8">
      <span class="avatar avatar-md" style="background-image: url(...)"></span>
    </div>
    <div class="col-md-6"">
      <h2 class="page-title">Paweł Kuna</h2>
      <div class="page-subtitle">
        <div class="row">
          <div class="col-auto">
            <!-- Download SVG icon from http://tabler-icons.io/i/building-skyscraper -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="21" x2="21" y2="21" /><path d="M5 21v-14l8 -4v18" /><path d="M19 21v-10l-6 -4" /><line x1="9" y1="9" x2="9" y2="9.01" /><line x1="9" y1="12" x2="9" y2="12.01" /><line x1="9" y1="15" x2="9" y2="15.01" /><line x1="9" y1="18" x2="9" y2="18.01" /></svg>
            <a href="#" class="text-reset">UI Designer at Tabler</a>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-auto d-md-flex">
      <a href="#" class="btn btn-primary">
        Change Picture
      </a>
    </div>
  </div>
</div>
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
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="example-text-input" placeholder="email" disabled>
                                </div>
                            </div>
                        </div>
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