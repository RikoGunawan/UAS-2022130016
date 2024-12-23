@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Session</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sessions.store') }}" method="POST">
            @csrf


            <div class="col-12">
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="computer_id" class="form-label">Computer</label>
                    @if ($selectedComputer)
                        <input type="text" class="form-control"
                            value="{{ $selectedComputer->name }} ({{ $selectedComputer->tier }})" disabled>
                        <input type="hidden" name="computer_id" value="{{ $selectedComputer->id }}">
                    @else
                        <select class="form-control @error('computer_id') is-invalid @enderror" id="computer_id"
                            name="computer_id">
                            <option value="">Select Computer</option>
                            @foreach ($computers as $computerOption)
                                <option value="{{ $computerOption->id }}"
                                    {{ old('computer_id') == $computerOption->id ? 'selected' : '' }}>
                                    {{ $computerOption->name }} ({{ $computerOption->tier }})
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror"
                            id="start_time" name="start_time" value="{{ old('start_time') }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="end_time" class="form-label">End Time</label>
                        <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror"
                            id="end_time" name="end_time" value="{{ old('end_time') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
