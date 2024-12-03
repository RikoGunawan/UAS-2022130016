@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payments</h1>

        <table class="table table-striped table-hover border-primary mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Session</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->session->id }}</td>
                        <td>Rp {{ number_format($payment->amount, 2, ',', '.') }}</td>
                        <td>{{ $payment->status }}</td>
                        <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $payment->updated_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
