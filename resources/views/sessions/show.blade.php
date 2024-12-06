@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Session {{ $session->id }}</h1>

    <table class="table">
        <tr>
            <th>User</th>
            <td>{{ $session->user->name }}</td>
        </tr>
        <tr>
            <th>Computer</th>
            <td>{{ $session->computer->name }}</td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td>{{ \Carbon\Carbon::parse($session->start_time)->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>End Time</th>
            <td>{{ $session->end_time ? \Carbon\Carbon::parse($session->end_time)->format('d-m-Y H:i') : '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $session->status }}</td>
        </tr>
    </table>
</div>
@endsection
