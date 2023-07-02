<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }

        $products = Product::get();

        // dd($products);

        $view_data = [
            'products' => $products
        ];

        return view('products.index', $view_data);
    }

    public function view(string $category)
    {
        $category = str_replace('-', ' ', $category);

        $products = DB::table('products')
            ->select()
            ->where('category', $category)
            ->get();

        $view_data = [
            'products' => $products
        ];

        return view('products.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => [
                'required',
                FILE::image()
                    ->types(['png', 'jpg', 'jpeg'])
                    ->min(1)
                    ->max(2 * 1024)
            ]
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $path = public_path('photos/products_photo/');
        $image->move($path, $image_name);

        $product_name = $request->input('product_name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
        // $image_path = $path . $image_name;
        $user_id = Auth::id();
        // dd($image_name);

        Product::create([
            'user_id' => $user_id,
            'product_name' => $product_name,
            'category' => $category,
            'description' => $description,
            'price' => $price,
            'image_path' => $image_name
        ]);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category, string $slug)
    {
        $category = str_replace('-', ' ', $category);
        $product = Product::where('category', $category)
            ->where('slug', $slug)
            ->first();
        $user = User::where('id', $product->user_id)->first();
        // dd($user);

        $view_data = [
            'product' => $product,
            'user' => $user
        ];
        return view('products.view', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::where('id', $id)->first();

        $view_data = [
            'product' => $product
        ];

        return view('products.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
