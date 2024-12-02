@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container-fluid">
            <a class="btn btn-primary" href="{{ route('users.create') }}">Add New User</a>
            <main>
                <table class="table table-striped table-hover border-primary mt-3">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
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
                {{ $users->links() }}
            </main>
        </div>
    </div>
@endsection

