@extends('layouts.app')

@section('content')
<body class="body" style="background-image: url({{ asset('images/Subtle-Prism.svg') }}); background-size: cover;">


  @include('progress')



	<div class="container-fluid my-4">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12">
      </div>

      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card input-div-card">
          <div class="card-header">
            <h2>Personal Details</h2>
            <p>Enter your personal details</p>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8 col-lg-8 col-sm-12 order-lg-1 order-sm-2">
                  <form action="/savepersonaldetails" class="needs-validation" method="post" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="firstname">Your Name</label>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <input type="text" id="surname" placeholder="Enter Your  Surname" name="surname" value="{{ $data['personaldetails']->surname ?? '' }}" required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <input type="text" id="othernames" placeholder="Enter Other Names" name="othernames" value="{{ $data['personaldetails']->other_names ?? '' }}" required>
                        </div>
                      </div>
                    </div>
      
                    <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" id="email" placeholder="Enter Email" name="email" value="{{ $data['personaldetails']->email ?? '' }}" required>
                    </div>
      
                    <div class="form-group">
                      <label for="country">Location</label>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-control-selectpicker">
                            <select class="selectpicker countrypicker" value="{{ $data['personaldetails']->country ?? '' }}" name="country" data-flag="true" data-live-search=”true” required></select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <input type="text" id="city" placeholder="City you stay?" name="city" value="{{ $data['personaldetails']->city ?? '' }}" required>
                        </div>
                      </div>
                    </div>
      
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" placeholder="Enter Address" name="address" value="{{ $data['personaldetails']->address ?? '' }}" required>
                    </div>
      
                    <div class="form-group">
                        <label for="contactnumber">Contact Number(s):</label>
                      <div class="row">
                          <div class="col-6">
                            <input type="text" id="email" placeholder="Contact Number 1" name="contact1" value="{{ $data['personaldetails']->contact_number_1 ?? '' }}">
                          </div>
                          <div class="col-6">
                            <input type="text" placeholder="Contact Number 2" name="contact2" value="{{ $data['personaldetails']->contact_number_2 ?? '' }}">
                          </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                      <div class="col">
                        <button type="submit" class="stylessbutton"><img src="https://img.icons8.com/ultraviolet/40/000000/circled-chevron-right.png"/> Add Professional Experience</button>
                      </div>
                      <div class="col">
                        <button type="button" class="stylessbutton"><img src="https://img.icons8.com/color/48/000000/submit-progress--v1.png"/> View Resume</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-4 col-lg-4 col-sm-12 order-lg-2 order-sm-1 info-image" style="background-image: url({{ asset('images/collegeboy.png') }}); background-size: cover; background-position: center;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-12">
      </div>
    </div>
  </div>
@endsection