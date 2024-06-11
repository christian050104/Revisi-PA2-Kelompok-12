<?php

namespace App\Http\Controllers\Web;

use App\Models\Meja;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meja = Meja::all();

        return view('pages.web.booking.create', compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meja = Meja::where('status', 'available')->get();

        return view('pages.web.booking.create', compact('meja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'meja_id' => 'required',
            'book_date' => 'required|date',
            'description' => 'required|string',
        ]);

        // Check if the user already has a pending booking for the same table
        $existingBooking = Booking::where('user_id', Auth::user()->id)
            ->where('meja_id', $validatedData['meja_id'])
            ->where('status', 'Pending')
            ->first();

        if ($existingBooking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah memiliki booking pending untuk meja ini.'
            ]);
        }

        // Create a new booking object and set its properties
        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->meja_id = $validatedData['meja_id'];
        $booking->book_date = $validatedData['book_date'];
        $booking->description = $validatedData['description'];
        $booking->status = 'Pending'; // Set the status to pending
        $booking->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking Meja Telah Berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('pages.web.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateBookingRequest $request, Booking $booking)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

