@extends('layouts.app')

@section('content')

    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post" name="frm" >
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Update Post</h1>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                        <textarea id="description"
                                  maxlength="2000"
                                  type="text"
                                  class="form-control @error('description') is-invalid @enderror"
                                  name="description"
                                  autocomplete="description"
                                  autofocus>{{ old('value') ?? $post->description }}
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
                    <label for="price" class="col-md-4 col-form-label">Price</label>
                    <input id="price"
                           type="text"
                           class="form-control @error('price') is-invalid @enderror"
                           name="price"
                           value="{{ old('price') ?? $post->price }}"
                           autocomplete="price" autofocus>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label">City</label>
                    <input id="city"
                           class="form-control @error('city') is-invalid @enderror"
                           name="city"
                           value="{{ old('city') ?? $post->city }}"
                           autocomplete="city" autofocus>
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="bathrooms" class="col-md-4 col-form-label">Bathrooms</label>
                    <input id="bathrooms"
                           class="form-control"
                           name="bathrooms"
                           value="{{ old('bathrooms') ?? $post->bathrooms }}"
                           autocomplete="bathrooms" autofocus>
                    @error('bathrooms')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="reception" class="col-md-4 col-form-label">Reception rooms</label>
                    <input id="reception"
                           class="form-control"
                           name="reception"
                           value="{{ old('reception') ?? $post->reception }}"
                           autocomplete="reception" autofocus>
                    @error('reception')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="rooms" class="col-md-4 col-form-label">Rooms</label>
                    <input id="rooms"
                           class="form-control"
                           name="rooms"
                           value="{{ old('rooms') ?? $post->rooms }}"
                           autocomplete="rooms" autofocus>
                    @error('rooms')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Update the Main Image</label>
                    <input type="file"
                           class="form-control-file"
                           id="image"
                           name="image">
                    @error('image')
                    <div style="color: red">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <label for="file" class="col-md-4 col-form-label">Add Extra/More Images</label>
                    <input type="file"
                           class="form-control-file"
                           id="img"
                           name="img[]" multiple>
                </div>

                <div class="row pt-4 mb-3">
                    <button class="btn btn-primary">Update Post</button>
                </div>

            </div>
        </div>
    </form>
@endsection
