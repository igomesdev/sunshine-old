@extends('layouts.app')

<div class="container content">
    @section('content')
        <div class="contentBody">
            <div class="imageProfile">
                <img src="{{ $user->profile->profileImage() }}" alt="front">
                <div class="address">
                    @if (($user->profile->address != null)
                    and ($user->profile->city == null )
                    and ($user->profile->postcode == null ))
                        {{ $user->profile->address }}
                    @elseif ($user->profile->address == null)
                    @else
                        {{ $user->profile->address . ',' }}
                    @endif

                    @if (($user->profile->city != null)
                    and ($user->profile->postcode == null ))
                        {{ $user->profile->city }}
                    @elseif ($user->profile->city == null)
                    @else
                        {{ $user->profile->city . ',' }} <br>
                    @endif

                    @if ($user->profile->postcode != null )
                        {{ $user->profile->postcode }}
                    @endif
                </div>
            </div>
                <div class="contentProfile">
                    <div class="menuRow">
                        <div class="name">
                            <h3>{{ $user->profile->name }}</h3>
                        </div>
                        <!--<follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>-->

                        <div><strong>{{ $postCount }}</strong> Properties</div>
                        <!--<div><strong>{{ $followersCount }}</strong> followers</div>-->
                        @can ('update', $user->profile)
                            <div>
                                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a><br>
                            </div>
                        @endcan
                        @can ('update', $user->profile)
                            <a href="/p/create">Add new Post</a>
                        @endcan
                    </div>
                    <div class="d-flex pl-5">
                        <!--<div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>-->
                    </div>
                    <div class="description">{{ $user->profile->description }}</div>
                    <div class="siteLink">Link With Us<a href="facebook.com">{{ $user->profile->url }}</a></div>
                </div>
            </div>
            <div class="row">
                @foreach($user->posts as $post)
                    <div class="col-4 pb-4">
                        <a href="/p/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                    </div>
                @endforeach
            </div>
        @endsection
    </div>



