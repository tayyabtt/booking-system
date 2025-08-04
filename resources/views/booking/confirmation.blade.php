@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body text-center">
            <h2 class="text-success mb-4">🎉 Booking Confirmed!</h2>

            <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
            <p><strong>Package Name:</strong> {{ $booking->package->name }}</p>
            <p><strong>Total Cost:</strong> Rs. {{ number_format($booking->total_cost) }}</p>
            <p><strong>Status:</strong>
                @if($booking->status === 'Pending')
                    <span class="badge bg-warning text-dark">{{ $booking->status }}</span>
                @elseif($booking->status === 'Confirmed')
                    <span class="badge bg-success">{{ $booking->status }}</span>
                @else
                    <span class="badge bg-danger">{{ $booking->status }}</span>
                @endif

                @if(session('message'))
    <div class="alert alert-success mt-2">
        {{ session('message') }}
    </div>
@endif
            </p>

            {{-- Show Pay Now button only if payment is pending --}}
            @if($booking->payment_status == 'Pending')
                <a href="{{ route('booking.pay', $booking->id) }}" class="btn btn-warning mt-2"></a>
            @endif

            <a href="{{ route('booking.receipt', $booking->id) }}" class="btn btn-success mt-2">Download Receipt (PDF)</a>
            <a href="{{ route('packages.index') }}" class="btn btn-primary mt-3">Back to Packages</a>
            
<form action="{{ route('user.sendConfirmationEmail') }}" method="POST" style="display: inline-block;">
    @csrf
    <button type="submit" class="btn btn-primary">
        Send Confirmation Email
    </button>
</form>

        </div>
    </div>
</div>
@endsection
