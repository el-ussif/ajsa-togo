@extends('layouts.admin.app')

@section('title', 'Modifier le post')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('pages.admin.posts._form', ['post' => $post])
    </form>
@endsection
