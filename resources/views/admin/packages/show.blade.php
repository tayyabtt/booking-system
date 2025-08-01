@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Package Details</h2>

    <div class="card">
        <div class="card-header">
            <h4>{{ $package->title }}</h4>
        </div>
        <div class="card-body">
            @if($package->image)
                <img src="{{ asset('storage/' . $package->image) }}" alt="Package Image" class="img-fluid mb-3" style="max-height: 300px;">
            @endif

            <p><strong>Description:</strong> {{ $package->description }}</p>
            <p><strong>Type:</strong> {{ ucfirst($package->type) }}</p>
            <p><strong>Duration:</strong> {{ $package->duration }} days</p>
            <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($package->start_date)->format('d M Y') }}</p>
            <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($package->end_date)->format('d M Y') }}</p>
            <p><strong>Hotel:</strong> {{ $package->hotel_name }}</p>
            <p><strong>Transportation:</strong> {{ $package->transportation_included ? 'Included' : 'Not Included' }}</p>
            <p><strong>Price per Person:</strong> Rs. {{ number_format($package->price_per_person) }}</p>
            <p><strong>Available Seats:</strong> {{ $package->available_seats }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('packages.index') }}" class="btn btn-secondary">Back</a>
            <div>
                <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete this package?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
