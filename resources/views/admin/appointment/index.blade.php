@extends('layouts.admin_test_master')
@section('admin_content')
    
<div class="row">
    <div class="col-1"></div>
    <div class="col-10 my-3">
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
          <h5 class="text-center">Visitor Data</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">email</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Occupation</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($visitor_info as $value)
                <tr>
                  <th>
                    <a class="btn btn-primary" href="{{url('/appointment/create/'.$value->visitor_id)}}">Appointment create</a>
                  </th>
                  <td>{{$value->visitor_name}}</td>
                  <td>{{$value->visitor_phone}}</td>
                  <td>{{$value->visitor_email}}</td>
                  <td>{{$value->visitor_age}}</td>
                  <td>{{$value->visitor_address}}</td>
                  <td>{{$value->visitor_occupation}}</td>
                  <td>
                    <div style="max-width:70px; max-height: 50px; overflow:hidden"> 
                      <img src="{{asset('image/visitor/'. $value->visitor_image)}}" class="img-fluid" alt="">
                    </div>
                  </td>
                </tr>
              @endforeach
  
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-1"></div>
    
  </div>

@endsection