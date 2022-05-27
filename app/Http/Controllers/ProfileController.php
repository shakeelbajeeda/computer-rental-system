<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit_profile()
    {
        $data['nav_active'] = 'profile';
        $data['title'] = "Edit Profile";
        $data['user'] = User::find(auth()->user()->id);
        $data['layout'] = auth()->user()->role == "Customer" ? '/user' : '/supper_admin';
        // dd($data);
        return view('profile')->with($data);
    }

    public function update_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        if($request->password != '') {
            $data['password'] = $request->password;
        }
        $user = $user->update($data);
        Session::flash('message', 'Profile updated successfully!');
        return redirect()->back();
    }

}
