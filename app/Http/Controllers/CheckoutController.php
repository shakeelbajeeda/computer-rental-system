<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Rented_device;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirm_order(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'hours' => 'required',
        ]);
        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);
        if($product->is_rented == 1) {
            session()->flash('message', "This product is already on rent. Please try another one.");
            return redirect()->back();
        }
        $insurance = 0;
        $discount = 0;
        $sub_total = $product->per_hour_rate * $request->hours;

        if(!empty($request->insurance) and $request->insurance == 1) {
            $insurance = $product->insurance_amount;
        }

        if($user->is_student == 1) {
            $discount = $sub_total * 10 /100;
        }

        $total_amount = $sub_total + $insurance + $product->security_deposit - $discount;

        if($total_amount > $user->total_money) {
            session()->flash('message', "You account don't have enough balance to process this order. Please recharge it first");
            return redirect()->back();
        }

        User::where('id', $user->id)->decrement('total_money', $total_amount);
        $product->update(['is_rented' => 1]);
        $data['user_id']= $user->id;
        $data['product_id']= $product->id;
        $data['total_price'] = $total_amount;
        $data['per_hour_rate'] = $product->per_hour_rate;
        $data['total_hours'] = $request->hours;
        $data['booking_date'] = date('Y-m-d H:i:s');
        $data['is_insurance'] = $insurance > 0 ? 1 : 0;
        $data['insurance_amount'] = $insurance;
        $data['security'] = $product->security_deposit;
        $data['discount'] = $discount;
        $data['status'] = 'Paid';
        Rented_device::create($data);
        session()->flash('message', "Congrats, Your order has been completed successfully!. Please collect the device from relevent person. Thanks");
        return redirect()->back();
    }
}
