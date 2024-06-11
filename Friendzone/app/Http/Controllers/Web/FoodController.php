<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Pengumuman;


class FoodController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::paginate(9);
        return view('pages.web.daftarmenu.menu', compact('product'));
    }

    public function detail($id)
{
    $product = Product::findOrFail($id);
    $ratings = Rating::where('product_id', $id)->get();
    $averageRating = $ratings->avg('rating'); // Calculating average rating from the collection

    // Definisi $pengumumans
    $pengumumans = Pengumuman::all(); // Ubah sesuai kebutuhan Anda

    return view('pages.web.daftarmenu.menudetail', compact('product', 'averageRating', 'ratings', 'pengumumans'));
}

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $keyword = $request->search;
            $product = Product::where('title', 'like', '%' . $keyword . '%')->paginate(8);

            if ($product->isEmpty()) {
                // Produk tidak ditemukan, tampilkan pesan
                $message = 'Produk dengan kata kunci "' . $keyword . '" tidak tersedia.';
                return view('pages.web.daftarmenu.menu', compact('product', 'message'));
            }

            return view('pages.web.daftarmenu.menu', compact('product'));
        } else {
            $product = Product::all();
            return view('pages.web.daftarmenu.menu', compact('product'));
        }
    }
    public function filterMenu(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter == 'makanan') {
            $product = Product::where('category', 'makanan')->paginate(9);
        } elseif ($filter == 'minuman') {
            $product = Product::where('category', 'minuman')->paginate(9);
        } else {
            $product = Product::paginate(9);
        }

        return view('pages.web.daftarmenu.menu', compact('product'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $ratings = Rating::where('product_id', $id)->get();
        $averageRating = $ratings->avg('rating');

        return view('pages.web.daftarmenu.menudetail', compact('product', 'averageRating', 'ratings'));
    }
}
