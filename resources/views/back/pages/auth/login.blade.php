@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

<div class="page page-center">
      <div class="container-tight py-4">
        @livewire('author-login-form')
    </div>
  </div>

@endsection