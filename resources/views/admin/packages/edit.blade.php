@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Package</h2>

    <form action="{{ route('admin.packages.update', $package) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $package->name }}" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Type</label>
            <input type="text" name="type" value="{{ $package->type }}" class="form-control" required>
        </div>

        <div class="mb-3">
    <label for="start_date" class="form-label">Start Date</label>
    <input type="date" class="form-control" name="start_date" id="start_date" required>
</div>

<div class="mb-3">
    <label for="end_date" class="form-label">End Date</label>
    <input type="date" class="form-control" name="end_date" id="end_date" required>
</div>

<div class="mb-3">
    <label for="hotel_name" class="form-label">Hotel Name</label>
    <input type="text" class="form-control" name="hotel_name" id="hotel_name" required>
</div>

<div class="mb-3">
    <label for="duration" class="form-label">Duration (in days)</label>
    <input type="number" class="form-control" name="duration" id="duration" required>
</div>


        <div class="form-group mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $package->description }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label>Price (PKR)</label>
            <input type="number" step="0.01" name="price" value="{{ $package->price }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Replace Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
            @if ($package->image)
                <br>
                <img src="{{ asset('storage/' . $package->image) }}" width="100">
            @endif
        </div>

        <button class="btn btn-primary">Update Package</button>
    </form>
</div>
@endsection
