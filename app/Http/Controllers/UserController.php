<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(string $id)
    {
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
