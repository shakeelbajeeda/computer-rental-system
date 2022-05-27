<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['nav_active'] = 'users';
        $data['title'] = 'Customers';
        $data['active_users'] = User::whereRole('Customer')->where('is_active',1)->get();
        $data['blocked_users'] = User::whereRole('Customer')->where('is_active',0)->get();
        return view('supper_admin.usermanagement.view_all_users')->with($data);
    }

    public function staff()
    {
        $data['nav_active'] = 'users';
        $data['title'] = 'Staff';
        $data['active_users'] = User::whereRole('UCR Staff')->where('is_active',1)->get();
        $data['blocked_users'] = User::whereRole('UCR Staff')->where('is_active',0)->get();
        return view('supper_admin.usermanagement.view_all_users')->with($data);
    }

    public function web_managers()
    {
        $data['nav_active'] = 'users';
        $data['title'] = 'Web Managers';
        $data['active_users'] = User::whereRole('Web Manager')->where('is_active',1)->get();
        $data['blocked_users'] = User::whereRole('Web Manager')->where('is_active',0)->get();
        return view('supper_admin.usermanagement.view_all_users')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['nav_active'] = 'users';
        $data['title'] = "Add New User";
        return view('supper_admin.usermanagement.add_user')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);

        $user = User::create($data);
        Session::flash('message', 'User created successfully!');
        // if($user->role == "Customer")
        // {

        // }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['user'] = $user;
        $data['nav_active'] = 'users';
        return view('supper_admin.usermanagement.user_detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['nav_active'] = 'users';
        $data['title'] = "Edit User";
        $data['user'] = $user;
        return view('supper_admin.usermanagement.add_user')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'role' => 'required',
        ]);
        if($request->password != '') {
            $data['password'] = $request->password;
        }

        $user = $user->fill($data)->save();
        Session::flash('message', 'User updated successfully!');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
