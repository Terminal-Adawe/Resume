@extends('layouts.app')

@section('content')
	<div class="container" style="padding-top: 18vh; position: relative; padding-bottom: 90px">
    <div class="row">
      <div class="col-6">
        <div class="row">
          <span style="padding-right: 50px;"><h1 style="font-size: 53px; font-weight: 600;">Build your CV in 3 simple steps</h1></span>
        </div>
        <div class="row my-4" style="padding-top: 8px; padding-bottom: 5px;">
          <div class="col-3">
            <span class="homepage-instr animate-1">1. Fill in your experience and personal details</span>
          </div>
          <div class="col-3">
          </div>
          <div class="col-3">
          </div>
          <div class="col-3">
          </div>
        </div>

        <div class="row my-4" style="padding-top: 8px; padding-bottom: 5px;">
          <div class="col-3">
          </div>
          <div class="col-3">
            <span class="homepage-instr animate-2">2. Select your preferred CV template</span>
          </div>
          <div class="col-3">
          </div>
          <div class="col-3">
          </div>
        </div>

        <div class="row my-4" style="padding-top: 8px; padding-bottom: 5px;">
          <div class="col-3">
          </div>
          <div class="col-3">
          </div>
          <div class="col-3">
            <span class="homepage-instr animate-3">3. Download your CV</span>
          </div>
          <div class="col-3">
          </div>
        </div>

        <div class="row" style="padding-top: 38px; padding-bottom: 5px;">
          <img src="https://img.icons8.com/cotton/64/000000/create-new--v7.png" class="mx-auto" style="width:30px;" />
                <a href="{{ url('/personaldetails') }}" class="btn btn-outline-info btn-lg btn-block mt-4">Create CV</a>
        </div>
      </div>
      <div class="col-6">
        <img src="{{ asset('images/CVimage2.jpg') }}" width="100%">
      </div>
    </div>
  </div>
@endsection