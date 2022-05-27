<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Recharge_history;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
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
        $data['nav_active'] = 'account';
        $data['recharges'] = Recharge_history::all();
        return view('supper_admin.accounts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['nav_active'] = 'account';
        $data['title'] = "Rechare an account";
        $data['users'] = User::all();
        return view('supper_admin.accounts.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'user' => 'required'
        ]);

        $data['added_to'] = $request->user;
        $data['added_by'] = auth()->user()->id;
        $data['amount'] = $request->amount;
        Recharge_history::create($data);
        $user = User::findOrFail($request->user);
        $user->increment('total_money', $request->amount);
        session()->flash("message", "$".$request->amount. " has added into ". $user->name. " account");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recharge_history  $recharge_history
     * @return \Illuminate\Http\Response
     */
    public function show(Recharge_history $recharge_history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recharge_history  $recharge_history
     * @return \Illuminate\Http\Response
     */
    public function edit(Recharge_history $recharge_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recharge_history  $recharge_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recharge_history $recharge_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recharge_history  $recharge_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recharge_history $recharge_history)
    {
        //
    }
}
