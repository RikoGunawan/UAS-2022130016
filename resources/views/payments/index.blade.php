@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h3 class="m-0 font-weight-bold">Payments</h3>
                <a href="{{ route('payments.create') }}" class="btn btn-primary">Add New Payment</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>User</th>
                                <th>Session</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $payment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ $payment->session->id }}</td>
                                    <td>Rp {{ number_format($payment->amount, 2, ',', '.') }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $payment->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline">
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

