<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\Visitor\VisitorModel;
use App\Models\Admin\Appointment\AppointmentModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewAppointment;

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
        $request->validate([
            'appointment_pin' => 'required',
        ]);
        $appointment_data = new AppointmentModel();
        $appointment_data->visitor_id = $request->visitor_id;
        $appointment_data->appointment_time = $request->appointment_time;
        $appointment_data->appointment_pin = $request->appointment_pin;
        $appointment_data->save();
        $appointment_data->email = $request->email;
        
        $user = User::where('role_as', '1')->get();
        Notification::send($user, new NewAppointment($appointment_data));
        
        $request->session()->flash('success', 'Appointment create successfully');
        return redirect()->back();
    }
}
