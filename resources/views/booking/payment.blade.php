@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dummy Payment for Booking #{{ $booking->id }}</h2>
    <p><strong>Package:</strong> {{ $booking->package->name }}</p>
    <p><strong>Total Cost:</strong> Rs. {{ number_format($booking->total_cost) }}</p>

    <form method="POST" action="{{ route('booking.pay.process', $booking->id) }}">
        @csrf

        <div class="mb-3">
            <label>Dummy Card Number</label>
            <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="mb-3">
            <label>Expiry</label>
            <input type="text" class="form-control" placeholder="12/26" required>
        </div>

        <div class="mb-3">
            <label>CVV</label>
            <input type="text" class="form-control" placeholder="123" required>
        </div>

        <button type="submit" class="btn btn-success">Confirm Dummy Payment</button>
    </form>
</div>
@endsection
