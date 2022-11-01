@extends('layouts.visitor_master')
@section('visitor_content')
<div class="row">
  <div class="col-4"></div>
  <div class="col-4 my-3">
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
        <h5 class="text-center">Front Desk YES CARD</h5>
      </div>
      <div class="card-body">
        @php
            $date =  date("D, d M Y H:i:s", strtotime($appointment_data[0]->appointment_time));
        @endphp
          <table class="table table-bordered table-primary">
            <tbody>
                <tr>
                    <th class="w-25">Image</th>
                    <td>
                        <div style="max-width:100px; max-height: 90px; overflow:hidden"> 
                            <img src="{{asset('image/visitor/'. $appointment_data[0]->visitor_image)}}" class="img-fluid" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="w-25">Name</th>
                    <td>{{ $appointment_data[0]->visitor_name }}</th>
                </tr>
                <tr>
                    <th class="w-25">Email</th>
                    <td>{{ $appointment_data[0]->visitor_email }}</th>
                </tr>
                <tr>
                    <th class="w-25">Age</th>
                    <td>{{ $appointment_data[0]->visitor_age }}</th>
                </tr>
                <tr>
                    <th class="w-25">Appointment Time</th>
                    <td>{{ $appointment_data[0]->visitor_occupation }}</th>
                </tr>
                <tr>
                    <th class="w-25">Appointment Time</th>
                    <td>{{ $date }}</th>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12 text-center">
          <button class="btn btn-primary rounded text-center" onclick="window.print()">Print this page</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-4"></div>
</div>
@endsection


