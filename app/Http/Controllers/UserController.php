<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userprofile()
    {
        return view('userprofile');
    }

    public function about()
    {
        return view('about');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->image = $request->input('image');
        $user->mobile = $request->input('mobile');

        // Add more fields as needed

        $user->save();

        return redirect()->route('profile', ['id' => $user->id])->with('success', 'Thông tin đã được cập nhật thành công');
    }
}
