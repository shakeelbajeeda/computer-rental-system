<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index() {
        $data['nav_active'] = 'dashboard';
        $data['total_customers'] = User::whereRole('Customer')->count();
        $data['total_staff'] = User::whereRole('UCR Staff')->count();
        $data['total_managers'] = User::whereRole('Web Manager')->count();
        $data['total_users'] = User::count();
        $data['total_devices'] = Product::count();
        $data['rented_devices'] = Product::whereIs_rented(1)->count();
        $data['available_devices'] = Product::whereIs_rented(0)->count();
        return view('supper_admin.dashboard')->with($data);
    }

    public function change_status (Request $request) {
        try {
            $id = $request->id;
            $table = $request->table;
            $tbl_field = $request->tbl_field;
            $data[$tbl_field] = $request->status;
            if($table == 'users' and $id == auth()->user()->id and $request->status == 0) {
                return $this->send_response(false, 'You cannot block yourself');
            }
            \DB::table($table)->where('id', $id)->update($data);
           return $this->send_response(true, 'Status Updated Successfully!');
        } catch (\Exception $e) {
           return $this->send_response(false, 'Status Cannot Update !');
        }

    }

    public function general_delete (Request $request) {
        try {
            $id = $request->id;
            $table = $request->table;
            if($table == 'users' and $id == auth()->user()->id) {
              return $this->send_response(false, 'You cannot delete yourself');
            }
            \DB::table($table)->where('id', $id)->delete();
            return $this->send_response(true, 'Recored Deleted Successfully!');


        } catch (Exception $e) {
            return $this->send_response(false, 'Recored Cannote Delete !');
        }

    }
}
