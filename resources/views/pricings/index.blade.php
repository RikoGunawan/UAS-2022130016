@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold">Pricings</h3>
            <a href="{{ route('pricings.create') }}" class="btn btn-primary">Add New Pricing</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Duration Minutes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pricings as $index => $pricing)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pricing->plan_name }}</td>
                            <td>{{ $pricing->price }}</td>
                            <td>{{ $pricing->duration_minutes }}</td>
                            <td>
                                <a href="{{ route('pricings.edit', $pricing->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

