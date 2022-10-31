<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\Visitor\VisitorModel;

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
}
