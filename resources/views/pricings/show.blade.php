@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $pricing->plan_name }}</h1>
            <p>
                Harga: Rp {{ number_format($pricing->price, 2, ',', '.') }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>ID</b></td>
                        <td>{{ $pricing->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Plan Name</b></td>
                        <td>{{ $pricing->plan_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Price</b></td>
                        <td>Rp {{ number_format($pricing->price, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><b>Duration (minutes)</b></td>
                        <td>{{ $pricing->duration_minutes }}</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection

