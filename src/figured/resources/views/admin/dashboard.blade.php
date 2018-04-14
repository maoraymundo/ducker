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
                        <th scope="col">BID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col"><code>1</code></th>
                        <td>
                            <p class="mb-0">the quick brown fox</p>
                            <p class="small font-italic">This is the description of the blog.</p>
                        </td>
                        <td>Active</td>
                        <td>date</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
