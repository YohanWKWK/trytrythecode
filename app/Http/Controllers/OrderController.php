<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    // Fungsi untuk menampilkan formulir pemesanan produk
    public function showOrderForm($productId)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();
        // Ambil data produk dari basis data berdasarkan ID
        $product = Product::findOrFail($productId);

        $view_data = [
            'user' => $user,
            'product' => $product
        ];

        // dd($view_data);

        // Anda juga dapat mengirimkan data lain yang diperlukan ke tampilan (misalnya: daftar kurir, metode pembayaran)

        return view('order.form', $view_data);
    }
}
