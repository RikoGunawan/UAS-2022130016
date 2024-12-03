@extends('layouts.app')

@section('content')

<h1 class="mb-5">Edit Game</h1>

<form method="POST" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $game->title) }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $game->category) }}" required>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="size_mb">Size (MB)</label>
        <input type="number" class="form-control @error('size_mb') is-invalid @enderror" id="size_mb" name="size_mb" value="{{ old('size_mb', $game->size_mb) }}" required>
        @error('size_mb')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image_path">Image</label>
        <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
        @error('image_path')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if ($game->image_path)
            <img src="{{ asset('storage/' . $game->image_path) }}" alt="{{ $game->title }}" class="img-thumbnail mt-2" width="100">
        @endif
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="active" {{ old('status', $game->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $game->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Game</button>
</form>

@endsection

