<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;

class EmailController extends Controller
{
    public function sendConfirmationEmail()
    {
        $user = Auth::user();

        // Load latest booking with both 'package' and 'user' relationships
        $booking = Booking::with(['package', 'user'])
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'No booking found.');
        }

        // Send confirmation email to the user's email address
        Mail::to($user->email)->send(new BookingConfirmationMail($booking));

        return redirect()->back()->with('message', 'Confirmation email sent to your email address.');
    }
}
