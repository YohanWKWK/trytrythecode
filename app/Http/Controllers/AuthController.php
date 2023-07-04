<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('error_message', 'wrong email or password');
        }
    }

    public function logout()
    {
        Session::flash('');
        Auth::logout();

        return redirect('login');
    }

    public function register_form()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'kota_kabupaten' => 'required',
            'alamat_lengkap' => 'required',
            'image' => [
                'required',
                File::image()
                    ->types(['png', 'jpg', 'jpeg'])
                    ->min(1)
                    ->max(5 * 1024)
            ],
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        // dd($imageName);
        $path = public_path('photos/users_photo/');
        $image->move($path, $image_name);
        $image_path = $image_name;

        // dd($image);
        User::create([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($request->input('password')),
            'kota_kabupaten'    => $request->input('kota_kabupaten'),
            'alamat_lengkap'    => $request->input('alamat_lengkap'),
            'image_path'        => $image_path,
        ]);

        return redirect('login');
    }
}
