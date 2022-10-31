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
        <h5 class="text-center">Front Desk Validation Check</h5>
      </div>
      <div class="card-body">
        <form action="{{url('/front-desk/check')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Appointment PIN</label>
                  <input type="number" class="form-control" name="appointment_pin" id="appointment_pin" placeholder="Enter Appointment Pin">
                </div>
                {{-- <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                </div> --}}
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-4"></div>
  
</div>


@endsection


