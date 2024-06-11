<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PDF;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $order = Order::with('user')->paginate(3);
            return view('pages.admin.historyorder.list', compact('order'));
        }

        return view('pages.admin.historyorder.main');
    }

    public function exportPDF()
    {
        // dd('all');
        $order = Order::all();

        $pdf = PDF::loadView('pages.admin.historyorder.pdf', compact('order'));

        return $pdf->download('history_produk.pdf');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User berhasil di hapus',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function accept($id)
    {
        $order = Order::find($id);
        $order->status = 'accepted';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Diterima! <br>
        Mohon Menunggu Pesanan Anda Segera Dibuat, <br> 
        dan Akan Segera Dikirimkan Ketempat Anda.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di terima',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function reject($id)
    {
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Ditolak! <br>
        Silahkan mengirimkan ulang bukti pembayaran yang benar.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di tolak',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }

    public function finish($id)
    {
        $order = Order::find($id);
        $order->status = 'finished';
        $order->pemberitahuan = 'Pesanan Anda dengan nomor ' . $order->code . ' Telah Selesai! <br>
        Dan Telah Diantar Ketempat Anda, <br>
        Selamat menikmati hidangan dari Friendzone Cafe.';
        $order->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Orderan Makanan/Minuman yang dilakukan oleh User di diselesaikan',
            'redirect' => route('admin.historyorder.index')
        ]);;
    }
    public function show(Order $order)
    {
        return view('pages.admin.historyorder.show', ['order' => $order]);
    }

    public function exportExcel()
    {
        $orders = Order::all();

        // Header untuk file Excel
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=orders.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Fungsi untuk menulis data ke file CSV
        $callback = function () use ($orders) {
            $file = fopen('php://output', 'w');

            // Header kolom
            fputcsv($file, ['ID', 'Nama Pengirim', 'No Telepon', 'Alamat', 'Kota', 'Payment', 'Status']);

            // Data pesanan
            foreach ($orders as $order) {
                // Menyimpan data pesanan dalam array
                $row = [
                    $order->id,
                    $order->user->namalengkap, // Mengambil nama pengirim dari relasi
                    $order->user->nomorhp, // Mengambil nomor telepon dari relasi
                    $order->user->address, // Mengambil alamat dari relasi
                    $order->user->city, // Mengambil kota dari relasi
                    $order->payment,
                    $order->status,
                    // Add more columns as needed
                ];

                // Menulis data pesanan ke dalam file CSV
                fputcsv($file, $row);
            }

            fclose($file);
        };

        // Mengembalikan response dengan file CSV yang akan diunduh
        return Response::stream($callback, 200, $headers);
    }
}
