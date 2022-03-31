<!DOCTYPE html>
<html lang="en">
@include('templates.templateHead')
<body style="width: 100%; position: relative; margin:0; padding: 0;">

  <div class="container my-4" style="font-size: 20px; font-family: 'Times New Roman'">
    <div class="card print my-4" style="padding-left: 40px; padding-right: 40px; padding-top: 40px; padding-bottom: 40px; ">

    <!-- Heading -->
    @if($data['personaldetails'])
    <div class="row_ my-4">
      <div class="column100 mx-auto">
        <!-- Name -->
        <h1 style="font-size: 64px">{{ $data['personaldetails']->surname }} {{ $data['personaldetails']->other_names }}</h1>
      </div>
      
      <!-- address -->
      <div class="column100">


            {{ $data['personaldetails']->address }}

            {{ $data['personaldetails']->city }}, {{ $data['personaldetails']->country }}
            &nbsp;&#9830;&nbsp;
            <small><b>{{ $data['personaldetails']->contact_number_1 }}</b></small>

            <small><b>{{ optional($data['personaldetails'])->contact_number_2 }}</b></small>
            &nbsp;&#9830;&nbsp;
            <small><b>{{ $data['personaldetails']->email }}</b></small>

  
      </div>
    </div>
    <hr style="border: 2px solid {{ $data['properties']->color1 }};">
    @endif

    <!-- Other information -->
    <div class="row_ my-4">
      <div class="column100">
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
          <div class="row_ my-4">
            <hr style="border: 1px solid {{ $data['properties']->color1 }};">
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
        <div class="row_ my-4">
          <hr style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="col">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EXPERIENCE</h3>
            @foreach($data['professionalexperience'] as $experience)
            <div class="row_">
              <div class="col-12">
                <b>{{ $experience->company }} - </b>{{ $experience->address }}, {{ $experience->city }} - {{ $experience->role }}
                <br>
                <small>{{ $experience->date_started }} - {!! $experience->is_current==0 ? $experience->date_ended : "date" !!}</small>
              </div>

              @if($data['professionalexperience_responsibilities'])
              <div class="column100 mt-3">
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
              <div class="column100 mt-3">
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
        <div class="row_ my-4">
          <hr style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="col">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EDUCATION</h3>
            @foreach($data['education'] as $education)
          <div class="row_">
            <div class="column100">
              <b>{{ $education->school }} - </b>{{ $education->address }}, {{ $education->country }}
              <br>
              <small>{{ $education->date_started }} - {!! $education->is_current==0 ? $education->date_ended : "date" !!}</small>
            </div>
            @if($data['education_projects'])
            <div class="column100 mt-3">
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
        <div class="row_ my-4">
          <hr style="border: 1px solid {{ $data['properties']->color1 }};">
            <div class="column100 my-4">
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
  </div>
    @include('templates.printBtn')
  </div>

  @include('footerDiv')
  
  <script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>