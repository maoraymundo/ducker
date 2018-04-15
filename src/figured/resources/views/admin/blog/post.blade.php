@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($blog->_id)
                <h1>Edit Content</h1>
            @else
                <h1>Add Content</h1>
            @endif
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12">
            <form method="POST" 
                @if ($blog->_id)
                action="{{ route('post.admin.blog.edit', ['id' => $blog->_id]) }}"
                @else 
                action="{{ route('post.admin.blog.add') }}"
                @endif
                >
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-1 col-form-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{$blog->title or old('title') }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-1 col-form-label">Content</label>

                    <div class="col-md-6">
                       <textarea name="mce_0" class="summernote" ></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-1 col-form-label">Status</label>

                    <div class="col-md-6">
                        <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                            @foreach($statusOptions as $key => $value)
                                @if($blog->_id && $key == $blog->status)
                                    <option value="{{ $key }}" selected> {{ $value }} </option>
                                @else
                                    <option value="{{ $key }}"> {{ $value }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('bottom_js')
$(document).ready(function() {
    $('.summernote').summernote({
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });
    var content = {!! json_encode($blog->content) !blog.};
    $('.summernote').summernote('code', content);
});
@endsection