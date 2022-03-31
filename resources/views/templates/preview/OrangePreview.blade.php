<!DOCTYPE html>
<html lang="en">
@include('templates.templateHead')
<body style="width: 100%; position: relative; margin:0; padding: 0;">

  <div class="container my-4" style="font-size: 20px; font-family: 'Times New Roman'">
    @include('templates.goBack')
    <div class="card print my-4" style="padding-left: 40px; padding-right: 40px; padding-top: 40px; padding-bottom: 40px; ">
  <!-- Heading -->
    @if($data['personaldetails'])
    <div class="row_ my-4">
      <div class="column75">
        <!-- Name -->
        <h1 style="font-size: 64px">{{ $data['personaldetails']->surname }} {{ $data['personaldetails']->other_names }}</h1>
      </div>

      <!-- address -->
      <div class="column25">

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
    <div class="row_ my-4">
      <div class="column75">
        <!-- Summary -->
        @if($data['summary'])
        <div class="row_">
          <div class="col">
            <h5 style="color: {{ $data['properties']->color1 }}">SUMMARY</h5>
            <p>
              {!! nl2br(e($data['summary']->summary)) !!}
            </p>
          </div>
        </div>
        @endif
        <!-- Professional Experience Details -->
        @if($data['professionalexperience'])
        <div class="row_ my-4">
          <div class="col">
            <h5 style="color: {{ $data['properties']->color1 }}">EXPERIENCE</h5>
            @foreach($data['professionalexperience'] as $experience)
            <div class="row_">
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
        <div class="row_ my-4">
          <div class="col">
            <h5 style="color: {{ $data['properties']->color1 }}">EDUCATION</h5>
            @foreach($data['education'] as $education)
          <div class="row_">
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

      <div class="column25">
        <div class="row_">
          @if($data['skills'])
          <div class="col-12">
            <h5 style="color: {{ $data['properties']->color1 }}">SKILLS</h5>
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
            <h5 style="color: {{ $data['properties']->color1 }}">HOBBIES</h5>
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
    </div>

    @include('templates.printBtn')
  </div>
  <script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
</body>
</html>