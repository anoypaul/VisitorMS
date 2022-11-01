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
        <h5 class="text-center">Visitor Create</h5>
      </div>
      <div class="card-body">
        <form action="{{url('/visitor/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name">Visitor Name <span class="text-danger font-weight-bold">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name" required>
                  @error('name')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number <span class="text-danger font-weight-bold">*</span></label>
                  <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Number" required>
                  @error('phone_number')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email Address <span class="text-danger font-weight-bold">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                  @error('email')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Age <span class="text-danger font-weight-bold">*</span></label>
                  <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}" placeholder="Enter Your Age" required>
                  @error('age')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="address">Address <span class="text-danger font-weight-bold">*</span></label>
                  <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Enter Your Addresss" required>
                  @error('address')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="occupation">Occupation <span class="text-danger font-weight-bold">*</span></label>
                  <input type="text" class="form-control" name="occupation" id="occupation" value="{{ old('occupation') }}" placeholder="Enter Your Occupation" required>
                  @error('occupation')
                    <div class="alert text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Enter Your Image">
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


