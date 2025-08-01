@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Package</h2>

    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Hotel Name</label>
            <input type="text" name="hotel_name" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Duration (days)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-2">
            <label>Price (PKR)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button class="btn btn-success">Create Package</button>
    </form>
</div>
@endsection
