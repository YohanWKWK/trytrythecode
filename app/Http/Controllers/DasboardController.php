<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DasboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();
        // dd($user);
        $view_data = [
            'user' => $user
        ];
        return view('homes.index', $view_data);
    }
}
