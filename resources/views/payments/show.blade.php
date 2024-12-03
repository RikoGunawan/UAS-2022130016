@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>Payment {{ $payment->id }}</h1>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>User</b></td>
                        <td>{{ $payment->user->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Session</b></td>
                        <td>{{ $payment->session->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Amount</b></td>
                        <td>Rp {{ number_format($payment->amount, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td>{{ $payment->status }}</td>
                    </tr>
                    <tr>
                        <td><b>Created At</b></td>
                        <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><b>Updated At</b></td>
                        <td>{{ $payment->updated_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection
