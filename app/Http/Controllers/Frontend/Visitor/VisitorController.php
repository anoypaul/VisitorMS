<?php

namespace App\Http\Controllers\Frontend\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Visitor\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function store(Request $request){
        $visitor_data =new VisitorModel();
        $visitor_data->visitor_name = $request->name;
        $visitor_data->visitor_phone = $request->phone_number;
        $visitor_data->visitor_email = $request->email;
        $visitor_data->visitor_age = $request->age;
        $visitor_data->visitor_address = $request->address;
        $visitor_data->visitor_occupation = $request->occupation;
        if($request->has('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image/visitor/', $image_new_name);
            $visitor_data->visitor_image = $image_new_name;
        }
        $visitor_data->save();
        $request->session()->flash('success', 'Visitor create successfully');
        return redirect()->back();
    }
    public function index(){
        $visitor_info = DB::table('visitor')
                        ->orderBy('visitor_id', 'desc')
                        ->get();
        return view('Frontend.visitor.index', compact('visitor_info'));
    }
    public function edit($id){
        $visitor_info = DB::table('visitor')
                ->where('visitor_id', $id)
                ->get();
        return view('Frontend.visitor.edit', compact('visitor_info'));
    }
    public function update(Request $request, $id){
        $visitor_info = VisitorModel::find($id);
        $visitor_info->visitor_name = $request->name;
        $visitor_info->visitor_phone = $request->phone_number;
        $visitor_info->visitor_email = $request->email;
        $visitor_info->visitor_age = $request->age;
        $visitor_info->visitor_address = $request->address;
        $visitor_info->visitor_occupation = $request->occupation;
        if($request->has('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image/visitor/', $image_new_name);
            $visitor_info->visitor_image = $image_new_name;
        }
        $visitor_info->save();
        $request->session()->flash('success', 'Visitor create successfully');
        return redirect('/visitor/index');
    }
}
