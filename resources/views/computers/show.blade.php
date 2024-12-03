@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $computer->name }}</h1>
            <p>
                {{ $computer->specifications }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $computer->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Location</b></td>
                        <td>{{ $computer->location }}</td>
                    </tr>
                    <tr>
                        <td><b>Tier</b></td>
                        <td>{{ $computer->tier }}</td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td>{{ $computer->status }}</td>
                    </tr>
                    <tr>
                        <td><b>Image</b></td>
                        <td><img src="{{ Storage::url($computer->image_path) }}" class="img-fluid" width="200" /></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection

