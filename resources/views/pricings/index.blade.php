@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">pricings</div>

                <div class="card-body">
                    <a href="{{ route('pricings.create') }}" class="btn btn-primary mb-2">Add New Pricing</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Duration Minutes</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($pricings as $pricing)
                        <tr>
                            <td>{{ $pricing->plan_name }}</td>
                            <td>{{ $pricing->price }}</td>
                            <td>{{ $pricing->duration_minutes }}</td>
                            <td>
                                <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('pricings.show', $pricing->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('pricings.edit', $pricing->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

