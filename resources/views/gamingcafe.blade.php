@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($computers as $computer)
                <div class="col">
                    <div class="card photo-frame" style="width: 18rem;">
                        <a href="{{ route('computers.show', $computer) }}">
                            <img src="
                                @if ($computer->tier == 'tier_1')
                                    {{ asset('images/pc_tier1.png') }}
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

                        <div class="card-body d-flex flex-column">
                            <div class="content d-flex flex-column flex-grow-1">
                                <!-- Kolom Kiri -->
                                <h8 class="card-text">{{ Str::padLeft($computer->id, 5, '#000') }}</h8>
                                <h5 class="card-title">
                                    <a href="{{ route('computers.show', $computer) }}"
                                        style="text-decoration: none; color: inherit; font-weight: bold;">
                                        {{ $computer->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="badge rounded-pill bg-info">Tier: {{ $computer->tier }}</span>
                                    <span class="badge rounded-pill bg-{{ $computer->status == 'available' ? 'success' : 'danger' }}">
                                        {{ ucfirst($computer->status) }}
                                    </span>
                                </div>
                            </div>
                            <!-- Kolom Kanan: Tombol di Pojok Bawah -->
                            <div class="button-container">
                                <a href="{{ route('sessions.create', ['computer_id' => $computer->id]) }}" class="btn btn-primary">
                                    Book Now
                                </a>

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

