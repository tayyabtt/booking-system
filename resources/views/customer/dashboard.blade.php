@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center fw-bold">Explore Our Travel Packages</h2>

    <div class="row">
        @forelse ($packages as $package)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100 border-0 rounded-4">
                    @if ($package->image)
                        <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top rounded-top-4" alt="{{ $package->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top rounded-top-4" alt="No image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-bold">{{ $package->name }}</h5>
                        <p class="mb-1"><strong>Type:</strong> {{ ucfirst($package->type) }}</p>
                        <p class="mb-2"><strong>Price:</strong> <span class="text-success">Rs {{ number_format($package->price, 2) }}</span></p>
                        <p class="mb-1"><strong>Duration:</strong> {{ $package->duration }} days</p>
<p class="mb-1"><strong>Hotel:</strong> {{ $package->hotel_name }}</p>
<p class="mb-1"><strong>Start Date:</strong> {{ $package->start_date }}</p>
<p class="mb-1"><strong>End Date:</strong> {{ $package->end_date }}</p>

                        <a href="{{ route('bookings.create') }}" class="mt-auto btn btn-primary rounded-pill">Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No packages available right now. Please check back later!</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
