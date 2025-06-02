@extends('layouts.admin.app')

@section('title', 'Nouveau post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('pages.admin.posts._form', ['category' => null])
    </form>
@endsection
