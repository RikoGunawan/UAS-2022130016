@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <a class="btn btn-primary" href="{{ route('computers.create') }}">Add New Computer</a>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Computers Table</h4>
                    <p class="card-description">List of computers</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover border-primary mt-3">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Specifications</th>
                                    <th>Tier</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($computers as $computer)
                                    <tr>
                                        <td>{{ $computer->id }}</td>
                                        <td>
                                            <img src="{{ Storage::url($computer->image_path) }}" class="img-thumbnail w-50">
                                        </td>
                                        <td>
                                            <a href="{{ route('computers.show', $computer) }}">
                                                {{ $computer->name }}
                                            </a>
                                        </td>
                                        <td>{{ $computer->location }}</td>
                                        <td>{{ $computer->specifications }}</td>
                                        <td>{{ $computer->tier }}</td>
                                        <td>{{ $computer->status }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning" href="{{ route('computers.edit', $computer) }}">
                                                    Edit
                                                </a>
                                                <form action="{{ route('computers.destroy', $computer) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $computers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
