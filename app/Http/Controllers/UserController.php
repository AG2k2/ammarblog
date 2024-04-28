<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function edit(User $user)
    {
        return view("users.edit");
    }

    public function update(Request $request, User $user)
    {
        $attributes = $this->validate($request, [
            "name"=> ["required",],
            "username" => ["required", Rule::unique("users", 'username')->ignore($request->username, 'username')],
            "email" => ["required", Rule::unique("users", "email")->ignore($request->email,"email")],
            'pro_pic' => ["image"],
        ]);
        if ($request->pro_pic ?? false) {
            $attributes['pro_pic'] = Storage::disk("public")->put( 'profilePics', request()->file('pro_pic'));
        }
        $user->update($attributes);

        return back()->with('success','تم حفظ التغييرات.');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/')->with('success','يحزننا فراقك!');
    }
}
