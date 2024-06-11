<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Meja;


class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::paginate(6);
        $meja = Meja::paginate(3);
        return view('pages.web.dashboard.home', compact('product', 'meja'));
    }

    public function shop()
    {

        return view('pages.web.daftarmenu.menu');
    }
}
