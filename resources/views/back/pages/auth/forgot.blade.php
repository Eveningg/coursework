@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forgot password')
@section('content')

<div class="page page-center">
      <div class="container-tight py-4">
        @livewire('author-forgot-form')
        <div class="text-left text-muted mt-3">
          <a href="{{ route('author.login') }}">Sign In</a> 
        </div>
      </div>
    </div>

@endsection