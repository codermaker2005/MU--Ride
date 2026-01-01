@extends('layouts.app')

@section('content')
<h2>Student Dashboard</h2>

{{-- CREATE RIDE --}}
<div class="card">
    <h3>Create Ride</h3>

    <form method="POST" action="{{ route('student.rides.store') }}">
        @csrf

        {{-- FROM: user input --}}
        <div class="field">
            <label>From</label>
            <input
                type="text"
                name="from"
                class="input"
                placeholder="Enter your city or area"
                required
            >
        </div>

        {{-- TO: Campus blocks only --}}
        <div class="field">
            <label>To (Campus)</label>
            <select name="to_block" class="input" required>
                <option value="" disabled selected>Select Campus Block</option>
                <option value="Block A">Block A</option>
                <option value="Block B">Block B</option>
                <option value="Block C">Block C</option>
            </select>
        </div>

        <div class="field">
            <label>Time</label>
            <input type="datetime-local" name="ride_time" class="input" required>
        </div>

        <div class="field">
            <label>Seats</label>
            <input type="number" min="1" name="available_seats" class="input" required>
        </div>

        <button class="btn-primary">Create Ride</button>
    </form>
</div>

{{-- MY RIDES --}}
<h3 style="margin-top:30px;">My Rides</h3>

@forelse($rides as $ride)
    <div class="card ride">
        <h3>{{ $ride->from }} → {{ $ride->to_block }}</h3>
        <p><strong>Time:</strong> {{ $ride->time }}</p>
        <p><strong>Seats:</strong> {{ $ride->seats }}</p>
        <p><strong>Status:</strong> {{ ucfirst($ride->status) }}</p>

        <form method="POST" action="{{ route('student.rides.delete', $ride->id) }}">
            @csrf
            @method('DELETE')
            <button class="action-btn destructive">Delete</button>
        </form>
    </div>
@empty
    <p>No rides created yet.</p>
@endforelse
@endsection
