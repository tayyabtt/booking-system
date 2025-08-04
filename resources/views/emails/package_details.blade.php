<h2>Package Details</h2>
<p><strong>Name:</strong> {{ $package->name }}</p>
<p><strong>Type:</strong> {{ $package->type }}</p>
<p><strong>Price:</strong> Rs {{ number_format($package->price, 2) }}</p>
<p><strong>Hotel:</strong> {{ $package->hotel_name ?? 'N/A' }}</p>
<p><strong>Start Date:</strong> {{ $package->start_date ?? 'N/A' }}</p>
<p><strong>End Date:</strong> {{ $package->end_date ?? 'N/A' }}</p>
<p><strong>Duration:</strong> {{ $package->duration ?? 'N/A' }} days</p>
@if($package->image)
    <p><img src="{{ asset('storage/' . $package->image) }}" width="200"></p>
@endif
