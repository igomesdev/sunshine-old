@extends('layouts.app')

@section('content')
    <div class="post">
        <div class="container">
            <div id="home" class="container-three-columns">
                <div class="imagePost">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}">
                    </a>
                </div>

                <div class="textNormal">
                        <a href="/p/{{ $post->id }}/edit" class="pl-3"><strong>Edit Post</strong></a>
                </div>

                <div class="textRight">
                    <a href="#" class="pl-3"><strong>Delete Post</strong></a>
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
    </div>
@endsection
