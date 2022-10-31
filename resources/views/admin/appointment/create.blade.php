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
          <form action="{{url('/visitor/create')}}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="name" id="name" value="{{$visitor_data->visitor_name}}" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$visitor_data->visitor_email}}" placeholder="Enter Email">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="address">Occupation</label>
                    <input type="text" class="form-control" name="occupation" id="occupation" value="{{$visitor_data->visitor_occupation}}" placeholder="Enter Your Occupation">
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