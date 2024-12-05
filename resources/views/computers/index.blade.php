@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold">Computers</h3>
                <a href="{{ route('computers.create') }}" class="btn btn-primary">Add New Computer</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
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
                                    <td style="width: 15%;">
                                        @if ($computer->tier == 'tier_1')
                                            <img src="{{ asset('images/pc_tier1.png') }}" class="img-thumbnail">
                                        @elseif($computer->tier == 'tier_2')
                                            <img src="{{ asset('images/pc_tier2.jpg') }}" class="img-thumbnail">
                                        @elseif($computer->tier == 'tier_3')
                                            <img src="{{ asset('images/pc_tier3.jpg') }}" class="img-thumbnail">
                                        @else
                                            <img src="{{ Storage::url($computer->image_path) }}" class="img-thumbnail">
                                        @endif
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
                                        <a href="{{ route('computers.edit', $computer) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('computers.destroy', $computer) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
@endsection
