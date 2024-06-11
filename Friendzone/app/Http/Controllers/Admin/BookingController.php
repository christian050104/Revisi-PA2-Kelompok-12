<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Meja;
use Illuminate\Http\Request;
use PDF;

class BookingController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $booking = Booking::with('user')->paginate(3);
            return view('pages.admin.history.list', compact('booking'));
        }
        $booking = Booking::all();

        return view('pages.admin.history.main', compact('booking'));
    }

    public function exportPDF()
    {
        $booking = Booking::all(); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

        $pdf = PDF::loadView('pages.admin.history.pdf', compact('booking'));

        return $pdf->download('history_meja.pdf');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di hapus',
            'redirect' => route('admin.history.index')
        ]);;
    }

    public function accept($id)
    {
        $booking = Booking::find($id);
        $meja = Meja::findOrFail($booking->meja_id);

        if ($meja->status == 'available') {
            $booking->status = 'Accept';
            $booking->pemberitahuan = 'Reservation Meja No ' . $booking->meja_id . ' Anda Diterima! <br>
            Kami menantikan kedatangan Anda di tempat kami. <br>
            Terima kasih atas reservasi Anda.';
            $booking->update();
            $meja->status = 'unavailable';
            $meja->update();
            return response()->json([
                'status' => 'success',
                'message' => 'Reservation yang dilakukan oleh User berhasil di terima',
                'redirect' => route('admin.history.index')
            ]);;
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Mohon maaf Meja tidak tersedia dikarenakan sedang ada User yang membooking meja.',
            'redirect' => route('admin.history.index')
        ]);;
    }

    public function reject($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->pemberitahuan = 'Maaf, reservasi meja nomor ' . $booking->meja_id . ' Anda tidak dapat kami terima. <br>
        Anda terlambat dari waktu yang telah ditentukan.';

        $booking->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di tolak',
            'redirect' => route('admin.history.index')
        ]);;
    }

    public function finish($id)
    {
        $booking = Booking::find($id);
        $booking->pemberitahuan = 'Reservation Meja No ' . $booking->meja_id . 'Anda Telah Selesai! <br>
        Terimakasih Anda telah datang di Friendzone Cafe.';
        $booking->status = 'Finished';
        $booking->update();

        $meja = Meja::find($booking->meja_id);
        $meja->status = 'available';
        $meja->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di diselesaikan',
            'redirect' => route('admin.history.index')
        ]);;
    }
}
