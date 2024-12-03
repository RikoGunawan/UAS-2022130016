@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $game->title }}</h1>
            <p>
                {{ $game->category }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $game->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Size (MB)</b></td>
                        <td>{{ $game->size_mb }}</td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td>{{ $game->status }}</td>
                    </tr>
                    <tr>
                        <td><b>Image</b></td>
                        <td><img src="{{ Storage::url($game->image_path) }}" class="img-fluid" width="200" /></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection

