<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Receipt</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .receipt { text-align: center; }
        .qr { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Booking Receipt</h2>
        <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
        <p><strong>Package:</strong> {{ $booking->package->name }}</p>
        <p><strong>Total Cost:</strong> Rs. {{ number_format($booking->total_cost) }}</p>
        <p><strong>Status:</strong> {{ $booking->status }}</p>

        <div class="qr">
            <p><strong>QR Code:</strong></p>
            <img src="data:image/png;base64, {{ $qrCode }}" alt="QR Code">
        </div>
    </div>
</body>
</html>
