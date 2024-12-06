@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Create Game</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">

                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">

                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">

                                    <input id="category" type="text"
                                        class="form-control @error('category') is-invalid @enderror" name="category"
                                        value="{{ old('category') }}" required autocomplete="category">

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">

                                <label for="size_mb" class="col-md-4 col-form-label text-md-right">Size (MB)</label>

                                <div class="col-md-6">

                                    <input id="size_mb" type="number"
                                        class="form-control @error('size_mb') is-invalid @enderror" name="size_mb"
                                        value="{{ old('size_mb') }}" required autocomplete="size_mb">

                                    @error('size_mb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">

                                <label for="image_path" class="col-md-4 col-form-label text-md-right">Image Path</label>

                                <div class="col-md-6">

                                    <input id="image_path" type="file"
                                        class="form-control @error('image_path') is-invalid @enderror" name="image_path"
                                        value="{{ old('image_path') }}">

                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">

                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                                <div class="col-md-6">

                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-0">

                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
