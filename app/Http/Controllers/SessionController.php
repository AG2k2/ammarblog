<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function login(Request $request)
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required','max:255'],
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'بعض المدخلات أو جميعها غير صحيح.'
            ]);
        }

        session()->regenerate();
        session()->flash('success','أهلا بعودتك.');

        return back();

    }

    public function destroy()
    {
        auth()->logout();
        return back()->with("success","نستودعكم الله.");
    }

    public function create()
    {
        return view("sessions.create");
    }
}
