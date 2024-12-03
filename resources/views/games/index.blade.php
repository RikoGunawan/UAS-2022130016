@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Games</h1>
        <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Games List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Size (MB)</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $index => $game)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $game->title }}</td>
                                <td>{{ $game->category }}</td>
                                <td>{{ $game->size_mb }}</td>
                                <td>{{ $game->status }}</td>
                                <td>
                                    @if ($game->image_path)
                                        <img src="{{ asset('storage/' . $game->image_path) }}" alt="{{ $game->title }}" class="img-thumbnail" width="100">
                                    @else
                                        <p class="text-center">No Image</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection