@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Session</h1>
    </div>

    <form action="{{ route('sessions.update', $session->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $session->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="computer_id">Computer</label>
            <select name="computer_id" id="computer_id" class="form-control @error('computer_id') is-invalid @enderror">
                <option value="">-- Select Computer --</option>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ old('computer_id', $session->computer_id) == $computer->id ? 'selected' : '' }}>{{ $computer->name }}</option>
                @endforeach
            </select>
            @error('computer_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time', $session->start_time->format('Y-m-d\TH:i')) }}">
            @error('start_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time', $session->end_time ? $session->end_time->format('Y-m-d\TH:i') : '') }}">
            @error('end_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">-- Select Status --</option>
                <option value="ongoing" {{ old('status', $session->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ old('status', $session->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ old('status', $session->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
