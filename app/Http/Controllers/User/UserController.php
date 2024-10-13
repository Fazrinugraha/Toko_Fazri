<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Flashsale;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashsales = Flashsale::with('product')->get(); // Ambil data flash sale dan produk yang terkait

        return view('pages.user.index', compact('products', 'flashsales'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);
        $flashsale = Flashsale::where('product_id', $id)->first();
        return view('pages.user.detail', compact('product', 'flashsale'));
    }

    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        // Cek apakah produk memiliki flash sale
        $flashsale = Flashsale::where('product_id', $productId)->first();

        if ($flashsale) {
            // Cek apakah waktu diskon sudah habis
            if ($flashsale->end_time < now()) {
                $price = $product->price;
            } else {
                $discountPercentage = $flashsale->discount_price;
                $discountAmount = ($discountPercentage / 100) * $product->price;
                $price = $product->price - $discountAmount;
            }
        } else {
            // Jika produk tidak memiliki flash sale, gunakan harga produk normal
            $price = $product->price;
        }

        // Cek apakah user memiliki point yang cukup untuk membeli produk
        if ($user->point >= $price) {
            $totalPoints = $user->point - $price;

            $user->update([
                'point' => $totalPoints,
            ]);

            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }
    }
}