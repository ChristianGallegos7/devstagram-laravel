<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //modificar el request para añadir el slug desde antes y validarlo desde antes para mandar el error
        $request->request->add(['username' => Str::slug($request->username)]);

        //validar los datos que se envian desde el formulario

        $request->validate([
            'name' => 'required|min:3|max:30',
            'username' => 'required|unique:users|max:20',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'

        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //autenticar al usuario primera forma
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);


        //autenticar al usuario segunda forma

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index');
    }
}
