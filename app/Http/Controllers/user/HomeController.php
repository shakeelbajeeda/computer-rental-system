<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recharge_history;
use App\Models\Product;
use App\Models\Rented_device;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $data['nav_active'] = 'dashboard';
        $data['rented_devices'] = Rented_device::whereIs_returned(1)->where('user_id', auth()->user()->id)->count();
        return view('user.dashboard')->with($data);
    }

    public function my_recharge_history() {
        $data['nav_active'] = 'account';
        $data['recharges'] = Recharge_history::where('added_to', auth()->user()->id)->get();
        return view('user.accounts.index')->with($data);
    }

    public function my_rented_devices() {
        $data['nav_active'] = 'account';
        $data['devices'] = Rented_device::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('user.devices.index')->with($data);
    }

    public function send_return_request(Request $request) {
        $request->validate(['id' => 'required']);
        Rented_device::whereId($request->id)->update(['status' => 'Return Requested', 'return_date' => date('Y-m-d H:i:s')]);
        session()->flash('message', "Return request sent successfully!");
        return redirect()->back();
    }
}
