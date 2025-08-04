@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Package</h2>

    <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Package Name -->
        <div class="form-group mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $package->name }}" class="form-control" required>
        </div>

        <!-- Package Type -->
        <div class="form-group mb-2">
            <label>Type</label>
            <input type="text" name="type" value="{{ $package->type }}" class="form-control" required>
        </div>

        <!-- Start Date -->
        <div class="form-group mb-2">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $package->start_date }}" required>
        </div>

        <!-- End Date -->
        <div class="form-group mb-2">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $package->end_date }}" required>
        </div>

        <!-- Hotel Name -->
        <div class="form-group mb-2">
            <label for="hotel_name">Hotel Name</label>
            <input type="text" name="hotel_name" id="hotel_name" class="form-control" value="{{ $package->hotel_name }}" required>
        </div>

        <!-- Duration -->
        <div class="form-group mb-2">
            <label for="duration">Duration (in days)</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ $package->duration }}" required>
        </div>

        <!-- Description -->
        <div class="form-group mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $package->description }}</textarea>
        </div>

        <!-- Price -->
        <div class="form-group mb-2">
            <label>Price (PKR)</label>
            <input type="number" step="0.01" name="price" value="{{ $package->price }}" class="form-control" required>
        </div>

        <!-- Image Upload -->
        <div class="form-group mb-3">
            <label>Replace Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
            @if ($package->image)
                <br>
                <img src="{{ asset('storage/' . $package->image) }}" width="100">
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>
</div>
@endsection
