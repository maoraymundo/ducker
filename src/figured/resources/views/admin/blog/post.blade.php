@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Add Content</h1>
        </div>
        <div class="col-md-12">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-md-1 col-form-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

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
                        <!-- <input id="content" type="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required>

                        @if ($errors->has('content'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif -->
                        <richeditor></richeditor>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-1 col-form-label">Status</label>

                    <div class="col-md-6">
                        <input id="status" type="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
                        <select name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                            <option></option>
                        </select>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('bottom_js')

@endsection