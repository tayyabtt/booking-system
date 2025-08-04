<h2>New Booking Confirmed</h2>

<p><strong>User Name:</strong> {{ $booking->user->name }}</p>
<p><strong>User Email:</strong> {{ $booking->user->email }}</p>
<p><strong>Package:</strong> {{ $booking->package->title }}</p>
<p><strong>Booking ID:</strong> {{ $booking->id }}</p>
<p><strong>Total Cost:</strong> {{ $booking->total_cost }}</p>
<p><strong>Payment Status:</strong> {{ $booking->payment_status }}</p>
