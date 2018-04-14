@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Public Blogs</h1>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs) == 0)
                    <tr>
                        <td colspan="3">No public blogs available</td>
                    </tr>
                    @endif
                    @foreach($blogs as $blog)
                    <tr>
                        <td>
                            <a href="{{ route('get.blog', ['id' => $blog->_id]) }}"><p class="mb-0">{{ $blog->title }}</p></a>
                        </td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{{ $blog->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
