<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\Visitor\VisitorModel;
use App\Models\Admin\Appointment\AppointmentModel;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }
    public function list(){
        $visitor_info = DB::table('visitor')
                        ->orderBy('visitor_id', 'desc')
                        ->get();
        return view('admin.appointment.index', compact('visitor_info'));
    }
    public function create($id){
        $visitor_data = VisitorModel::find($id);
        return view('admin.appointment.create', compact('visitor_data'));
    }
    public function store(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // exit;
        $appointment_data = new AppointmentModel();
        $appointment_data->visitor_id = $request->visitor_id;
        $appointment_data->appointment_time = $request->appointment_time;
        $appointment_data->appointment_pin = $request->appointment_pin;
        $appointment_data->save();
        $request->session()->flash('success', 'Visitor create successfully');
        return redirect()->back();
    }
}
