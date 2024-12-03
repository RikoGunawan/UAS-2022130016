@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Payment</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $payment->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="session_id" class="form-label">Session</label>
                <select class="form-control @error('session_id') is-invalid @enderror" id="session_id" name="session_id">
                    <option value="">Select Session</option>
                    @foreach ($sessions as $session)
                        <option value="{{ $session->id }}" {{ old('session_id', $payment->session_id) == $session->id ? 'selected' : '' }}>{{ $session->id }}</option>
                    @endforeach
                </select>
                @error('session_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $payment->amount) }}">
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status', $payment->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ old('status', $payment->status) == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
