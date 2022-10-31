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
        <h3>!! YES YES !!</h3>
      </div>
    </div>
  </div>
  <div class="col-4"></div>
  
</div>


@endsection


