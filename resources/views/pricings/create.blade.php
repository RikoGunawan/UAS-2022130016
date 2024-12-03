@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Pricing Plan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pricings.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="plan_name" class="form-label">Plan Name</label>
                <input type="text" class="form-control @error('plan_name') is-invalid @enderror" id="plan_name" name="plan_name" value="{{ old('plan_name') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label for="duration_minutes" class="form-label">Duration (Minutes)</label>
                <input type="text" class="form-control @error('duration_minutes') is-invalid @enderror" id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

