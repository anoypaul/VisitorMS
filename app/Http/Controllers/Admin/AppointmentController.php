<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Appointment\AppointmentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\NewAppointment;

class AppointmentController extends Controller
{
    public function read(){
        $appointment_data = DB::table('appointment')
                            ->orderBy('appointment_id', 'desc')
                            ->join('visitor', 'appointment.visitor_id', '=', 'visitor.visitor_id')
                            ->get();
        return view('admin.appointmentList.index', compact('appointment_data'));
    }
    public function edit($id){
        $appointment_id = $id;
        $appointment_data = DB::table('appointment')
                            ->where('appointment_id', '=', $appointment_id)
                            ->join('visitor', 'appointment.visitor_id', '=', 'visitor.visitor_id')
                            ->get();
        return view('admin.appointmentList.edit', compact('appointment_data'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'appointment_pin' => 'required',
        ]);
        $appointment_data = AppointmentModel::find($id);
        $appointment_data->visitor_id = $request->visitor_id;
        $appointment_data->appointment_time = $request->appointment_time;
        $appointment_data->appointment_pin = $request->appointment_pin;
        $appointment_data->save();
        $appointment_data->email = $request->email;
        
        $user = User::where('role_as', '1')->get();
        Notification::send($user, new NewAppointment($appointment_data));
        
        $request->session()->flash('success', 'Appointment data update successfully');
        return redirect('/appointment/send-data');
    }
}
