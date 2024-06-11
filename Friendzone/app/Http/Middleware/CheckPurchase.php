<?php

// Middleware CheckPurchase
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class CheckPurchase
{
    public function handle(Request $request, Closure $next)
    {
        $productId = $request->route('productId');
        $userId = auth()->id();

        $hasPurchased = OrderDetail::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('product_id', $productId)->exists();

        if (!$hasPurchased) {
            // return redirect()->back()->with('error', 'Anda harus membeli produk ini terlebih dahulu untuk memberikan rating.');
        }

        return $next($request);
    }
}
