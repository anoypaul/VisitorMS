@extends('layouts.admin_test_master')
@section('admin_content')
<div class="row">
    <div class="col-12 my-3">
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
          <h5 class="text-center">Appointment Data</h5>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">email</th>
                <th scope="col">Address</th>
                <th scope="col">Occupation</th>
                <th scope="col">Image</th>
                <th scope="col">PIN</th>
                <th scope="col">A Date & Time</th>
              </tr>
            </thead>
            <tbody>
              @if (count($appointment_data) >= 1)
                @foreach ($appointment_data as $value)
                  @php
                      $create_date = date('D, d M Y H:i:s', strtotime($value->appointment_time));
                      $create_date_point = date('D, d M Y', strtotime($value->created_at));
                      $present_date = today();
                      $today_date = date('D, d M Y', strtotime($present_date));
                  @endphp
                  <tr>
                    <td>
                      <a class="btn btn-primary" href="{{url('/appointment/send-data-edit/'.$value->appointment_id)}}">Edit</a>
                    </td>
                    <td>{{$value->appointment_id}}</td>
                    <td>{{$value->visitor_name}}</td>
                    <td>{{$value->visitor_phone}}</td>
                    <td>{{$value->visitor_email}}</td>
                    <td>{{$value->visitor_address}}</td>
                    <td>{{$value->visitor_occupation}}</td>
                    <td>
                      @if (isset($value->visitor_image) )
                        <div style="max-width:70px; max-height: 50px; overflow:hidden"> 
                          <img src="{{asset('image/visitor/'. $value->visitor_image)}}" class="img-fluid" alt="">
                        </div>
                      @else
                        <div style="max-width:70px; max-height: 50px; overflow:hidden"> 
                          <img src="{{asset('image/'. 'noimage.png')}}" class="img-fluid" alt="">
                        </div>
                      @endif
                    </td>
                    <td>{{$value->appointment_pin}}</td>
                    <td>
                      @if ($today_date == $create_date_point)
                        {{$create_date}} <span class="text-danger font-weight-bold">*</span>
                      @else
                        {{$create_date}}
                      @endif
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="9" class="text-center">No Data</th>
                </tr> 
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection