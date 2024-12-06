<style>
    .float-right {
        float: right;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="d-flex justify-content-between">
                <h1>{{ $computer->name }}</h1>
                <img src="@if ($computer->tier == 'tier_1')
                        {{ asset('images/pc_tier1.png') }}
                    @elseif($computer->tier == 'tier_2')
                        {{ asset('images/pc_tier2.jpg') }}
                    @elseif($computer->tier == 'tier_3')
                        {{ asset('images/pc_tier3.jpg') }}
                    @else
                        {{ Storage::url($computer->image_path) }}
                    @endif"
                    class="photo-frame-detail-img float-right">
            </div>
            <p>
                {{ $computer->specifications }}
            </p>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-nowrap">ID</th>
                            <td class="align-middle">{{ $computer->id }}</td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Location</th>
                            <td class="align-middle">{{ $computer->location }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Tier</th>
                            <td class="align-middle">{{ $computer->tier }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-nowrap">Status</th>
                            <td class="align-middle">{{ $computer->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection


