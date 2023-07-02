<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DasboardController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->select()
            ->get();
        return view('homes.index');
    }
}
