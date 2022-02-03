@extends('layouts.app')

@section('content')
	<div class="mainpage">
    <div class="centerdiv">
      <div class="container-fluid" style="height: 100%;">
        <div class="row" style="height: 70px;">
          <div class="headerTitlediv">
            <span><h2>Create a CV</h2></span>
          </div>
        </div>
  
        <div class="row mt-3 instructionsdiv">
          <span class="mx-auto">
            Create a professional resume fast and easy. <br>
            <small>You can choose any of our amazing templates</small>
          </span>
        </div>

        <div class="row selectPath no-gutters">
          <div class="creatediv col-lg-6 col-sm-12">
            <div class="row">

                <img src="https://img.icons8.com/cotton/64/000000/create-new--v7.png" class="mx-auto" />
                <a href="{{ url('/personaldetails') }}" class="btn btn-outline-info btn-lg btn-block mt-4">Create CV</a>

            </div>
          </div>
  
          <div class="creatediv col-lg-6 col-sm-12">
              <div class="row">
                  <img src="https://img.icons8.com/ultraviolet/64/000000/enter-2.png" class="mx-auto" />
                  <a href="{{ url('/login') }}" class="btn btn-outline-info btn-lg btn-block mt-4">Sign In</a>

              </div>
              
          </div>
        </div>
        
        <a href="https://icons8.com/icon/114170/create" class="float-right">Create icon by Icons8</a>
      </div>
    </div>
</div>
@endsection