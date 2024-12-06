@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger text-white">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('computers.store') }}" method="POST" enctype="multipart/form-data">
                <div class='row text-white'>
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                                name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="col-7">
                            {{-- grid kosong --}}
                        </div>

                        <div class="col-8">
                            <label class="form-label" for="location">Location</label>
                            <input class="form-control @error('location') is-invalid @enderror" type="text"
                                name="location" rows="3" placeholder="">{{ old('location') }}</input>
                        </div>
                        <div class="col-4">
                            {{-- grid kosong --}}
                        </div>

                        <div class="col-5">
                            <label class="form-label" for="specifications">Specifications</label>
                            <textarea class="form-control @error('specifications') is-invalid @enderror" type="text" name="specifications"
                                rows="3" placeholder="">{{ old('specifications') }}</textarea>
                        </div>
                        <div class="col-7">
                            {{-- grid kosong --}}
                        </div>
                        <div class="col-5">
                            <label class="form-label" for="tier">Tier</label>
                            <select class="form-control @error('tier') is-invalid @enderror" name="tier" id="tier">
                                <option value="tier_1">Tier 1</option>
                                <option value="tier_2">Tier 2</option>
                                <option value="tier_3">Tier 3</option>
                            </select>
                        </div>
                        <div class="col-7">
                            {{-- grid kosong --}}
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="image_path">Image</label>
                            <input class="form-control @error('image_path') is-invalid @enderror" type="file"
                                name="image_path" value="{{ old('image_path') }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="available">Available</option>
                                <option value="in_use">In Use</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Add</button>
                    <button type="reset" class="btn btn-danger mt-4">Reset</button>

                </div>
        </main>
    </div>
@endsection


