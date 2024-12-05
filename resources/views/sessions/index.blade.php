@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold">Sessions</h3>
            <a href="{{ route('sessions.create') }}" class="btn btn-primary">Add New Session</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Computer</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $index => $session)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $session->user->name }}</td>
                                <td>{{ $session->computer->name }}</td>
                                <td>{{ $session->start_time->format('d-m-Y H:i') }}</td>
                                <td>{{ $session->end_time ? $session->end_time->format('d-m-Y H:i') : '-' }}</td>
                                <td>{{ $session->status }}</td>
                                <td>
                                    <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" class="d-inline">
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

