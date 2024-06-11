<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $bookings = Booking::where('user_id', Auth::user()->id)->get();

        return view('pages.web.history.index', compact('orders', 'bookings'));
    }
}
