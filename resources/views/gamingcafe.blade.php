@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($computers as $computer)
                <div class="col-md-4 mb-4">
                    <div class="card photo-frame" style="width: 18rem;">
                        <a href="{{ route('computers.show', $computer) }}">
                            <img src="
                                @if ($computer->tier == 'tier_1')
                                    {{ asset('images/pc_tier1.jpeg') }}
                                @elseif($computer->tier == 'tier_2')
                                    {{ asset('images/pc_tier2.jpg') }}
                                @elseif($computer->tier == 'tier_3')
                                    {{ asset('images/pc_tier3.jpg') }}
                                @else
                                    {{ Storage::url($computer->image_path) }}
                                @endif"
                                class="card-img-top photo-frame-img"
                                alt="Computer Image"
                                onerror="this.onerror=null;this.src='https://placehold.co/200';">
                        </a>

                        <div class="card-body">
                            <h8 class="card-text">{{ Str::padLeft($computer->id, 5, '#000') }}</h8>
                            <h5 class="card-title">
                                <a href="{{ route('computers.show', $computer) }}"
                                    style="text-decoration: none; color: inherit; font-weight: bold;">
                                    {{ $computer->name }}
                                </a>
                            </h5>
                            <span class="badge rounded-pill bg-info">Tier: {{ $computer->tier }}</span>
                            <div class="mt-2">
                                <span class="badge rounded-pill bg-{{ $computer->status == 'available' ? 'success' : 'danger' }}">
                                    {{ ucfirst($computer->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $computers->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
