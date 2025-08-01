@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Booking</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <!-- Select Package -->
        <div class="mb-3">
            <label for="package_id" class="form-label">Select Package</label>
            <select name="package_id" class="form-select" required>
                <option value="">Choose Package</option>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">
                        {{ $package->type }} - Rs {{ $package->price }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Passengers -->
        <h4>Passenger Info</h4>
        <div id="passenger-list">
            <div class="passenger mb-3 border p-3">
                <input type="text" name="passengers[0][name]" class="form-control mb-2" placeholder="Name" required>
                <input type="text" name="passengers[0][cnic_passport]" class="form-control mb-2" placeholder="CNIC or Passport" required>
                <input type="number" name="passengers[0][age]" class="form-control mb-2" placeholder="Age" required>
                <select name="passengers[0][gender]" class="form-control" required>
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <button type="button" id="add-passenger" class="btn btn-secondary mb-3">+ Add Passenger</button>

        <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>
</div>

<script>
let passengerIndex = 1;
document.getElementById('add-passenger').addEventListener('click', function () {
    const container = document.getElementById('passenger-list');
    const newBlock = document.createElement('div');
    newBlock.className = 'passenger mb-3 border p-3';
    newBlock.innerHTML = `
        <input type="text" name="passengers[${passengerIndex}][name]" class="form-control mb-2" placeholder="Name" required>
        <input type="text" name="passengers[${passengerIndex}][cnic_passport]" class="form-control mb-2" placeholder="CNIC or Passport" required>
        <input type="number" name="passengers[${passengerIndex}][age]" class="form-control mb-2" placeholder="Age" required>
        <select name="passengers[${passengerIndex}][gender]" class="form-control" required>
            <option value="">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    `;
    container.appendChild(newBlock);
    passengerIndex++;
});
</script>
@endsection
