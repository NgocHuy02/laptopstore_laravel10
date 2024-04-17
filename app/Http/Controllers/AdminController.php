<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class AdminController extends Controller
{
    public function profilepage()
    {
        return view('profile');
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

        return redirect()->route('admin/profile', ['id' => $user->id])->with('success', 'Thông tin đã được cập nhật thành công');
    }
}