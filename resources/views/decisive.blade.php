@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="centerDiv">
      <div class="row">
        <span style="font-size: 30px">Do you want to edit your</span><span style="color: #5dade2; font-size: 40px">Personal Details</span><span style="font-size: 30px">?</span>
      </div>
      <form id="decisive_form" method="GET" action="{{ route('decisive') }}">
      <div class="row">
          <input type="hidden" name="decision" id="decision" value="">
          <input type="hidden" name="path_yes" value="personaldetails">
          <input type="hidden" name="path_no" value="professionalexperience">
          <div class="col"><button  type="button" class="btn btn-outline-info btn-block yes">Yes</button></div>
          <div class="col"><button type="button" class="btn btn-outline-info btn-block no">No</button></div>
      </div>
      </form>
    </div>
  </div>
@endsection