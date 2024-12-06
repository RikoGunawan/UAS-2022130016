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
                <label for="session_id" class="form-label">Session</label>
                <select class="form-control @error('session_id') is-invalid @enderror" id="session_id" name="session_id">
                    <option value="">Select Session</option>
                    @foreach ($sessions as $session)
                        <option value="{{ $session->id }}" {{ old('session_id') == $session->id ? 'selected' : '' }}>
                            {{ $session->computer->name }}
                            ({{ \Carbon\Carbon::parse($session->start_time)->format('d-m-Y H:i') }} -
                            {{ $session->end_time ? \Carbon\Carbon::parse($session->end_time)->format('d-m-Y H:i') : 'Ongoing' }})
                        </option>
                    @endforeach
                </select>
                @error('session_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pricing_id">Plan:</label>
                <select name="pricing_id" class="form-control @error('pricing_id') is-invalid @enderror">
                    <option value="">Select Plan</option>
                    @foreach ($pricings as $pricing)
                        <option value="{{ $pricing->id }}" {{ old('pricing_id') == $pricing->id ? 'selected' : '' }}>
                            {{ $pricing->plan_name }} - Rp {{ number_format($pricing->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('pricing_id')
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


            <p class="text-white">
                <small>
                    The total amount will be calculated automatically based on the session duration and the selected plan.
                </small>
            </p>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
