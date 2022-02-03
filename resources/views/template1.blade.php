<!DOCTYPE html>
<html lang="en">
<head>
<title>Orange Template</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Resume site">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
<script src="https://kit.fontawesome.com/967d61a618.js" crossorigin="anonymous"></script>
</head>
@extends('layouts.app')

@section('content')
<body class='body'>
  <div class="container" style="font-size: 21px; font-family: 'Times New Roman'">


      <div class="d-flex justify-content-center my-4" style="background-color: white;padding-top: 8px; padding-bottom: 8px;">
        @php
          $colors = explode(",",$data['templateproperties']->available_colors);

          $fonts = explode(",",$data['templateproperties']->available_fonts);
        @endphp
        @foreach($colors as $color)
          @if($color == $data['properties']->color1)
            <span class="template_color mx-2" id="colorSelector" 
            style="background-color: {{ $color }}"></span>
          @endif
        @endforeach

        @foreach($fonts as $font)
          @if($font == $data['properties']->font)
            <span class="template_color mx-2">{{ $font }}</span>
          @endif
        @endforeach
      </div>


    <!-- Heading -->
    @if($data['personaldetails'])
    <div class="row my-4">
      <div class="col-9 col-sm-9 col-lg-9">
        <!-- Name -->
        <h1 style="font-size: 64px">{{ $data['personaldetails']->surname }} {{ $data['personaldetails']->other_names }}</h1>
      </div>

      <!-- address -->
      <div class="col-3 col-sm-3 col-lg-3">

          <p>
            {{ $data['personaldetails']->address }}
            <br>
            {{ $data['personaldetails']->city }}, {{ $data['personaldetails']->country }}
          </p>
          <p>
            <small><b>{{ $data['personaldetails']->contact_number_1 }}</b></small>
            <br>
            <small><b>{{ optional($data['personaldetails'])->contact_number_2 }}</b></small>
            <br>
            <small><b>{{ $data['personaldetails']->email }}</b></small>
          </p>

  
      </div>
    </div>
    @endif

    <!-- Other information -->
    <div class="row my-4">
      <div class="col-9 col-sm-9 col-lg-9">
        <!-- Summary -->
        @if($data['summary'])
        <div class="row">
          <div class="col">
            <h5 style="color: #5480f9">SUMMARY</h5>
            <p>
              {!! nl2br(e($data['summary']->summary)) !!}
            </p>
          </div>
        </div>
        @endif
        <!-- Professional Experience Details -->
        @if($data['professionalexperience'])
        <div class="row my-4">
          <div class="col">
            <h5 style="color: #5480f9">EXPERIENCE</h5>
            @foreach($data['professionalexperience'] as $experience)
            <div class="row">
              <div class="col-12">
                <b>{{ $experience->company }}, </b>{{ $experience->address }}, {{ $experience->city }} - {{ $experience->role }}
                <br>
                <small>{{ $experience->date_started }} to {!! $experience->is_current==0 ? $experience->date_ended : "date" !!}</small>
              </div>

              @if($data['professionalexperience_responsibilities'])
              <div class="col-12 mt-3">
                <div class="ml-4">
                  <ul>
                    @foreach($data['professionalexperience_responsibilities'] as $responsibility)
                      @if($responsibility->professional_experience_id == $experience->id )
                        <li>{!! nl2br(e($responsibility->duty)) !!}</li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
              @endif

              @if($data['professionalexperience_projects'])
              <div class="col-12 mt-3">
                <div class="ml-4">
                  <ul>
                    @foreach($data['professionalexperience_projects'] as $project)
                      @if($project->professional_experience_id == $experience->id )
                        <li>{!! nl2br(e($project->project)) !!}</li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
              @endif
            </div>
     
          <br>
          @endforeach
          </div>
        </div>
        @endif
        <!-- Education Details -->
        @if($data['education'])
        <div class="row my-4">
          <div class="col">
            <h5 style="color: #5480f9">EDUCATION</h5>
            @foreach($data['education'] as $education)
          <div class="row">
            <div class="col-12">
              <b>{{ $education->school }}, </b>{{ $education->address }}, {{ $education->country }}
              <br>
              <small>{{ $education->date_started }} to {!! $education->is_current==0 ? $education->date_ended : "date" !!}</small>
            </div>
            @if($data['education_projects'])
            <div class="col-12 mt-3">
              <div class="ml-4"> 
                <ul>
                  @foreach($data['education_projects'] as $project)
                      @if($project->education_id == $education->eid )
                        <li>{!! nl2br(e($project->project)) !!}</li>
                      @endif
                  @endforeach
                </ul>
              </div>
            </div>
            @endif
          </div>
          <br>
          @endforeach
          </div>
        </div>
        @endif
      </div>

      <div class="col-3 col-sm-3 col-lg-3">
        <div class="row">
          @if($data['skills'])
          <div class="col-12">
            <h5 style="color: #5480f9">SKILLS</h5>
            <ul>
              @foreach($data['skills'] as $skill)
                <li>
                  {{ $skill->skill }} 
                </li> 
              @endforeach
            </ul>
          </div>
          @endif

          @if($data['hobbies'])
          <div class="col-12 my-4">
            <h5 style="color: #5480f9">HOBBIES</h5>
            <ul>
              @foreach($data['hobbies'] as $hobby)
                <li> 
                  {{ $hobby->hobby }}  
                </li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>

      </div>
    </div>
    <div class="row">
      <form action="{{ url('/previewresume2') }}" method="get" class="mx-auto">
        @csrf
        <input type="hidden" value="0" id="hiddencheck" name='hiddencheck'>
        <button class="btn btn-info" type="submit">Preview and Print</button>
      </form>
      
    </div>
  </div>

  <script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
@endsection