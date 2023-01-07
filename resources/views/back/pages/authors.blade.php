@extends('back.layouts.pages-layout')
@section('pagesTitle', isset($pageTitle) ? $pageTitle : 'Authors')
@section('content')

@livewire('authors')

@endsection