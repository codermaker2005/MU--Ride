@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin – Ride Approval</h2>

    <table class="card" style="width:100%">
        <thead style="background:#111;color:#f5c518">
            <tr>
                <th>Ride ID</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>From</th>
                <th>Block</th>
                <th>Time</th>
                <th>Seats</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach($rides as $ride)
        <tr>
            <td>{{ $ride->id }}</td>
            <td>{{ $ride->user->id }}</td>
            <td>{{ $ride->user->name }}</td>
            <td>{{ $ride->from }}</td>
            <td>{{ $ride->to_block }}</td>
            <td>{{ $ride->time->format('Y-m-d H:i') }}</td>
            <td>{{ $ride->seats }}</td>
            <td>{{ ucfirst($ride->status) }}</td>
            <td>
                @if($ride->status === 'pending')
                    <form method="POST" action="{{ route('admin.rides.approve', $ride) }}">
                        @csrf
                        <button>Approve</button>
                    </form>

                    <form method="POST" action="{{ route('admin.rides.reject', $ride) }}">
                        @csrf
                        <button>Reject</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
