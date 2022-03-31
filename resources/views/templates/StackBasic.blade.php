<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $data['templateproperties']->template_name }}</title>
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
        <style>
          .dropdown-toggle::after {
            content: none;
          }
        </style>
        @php
          $colors = explode(",",$data['templateproperties']->available_colors);

          $fonts = explode(",",$data['templateproperties']->available_fonts);
        @endphp
        @foreach($colors as $color)
          @if($color == $data['properties']->color1)
            <span class="selected_template_color template_color dropdown-toggle mx-2" id="colorSelector" data-bs-toggle="dropdown" aria-expanded="false" 
            style="background-color: {{ $color }}"></span>
          @endif
        @endforeach
            <div class="dropdown-menu" aria-labelledby="colorSelector">
              @foreach($colors as $color)
                <span class="template_color_select template_color dropdown-toggle mx-2" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: {{ $color }}; width: 30px; height: 30px; border-radius: 4px; color: {{ $color }};" value="{{ $color }}">Select Color</span>
              @endforeach
            </div>

        @foreach($fonts as $font)
          @if($font == $data['properties']->font)
            <span class="template_font mx-2 dropdown-toggle" id="fontSelector" data-bs-toggle="dropdown" aria-expanded="false">{{ $font }}</span>
          @endif
        @endforeach
            <ul class="dropdown-menu" aria-labelledby="fontSelector">
              @foreach($fonts as $font)
                <li class="template_font dropdown-toggle mx-2" id="fontSelector" data-bs-toggle="dropdown" aria-expanded="false">{{ $font }}</li>
              @endforeach
            </ul>
      </div>


    <!-- Heading -->
    @if($data['personaldetails'])
    <div class="row my-4">
      <div class="col-12 mx-auto">
        <!-- Name -->
        <h1 style="font-size: 64px">{{ $data['personaldetails']->surname }} {{ $data['personaldetails']->other_names }}</h1>
      </div>
      
      <!-- address -->
      <div class="col-12 col-sm-12 col-lg-12">


            {{ $data['personaldetails']->address }}

            {{ $data['personaldetails']->city }}, {{ $data['personaldetails']->country }}
            &nbsp;&#9830;&nbsp;
            <small><b>{{ $data['personaldetails']->contact_number_1 }}</b></small>

            <small><b>{{ optional($data['personaldetails'])->contact_number_2 }}</b></small>
            &nbsp;&#9830;&nbsp;
            <small><b>{{ $data['personaldetails']->email }}</b></small>

  
      </div>
      <hr class="theme-color-border" style="border: 2px solid {{ $data['properties']->color1 }};">
    </div>
    @endif

    <!-- Other information -->
    <div class="row my-4">
      <div class="col-12">
        <!-- Summary -->
        @if($data['summary'])
        <div class="row">
          <!-- <div class="col"> -->
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">SUMMARY</h3>
            <p>
              {!! nl2br(e($data['summary']->summary)) !!}
            </p>
          <!-- </div> -->
        </div>
        @endif

        <!-- Skills -->
        @if($data['skills'])
          <div class="row my-4">
            <hr class="theme-color-border" style="border: 1px solid {{ $data['properties']->color1 }};">
            <div class="col-12">
              <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">SKILLS</h3>
              <ul>
                @foreach($data['skills'] as $skill)
                  <li>
                    {{ $skill->skill }} 
                  </li> 
                @endforeach
              </ul>
            </div>
          </div>
        @endif

        <!-- Professional Experience Details -->
        @if($data['professionalexperience'])
        <div class="row my-4">
          <hr class="theme-color-border" style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="col">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EXPERIENCE</h3>
            @foreach($data['professionalexperience'] as $experience)
            <div class="row">
              <div class="col-12">
                <b>{{ $experience->company }} - </b>{{ $experience->address }}, {{ $experience->city }} - {{ $experience->role }}
                <br>
                <small>{{ $experience->date_started }} - {!! $experience->is_current==0 ? $experience->date_ended : "date" !!}</small>
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
          <hr class="theme-color-border" style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="col">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EDUCATION</h3>
            @foreach($data['education'] as $education)
          <div class="row">
            <div class="col-12">
              <b>{{ $education->school }} - </b>{{ $education->address }}, {{ $education->country }}
              <br>
              <small>{{ $education->date_started }} - {!! $education->is_current==0 ? $education->date_ended : "date" !!}</small>
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

        @if($data['hobbies'])
        <div class="row my-4">
          <hr class="theme-color-border" style="border: 1px solid {{ $data['properties']->color1 }};">
            <div class="col-12 my-4">
              <h5 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">HOBBIES</h5>
              <ul>
                @foreach($data['hobbies'] as $hobby)
                  <li> 
                    {{ $hobby->hobby }}  
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
      </div>


    </div>
    @include('templates.previewPrint')
  </div>

  @include('footerDiv')

  <script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
@endsection