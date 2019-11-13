@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles Dashboard
                    <div class="float-right">
                    <a href="{{ route('articles:create')}}" class="btn btn-primary">New</a>
                    </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id}}</td>
                                    <td>{{ $article->title}}</td>
                                    <td>{{ $article->created_at}}</td>
                                    <td>
                                    <a href="{{ route('articles:edit', $article)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('articles:delete', $article)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection