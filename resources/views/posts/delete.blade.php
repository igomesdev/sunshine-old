@extends('layouts.app')

@section('content')
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post" name="frm" >
        @csrf
        @method('DELETE')

        <div class="row">
                <div class="post">
                    <div class="container">
                        <div class="alertBox container">
                            <h2 class="pt-4 pb-4"><strong>Are you Sure you want delete this Post?</strong></h2>
                                <div id="home" class="d-flex">
                                    <a href="/p/{{ $post->id }}">
                                        <div class="buttonPrimary">
                                            Don't Delete
                                        </div>
                                    </a>

                                    <div class="mb-3">
                                        <button class="btn btn-danger">Delete Post</button>
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
                </div>
            </div>
    </form>
@endsection
