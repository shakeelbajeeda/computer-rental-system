<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rented_device;
class ServiceController extends Controller
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
        $data['nav_active'] = 'services';
        $data['title'] = "View all Services";
        $data['services'] = Product::all();
        return view('supper_admin.services.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $data['nav_active'] = 'services';
        $data['title'] = "Add New Service";
        $data['service'] = $product;
        return view('supper_admin.services.add')->with($data);
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
            'title' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'per_hour_rate' => 'required',
            'security_deposit' => 'required',
            'insurance_amount' => 'required',
            'image' => 'required|image',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $this->upload_file($request->image, 'service_images');
        Product::create($data);
        session()->flash('message', 'Service added successfully');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data['nav_active'] = 'services';
        $data['title'] = "Edit Service";
        $data['service'] = $product;
        return view('supper_admin.services.add')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['nav_active'] = 'services';
        $data['title'] = "Edit Service";
        $data['service'] = $product;
        return view('supper_admin.services.add')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'per_hour_rate' => 'required',
            'security_deposit' => 'required',
            'insurance_amount' => 'required',
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image',
            ]);
            $this->remove_file($product->image, 'service_images');
            $data['image'] = $this->upload_file($request->image, 'service_images');
        }
        $product->update($data);
        session()->flash('message', 'Service updated successfully');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function all_rental_services() {
        $data['nav_active'] = 'rent';
        $data['devices'] = Rented_device::orderBy('id', 'desc')->get();
        return view('supper_admin.devices.index')->with($data);
    }

    public function rent_requests() {
        $data['nav_active'] = 'rent';
        $data['devices'] = Rented_device::whereStatus('Paid')->orderBy('id', 'desc')->get();
        return view('supper_admin.devices.rent_requests')->with($data);
    }

    public function approve_request(Request $request) {
        $request->validate([
            'id' => 'required',
            'dispatch_date' => 'required'
        ]);
        Rented_device::whereId($request->id)->update(['status' => 'Dispatched', 'booking_date' => $request->dispatch_date]);
        session()->flash('message', "Device dispatched successfully!");
        return redirect()->back();
    }

    public function rent_return_requests() {
        $data['nav_active'] = 'rent';
        $data['devices'] = Rented_device::whereStatus('Return Requested')->orderBy('id', 'desc')->get();
        return view('supper_admin.devices.rent_return_requests')->with($data);
    }

    public function return_confirm(Request $request) {
        $request->validate([
            'return_date' => 'required'
        ]);
        $detection = 0;
        $data['return_date'] = $request->return_date;
        $data['note'] = $request->note;
        if(!empty($request->damage_amount)) {
            $detection += $request->damage_amount;
            $data['damage_amount'] = $request->damage_amount;
        }

        if(!empty($request->late_fee)) {
            $detection += $request->late_fee;
            $data['late_fee'] = $request->late_fee;
        }

        $rent_device = Rented_device::findOrFail($request->id);
        if($detection > 0) {
            $total = $detection - $rent_device->security;
            if($total > $rent_device->user->total_money) {
                session()->flash('message', "Customer don't have enough amount in the account to pay Penalties");
                return redirect()->back();
            } else {
                $rent_device->user->increment('total_money', $rent_device->security);
                $rent_device->user->decrement('total_money', $detection);
            }
        } else {
            $rent_device->user->increment('total_money', $rent_device->security);
        }
        $rent_device->product->update(['is_rented' => 0]);
        $data['status'] = 'Returned';
        $data['is_returned'] = 1;
        $rent_device->update($data);
        session()->flash('message', "Device has returned successfully!");
        return redirect()->back();
    }
}
