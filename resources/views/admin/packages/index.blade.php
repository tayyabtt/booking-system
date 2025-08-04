@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Packages</h2>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary mb-3">Add New Package</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Hotel</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration (Days)</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->type }}</td>
                    <td>Rs {{ number_format($package->price, 2) }}</td>
                    <td>{{ $package->hotel_name ?? 'N/A' }}</td>
                    <td>{{ $package->start_date ?? 'N/A' }}</td>
                    <td>{{ $package->end_date ?? 'N/A' }}</td>
                    <td>{{ $package->duration ?? 'N/A' }}</td>
                    <td>
                        @if ($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
    <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-warning">Edit</a>

    <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <form action="{{ route('admin.packages.sendEmail', $package) }}" method="POST" style="display:inline-block;">
        @csrf
        <button class="btn btn-sm btn-primary">Send Email</button>
    </form>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
