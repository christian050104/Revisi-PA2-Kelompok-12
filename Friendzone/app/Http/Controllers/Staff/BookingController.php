<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Meja;
use Illuminate\Http\Request;
use PDF;

class BookingController extends Controller
{
    
    public function index(Request $request){

        if($request->ajax()){
            $booking = Booking::with('user')->paginate(7);
            return view ('pages.staff.historymeja.list', compact('booking'));

        }
        $booking = Booking::all();

        return view('pages.staff.historymeja.main', compact('booking'));
    }

    public function exportPDF()
    {
        $booking = Booking::all(); // Ganti dengan model dan query yang sesuai dengan data history meja Anda

        $pdf = PDF::loadView('pages.staff.historymeja.pdf', compact('booking'));
        
        return $pdf->download('history_meja.pdf');
    }

    public function destroy($id){
        $booking = Booking::find($id);
        $booking->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di hapus',
            'redirect' => route('staff.history.index')
        ]);;
    }

    public function accept($id){
        $booking = Booking::find($id);
        $meja = Meja::findOrFail($booking->meja_id);

        if($meja->status == 'available'){
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
                'redirect' => route('staff.history.index')
            ]);;
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Mohon maaf Meja tidak tersedia dikarenakan sedang ada User yang membooking meja.',
            'redirect' => route('staff.history.index')
        ]);;

    }

    public function reject($id){
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->pemberitahuan = 'Maaf, reservasi meja nomor ' . $booking->meja_id . ' Anda tidak dapat kami terima. <br>
        Meja sudah di booking terlebih dahulu';

        $booking->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di tolak',
            'redirect' => route('staff.history.index')
        ]);;
    }

    public function finish($id){
        $booking = Booking::find($id);
        $booking->status = 'Finished';
        $booking->pemberitahuan = 'Reservasi Meja Nomor ' . $booking->meja_id . ' Anda telah selesai! <br>
        Terima kasih telah berkunjung ke Friendzone Coffee.';

        $booking->update();

        $meja = Meja::find($booking->meja_id);
        $meja->status = 'available';
        $meja->update();

        return response()->json([
            'status' => 'success',
            'message' => 'Reservation yang dilakukan oleh User berhasil di diselesaikan',
            'redirect' => route('staff.history.index')
        ]);;
    }
}