@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Available Rides</h2>

    @forelse($rides as $ride)
        <div class="card">
            <h3>{{ $ride->from }} → {{ $ride->to_block }}</h3>

            <p><strong>Driver:</strong> {{ $ride->user->name }}</p>
            <p><strong>Student ID:</strong> {{ $ride->user->id }}</p>

            <p>
                <strong>Time:</strong>
                {{ $ride->time->format('Y-m-d H:i') }}
            </p>

            <p><strong>Seats:</strong> {{ $ride->seats }}</p>
        </div>
    @empty
        <p>No approved rides available.</p>
    @endforelse
</div>
@endsection
