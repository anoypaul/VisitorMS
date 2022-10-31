<?php

namespace App\Http\Controllers\Frontend\FrontDesk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontDeskController extends Controller
{
    public function create(){
        return view('Frontend.front_desk.create');
    }
    public function check(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // exit;
        $appointment_pin = $request->appointment_pin;
        $check_data = DB::table('appointment')
                    ->where('appointment_pin', '=', $appointment_pin)
                    ->get();
        // echo '<pre>';
        // print_r($check_data);
        // exit;
        if ($appointment_pin == $check_data[0]->appointment_pin) {
            $request->session()->flash('success', 'Confirmation successfully');
            return view('Frontend.front_desk.card');
        }else{
            $request->session()->flash('success', 'PIN Not Match');
            return redirect()->back();
        }
    }
}
