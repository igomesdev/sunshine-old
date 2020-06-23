@extends('layouts.app')

@section('content')
    <div class="post">
        <div id="home" class="container leftPadding">
            <div class="sub-container">
                <div class="imagePost">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}">
                    </a>
                </div>

                <div class="textNormal">
                    <a href="/upload/{{ $post->id }}/edit" class="pl-3"><strong>Edit Post</strong></a>
                </div>

                <div class="textNormal textNormal-right">
                     Take a look at more properties from
                </div>

                <div class="textNormal">
                    <a href="/profile/{{ $post->user->id }}">
                        <strong>{{ $post->user->profile->name }}</strong>
                    </a>
                </div>

                <div class="textNormal">
                    <a href="#" class="pl-3"><strong>Follow</strong></a>
                </div>
            </div>
        </div>

        <div class="postDescription">
            <div class="imageBundle">
                <div class="image">
                    <img src="/storage/{{ $post->image }}">
                </div>
                <div class="camera">
                    <i class="fas fa-camera">5 Images</i>
                </div>
            </div>

            <div class="postData">
                <p>
                    <b>Price:</b> <span class="price">£{{ number_format($post->price) }}</span>
                </p>

                <p>
                    <b>City:</b> {{ $post->city }}
                </p>

                <p>
                    <b>Bedrooms:</b> {{ $post->rooms }}
                </p>

                <p>
                    <b>Bathrooms:</b> {{ $post->bathrooms }}
                </p>

                <p>
                   <b>Reception Rooms:</b> {{ $post->reception }}
                </p>
            </div>
        </div><br>
            <div class="description">
                <h5><strong>Description</strong></h5>
                {{ $post->description }}
            </div>
    </div>

    <div class="textPadding">
        <strong>More Properties from </strong> <i><a href="/profile/{{ $post->user->id }}">
            {{ $post->user->profile->name }}
        </a></i>
    </div>

    <div id="home" class="content">
        @foreach($userPost as $post)
            <div class="homeDescription">
                <div class="image">
                    <a href="/p/{{ $post->id }}">
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
        {{ $userPost->links() }}
    </div>
@endsection
