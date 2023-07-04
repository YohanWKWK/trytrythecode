<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function view(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();
        $products = product::where('user_id', $id)->get();

        $view_data = [
            'user' => $user,
            'products' => $products
        ];

        // dd($view_data);
        return view('profile.index', $view_data);
    }
}
