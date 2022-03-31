@include('templates.print.printHead')
  <body>
    <div class="container" style="font-size: 14px; font-family: 'Times New Roman'">
      @if($data['personaldetails'])
    <div class="row_ my-4">
      <div class="row_ mx-auto">
        <h1 style="font-size: 64px">{{ $data['personaldetails']->surname }} {{ $data['personaldetails']->other_names }}</h1>
      </div>
      
      <div class="row_">


            {{ $data['personaldetails']->address }}

            {{ $data['personaldetails']->city }}, {{ $data['personaldetails']->country }}
            &nbsp; - &nbsp;
            <small><b>{{ $data['personaldetails']->contact_number_1 }}</b></small>

            <small><b>{{ optional($data['personaldetails'])->contact_number_2 }}</b></small>
            &nbsp; - &nbsp;
            <small><b>{{ $data['personaldetails']->email }}</b></small>

  
      </div>
    </div>
    <hr style="border: 2px solid {{ $data['properties']->color1 }};">
    @endif

    <div class="row_ my-4">
      <div class="row_">
        @if($data['summary'])
        <div class="row_">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">SUMMARY</h3>
            <p>
              {!! nl2br(e($data['summary']->summary)) !!}
            </p>
        </div>
        @endif

        @if($data['skills'])
          <div class="row_ my-4">
            <hr style="border: 1px solid {{ $data['properties']->color1 }};">
            <div class="row_">
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

        @if($data['professionalexperience'])
        <div class="row_ my-4">
          <hr style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="row_">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EXPERIENCE</h3>
            @foreach($data['professionalexperience'] as $experience)
            <div class="row_">
              <div class="row_">
                <b>{{ $experience->company }} - </b>{{ $experience->address }}, {{ $experience->city }} - {{ $experience->role }}
                <br>
                <small>{{ $experience->date_started }} - {!! $experience->is_current==0 ? $experience->date_ended : "date" !!}</small>
              </div>

              @if($data['professionalexperience_responsibilities'])
              <div class="row_ mt-3">
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
              <div class="row_ mt-3">
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
        @if($data['education'])
        <div class="row_ my-4">
          <hr style="border: 1px solid {{ $data['properties']->color1 }};">
          <div class="row_">
            <h3 class="theme-color text-center my-4" style="color: {{ $data['properties']->color1 }}">EDUCATION</h3>
            @foreach($data['education'] as $education)
          <div class="row_">
            <div class="row_">
              <b>{{ $education->school }} - </b>{{ $education->address }}, {{ $education->country }}
              <br>
              <small>{{ $education->date_started }} - {!! $education->is_current==0 ? $education->date_ended : "date" !!}</small>
            </div>
            @if($data['education_projects'])
            <div class="row_ mt-3">
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
            <div class="row_ my-4">
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
  </body>
  </html>