@extends('layouts.app')

@section('content')
<form method="GET" action="/">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>

@foreach ($posts as $post)
    <h2><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p>{{ Str::limit($post->content, 100) }}</p>
@endforeach

{{ $posts->links() }}
@endsection