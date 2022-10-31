@extends('layouts.visitor_master')

@section('visitor_content')

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
        <h5 class="text-center">Visitor Edit</h5>
      </div>
      <div class="card-body">
        <form action="{{url('/visitor/update/'.$visitor_info[0]->visitor_id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name">Visitor Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$visitor_info[0]->visitor_name}}" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{$visitor_info[0]->visitor_phone}}" placeholder="Enter Number">
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{$visitor_info[0]->visitor_email}}" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="email">Age</label>
                  <input type="number" class="form-control" name="age" id="age" value="{{$visitor_info[0]->visitor_age}}" placeholder="Enter Your Age">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address" value="{{$visitor_info[0]->visitor_address}}" placeholder="Enter Your Addresss">
                </div>
                <div class="form-group">
                  <label for="address">Occupation</label>
                  <input type="text" class="form-control" name="occupation" id="occupation" value="{{$visitor_info[0]->visitor_occupation}}" placeholder="Enter Your Occupation">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-7">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" value="{{$visitor_info[0]->visitor_image}}" placeholder="Enter Your Image">
                        </div>
                        <div class="col-5">
                            <div style="max-width:100px; max-height: 70px; overflow:hidden; margin-left:auto">
                                <img class="img-fluid" src="{{asset('image/visitor/'.$visitor_info[0]->visitor_image)}}" alt="">
                            </div>
                        </div>
                    </div>
                 
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


