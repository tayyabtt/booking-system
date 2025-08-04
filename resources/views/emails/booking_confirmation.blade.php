<h2>Booking Confirmation</h2>

<p>Hello {{ $booking->user->name }},</p>

<p>Your booking has been confirmed. Here are the details:</p>

<ul>
    <li><strong>Package:</strong> {{ $booking->package->name }}</li>
    <li><strong>Type:</strong> {{ $booking->package->type }}</li>
    <li><strong>Hotel:</strong> {{ $booking->package->hotel_name }}</li>
    <li><strong>Duration:</strong> {{ $booking->package->duration }} days</li>
    <li><strong>Total Cost:</strong> PKR {{ $booking->total_cost }}</li>
    <li><strong>Status:</strong> {{ $booking->status }}</li>
</ul>

<p>Thank you for using our service!</p>
