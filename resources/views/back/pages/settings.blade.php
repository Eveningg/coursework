@extends('back.layouts.pages-layout')
@section('pagesTitle', isset($pageTitle) ? $pageTitle : 'Settings')
@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                Settings
            </h2>
        </div>
    </div>

    <div class="card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
            <li class="nav-item">
                <a href="#tabs-home-17" class="nav-link active" data-bs-toggle="tab">General Settings</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-profile-17" class="nav-link" data-bs-toggle="tab">Logo & Favicon</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-activity-17" class="nav-link" data-bs-toggle="tab">Social Media</a>
            </li>
        </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-home-17">
                    @livewire('author-general-settings')
                </div>
                <div class="tab-pane fade" id="tabs-profile-14" role="tabpanel">
                <h4>Profile tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                </div>
                <div class="tab-pane fade" id="tabs-activity-14" role="tabpanel">
                <h4>Activity tab</h4>
                <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                </div>
            </div>
        </div>
    </div>
@endsection