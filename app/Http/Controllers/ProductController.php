<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\File;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();

        // dd($user);
        $products = Product::get();

        // dd($products);

        $view_data = [
            'user' => $user,
            'products' => $products
        ];

        return view('products.index', $view_data);
    }

    public function view(string $category)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();

        $category = str_replace('-', ' ', $category);

        $products = Product::where('category', $category)
            ->get();

        // dd($products);
        $view_data = [
            'user' => $user,
            'products' => $products
        ];

        return view('products.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();

        $view_data = [
            'user' => $user,
        ];
        return view('products.create', $view_data);
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
            'order_type' => 'required',
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
        $order_type = $request->input('order_type');
        // $image_path = $path . $image_name;
        $user_id = Auth::id();
        // dd($image_name);

        Product::create([
            'user_id' => $user_id,
            'product_name' => $product_name,
            'category' => $category,
            'description' => $description,
            'price' => $price,
            'image_path' => $image_name,
            'order_type' => $order_type,
        ]);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category, string $slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();

        $category = str_replace('-', ' ', $category);
        $product = Product::where('category', $category)
            ->where('slug', $slug)
            ->first();
        $user_product = User::where('id', $product->user_id)->first();
        // dd($user);

        $view_data = [
            'user' => $user,
            'product' => $product,
            'user_product' => $user_product
        ];
        return view('products.view', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $category, $slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $id = Auth::id();
        // dd($user_id);
        $user = User::where('id', $id)->first();

        $category = str_replace('-', ' ', $category);

        $product = Product::where('category', $category)
            ->where('slug', $slug)
            ->firstOrFail();

        $view_data = [
            'user' => $user,
            'product' => $product
        ];

        return view('products.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $category, $id)
    {
        // Validate the input data
        Log::info("Update method called. Category: $category, Id: $id");
        Validator::validate($request->all(), [
            'product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'order_type' => 'required',
            'image' => [
                'sometimes', // Allow image field to be optional
                'image', // Must be an image
                'mimes:png,jpg,jpeg', // Only allow PNG, JPG, JPEG extensions
                'max:2048' // Maximum file size 2MB
            ]
        ]);

        // Find the product based on category and slug
        $product = Product::where('id', $id)->firstOrFail();

        // Get the input data
        $product_name = $request->input('product_name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
        $order_type = $request->input('order_type');

        // Check if a new image is provided
        if ($request->hasFile('image')) {


            // Move the new image to the specified folder
            $image = $request->file('image');
            $image_name = time() . '.' . $image->extension();
            $path = public_path('photos/products_photo/');
            $image->move($path, $image_name);

            // Update the image_path field in the database
            $product->image_path = $image_name;
        }

        $slug = str_replace(' ', '-', $product_name);
        // dd($slug);

        // Update the other fields in the database
        $product->slug = $slug;
        $product->product_name = $product_name;
        $product->category = $category;
        $product->description = $description;
        $product->price = $price;
        $product->order_type = $order_type;
        $product->save();

        $category_slug = str_replace(' ', '-', $category);

        // dd($category_slug);
        return redirect("products/$category_slug/$product->slug");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where("id", $id)->delete();
        $user_id = Auth::id();
        return Redirect("profile/$user_id");
    }
}
