@extends('layouts.admin_test_master')
@section('admin_content')
    
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 my-3">
      <div class="row" id="message">
          @if (Session::has('success'))
              <div class="col-10">
                <p class="alert alert-primary">{{Session::get('success')}}</p>
              </div>
              <div class="col-2" >
                <button class="btn btn-primary" onclick="remove()">X</button>
              </div>
          @endif
      </div>
      <div class="card">
        <div class="card-header">
          <h5 class="text-center">Visitor Create</h5>
        </div>
        <div class="card-body">
          <form action="{{url('/appointment/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="text-center" style="max-width:150px; max-height: 120px; overflow:hidden"> 
                        <img src="{{asset('image/visitor/'. $visitor_data->visitor_image)}}" class="img-fluid" alt="">
                    </div>
                </div>
                <input type="numbeer" class="form-control" name="visitor_id" id="visitor_id" value="{{$visitor_data->visitor_id}}" hidden>
                <div class="col-6">
                    
                  <div class="form-group">
                    <label for="name">Visitor Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$visitor_data->visitor_name}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$visitor_data->visitor_email}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="address">Occupation</label>
                    <input type="text" class="form-control" name="occupation" id="occupation" value="{{$visitor_data->visitor_occupation}}" readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="address">Appointment Time <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" name="appointment_time" id="appointment_time" value="" placeholder="Enter Your Occupation">
                  </div>
                  <div class="form-group">
                    <label for="number">Appointment PIN <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="appointment_pin" id="appointment_pin" value="" placeholder="Enter Your Occupation">
                  </div>
                  
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-2"></div>
    
  </div>

@endsection