@extends('layouts.app')

@section('content')

    <form name="frm" method="post" action="/upload/{{ $postId->id }}" enctype="multipart/form-data">
        {{ @csrf_field() }}

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Update Post</h1>
                </div>

                <div class="form-group row">
                    <label for="file" class="col-md-4 col-form-label">Add Images</label>
                    <input id="img"
                           type="file"
                           name="img[]" multiple
                           class="form-control-file">
                    <input type="submit">
                </div>
                <div style="color: red">
                    @if(Session::has('msg'))
                        {{ Session::get('msg') }}
                    @endif
                </div>

            </div>
        </div>
    </form>
@endsection
