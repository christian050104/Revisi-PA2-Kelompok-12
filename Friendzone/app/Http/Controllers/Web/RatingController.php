<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\OrderDetail;

class RatingController extends Controller
{
    public function __construct()
    {
        // Pastikan pengguna hanya bisa mengakses method store jika sudah membeli produk
        $this->middleware('check.purchase')->only('store');
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $userId = auth()->id();

        // Periksa apakah pengguna sudah memberikan rating sebelumnya untuk produk yang sama
        $existingRating = Rating::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingRating) {
            return redirect()->back()->with('error', 'Anda sudah memberikan rating untuk produk ini sebelumnya.');
        }

        // Simpan rating baru ke database
        Rating::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }
}
