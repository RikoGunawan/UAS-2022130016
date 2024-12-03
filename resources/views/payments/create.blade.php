@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Payment</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
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
                        <option value="{{ $session->id }}" {{ old('session_id') == $session->id ? 'selected' : '' }}>{{ $session->computer->name }} ({{ $session->start_time->format('d-m-Y H:i') }} - {{ $session->end_time->format('d-m-Y H:i') }})</option>
                    @endforeach
                </select>
                @error('session_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
