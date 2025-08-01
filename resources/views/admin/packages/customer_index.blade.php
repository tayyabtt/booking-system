@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Available Packages</h2>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary shadow-sm">Book a Package</a>
    </div>

    <!-- Packages Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($packages as $package)
            <div class="col">
                <div class="card h-100 shadow rounded-4 border-0">
                    <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top rounded-top-4" alt="Package Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">{{ $package->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($package->description, 100) }}</p>
                        <span class="badge bg-success fs-6">Rs. {{ number_format($package->price) }}</span>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-end">
                        <a href="{{ route('bookings.create') }}" class="btn btn-outline-primary btn-sm">Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                <h5>No packages available right now.</h5>
            </div>
        @endforelse
    </div>
</div>
@endsection
