@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="home" class="content">
            @foreach($posts as $post)
                <div class="homeDescription">
                    <div class="image">
                        <a href="/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}">
                        </a>
                    </div>
                    <div class="price">
                        £{{ number_format($post->price) }}
                    </div>
                    <div class="shortDescription">
                        <div class="city">
                            {{ $post->city }}
                        </div>
                        <div class="shortInfo">
                            <div class="rooms"><i class="fas fa-bed"></i>{{ $post->rooms }}</div>
                            <div class="bathrooms"><i class="fas fa-shower"></i>{{ $post->bathrooms }}</div>
                            <div class="reception"><i class="fas fa-couch"></i>{{ $post->reception }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginationLink">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
