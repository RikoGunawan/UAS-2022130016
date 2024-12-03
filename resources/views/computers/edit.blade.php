@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('computers.update', $computer) }}" method="POST" enctype="multipart/form-data">
                <div class='row'>
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-5">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                                value="{{ old('name', $computer->name) }}">
                        </div>
                        <div class="col-7">
                            {{-- grid kosong --}}
                        </div>

                        <div class="col-8">
                            <label class="form-label" for="location">Location</label>
                            <input class="form-control @error('location') is-invalid @enderror" type="text" name="location"
                                value="{{ old('location', $computer->location) }}">
                        </div>
                        <div class="col-4">
                            {{-- grid kosong --}}
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="specifications">Specifications</label>
                            <textarea class="form-control @error('specifications') is-invalid @enderror" type="text" name="specifications" rows="3">{{ old('specifications', $computer->specifications) }}</textarea>
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="tier">Tier</label>
                            <select class="form-control @error('tier') is-invalid @enderror" name="tier"
                                id="tier">
                                <option value="">Select a tier</option>
                                @foreach (['tier_1', 'tier_2', 'tier_3'] as $tier)
                                    <option value="{{ $tier }}"
                                        {{ old('tier', $computer->tier) == $tier ? 'selected' : '' }}>
                                        {{ ucfirst($tier) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="">Select a status</option>
                                @foreach (['available', 'in_use', 'maintenance'] as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', $computer->status) == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            {{-- grid kosong --}}
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="photo">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo">
                        </div>

                        <img src="{{ Storage::url($computer->image_path) }}" class="img-fluid mt-3" width="200" />
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
        </main>
    </div>
@endsection

