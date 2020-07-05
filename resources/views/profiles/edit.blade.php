@extends('layouts.app')

@section('content')
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Company Name</label>
                    <input id="name"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           value="{{ old('name') ?? $user->profile->name }}"
                           autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label">Address</label>
                    <input id="address"
                           type="text"
                           class="form-control"
                           name="address"
                           value="{{ old('address') ?? $user->profile->address }}"
                           autocomplete="address" autofocus>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label">City</label>
                    <input id="city"
                           type="text"
                           class="form-control"
                           name="city"
                           value="{{ old('city') ?? $user->profile->city }}"
                           autocomplete="city" autofocus>
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="postcode" class="col-md-4 col-form-label">Postcode</label>
                    <input id="postcode"
                           type="text"
                           class="form-control"
                           name="postcode"
                           value="{{ old('postcode') ?? $user->profile->postcode }}"
                           autocomplete="postcode" autofocus>
                    @error('postcode')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <textarea id="description"
                              maxlength="2000"
                              type="text"
                              class="form-control @error('description') is-invalid @enderror"
                              name="description"
                              autocomplete="description"
                              autofocus>{{ old('description') ?? $user->profile->description }}
                        </textarea>
                    <p>
                        <span id="wordCount">2000</span> Characters
                    </p>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>
                    <input id="url"
                           type="text"
                           class="form-control @error('url') is-invalid @enderror"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url }}"
                           autocomplete="url" autofocus>
                    @error('url')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <div style="color: red">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row pt-4 mb-3">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
@endsection




