@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>
                            <a href="{{ route('get.admin.blog.edit', ['id' => $blog->_id]) }}"><p class="mb-0">{{ $blog->title }}</p></a>
                            <p class="small font-italic">{{ $blog->content }}</p>
                        </td>
                        <td>{{ $statusOptions[$blog->status] }}</td>
                        <td>{{$blog->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
