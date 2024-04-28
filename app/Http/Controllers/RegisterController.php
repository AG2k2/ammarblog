<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function edit(Request $request)
    {
        return view('register.edit');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:25'],
            'username' => ['required','max:25', Rule::unique('users', 'username')],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'gender' => ['required'],
            'password'=> ['required','min:8', 'max:255','confirmed'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/home')->with('success','مرحبًا '. $attributes['name']);
    }

    public function create()
    {
        App::setLocale("ar");
        return view('register.create');
    }
}
