<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Booking;
use App\Models\BookingPassenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    // Show booking form with available packages
    public function create()
    {
        $packages = Package::all();
        return view('bookings.create', compact('packages'));
    }

public function showPaymentForm($id)
{
    $booking = Booking::findOrFail($id);
    return view('booking.payment', compact('booking'));
}

public function processDummyPayment(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    // Mark as Paid (this is dummy, no real payment processing)
    $booking->payment_status = 'Paid';
    $booking->save();

    return redirect()->route('bookings.index')->with('success', 'Payment marked as completed!');
}






public function downloadReceipt($id)
{
    $booking = Booking::with('package')->findOrFail($id);

    // Generate QR code content
    $qrData = "Booking ID: {$booking->id}\nPackage: {$booking->package->name}\nTotal: Rs. {$booking->total_cost}";
    $qrCode = base64_encode(QrCode::format('png')->size(150)->generate($qrData));

    // Load PDF view and pass booking and QR code
    $pdf = Pdf::loadView('booking.receipt', [
        'booking' => $booking,
        'qrCode' => $qrCode,
    ]);

    return $pdf->download('booking_receipt_'.$booking->id.'.pdf');
    
}




    // Store new booking with passenger details
    public function store(Request $request)
{
    $request->validate([
        'package_id' => 'required|exists:packages,id',
        'passengers.*.name' => 'required|string|max:255',
        'passengers.*.age' => 'required|integer|min:0',
    ]);

    $package = Package::findOrFail($request->package_id);
    $passengerCount = count($request->passengers);
    $totalCost = $package->price * $passengerCount;

    $booking = Booking::create([
        'user_id' => auth()->id(),
        'package_id' => $package->id,
        'total_cost' => $totalCost,
        'status' => 'Pending',
    ]);

    // ✅ Save each passenger
    foreach ($request->passengers as $passenger) {
        $booking->passengers()->create([
            'name' => $passenger['name'],
            'age' => $passenger['age'],
            'gender' => $passenger['gender'],
        ]);
    }

   return redirect()->route('bookings.confirmation', $booking->id)
                 ->with('success', 'Booking submitted successfully!');

}

    
public function confirmation($id)
{
    $booking = Booking::with('package')->findOrFail($id);
    return view('booking.confirmation', compact('booking'));
    
        return redirect()->route('bookings.create')->with('success', 'Booking submitted!');
}
} 
