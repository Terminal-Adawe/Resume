@include('templates.print.printHead')
  <body>
    <div class="container" style="font-size: 14px; font-family: 'Times New Roman'">
    @if($data["personaldetails"])
    <div class="row_ my-4">
      <div class="column75">
        <h1 style="font-size: 50px">{{ $data["personaldetails"]->surname }} {{ $data["personaldetails"]->other_names }}</h1>
      </div>
      <div class="column25">
          <p>
            {{ $data["personaldetails"]->address }}
            <br>
            {{ $data["personaldetails"]->city }}, {{ $data["personaldetails"]->country }}
          </p>
          <p>
            <small><b>{{ $data["personaldetails"]->contact_number_1 }}</b></small>
            <br>
            <small><b>{{ optional($data["personaldetails"])->contact_number_2 }}</b></small>
            <br>
            <small><b>{{ $data["personaldetails"]->email }}</b></small>
          </p>  
      </div>
    </div>
    @endif
    <div class="row_ my-4">
      <div class="column75">
        @if($data["summary"])
          <div class="row_">
            <h5 style="color: {{ $data['properties']->color1 }}">SUMMARY</h5>
            <p>
              {!! nl2br(e($data["summary"]->summary)) !!}
            </p>
          </div>
        @endif
      </div>
      <div class="column25">
          @if($data["skills"])
            <h5 style="color: {{ $data['properties']->color1 }}">SKILLS</h5>
            <ul>
              @foreach($data["skills"] as $skill)
                <li>
                  {{ $skill->skill }} 
                </li> 
              @endforeach
            </ul>
          @endif

          @if($data["hobbies"])
            <h5 style="color: {{ $data['properties']->color1 }}">HOBBIES</h5>
            <ul>
              @foreach($data["hobbies"] as $hobby)
                <li> 
                  {{ $hobby->hobby }}  
                </li>
              @endforeach
            </ul>
          @endif
      </div>
    </div>
    <div class="row_ my-4">
      <div class="column75">
        @if($data["professionalexperience"])
          <div class="row_">
            <h5 style="color: {{ $data['properties']->color1 }}">EXPERIENCE</h5>
            @foreach($data["professionalexperience"] as $experience)
              <b>{{ $experience->company }}, </b>{{ $experience->address }}, {{ $experience->city }} - {{ $experience->role }}
                <br>
              <small>{{ $experience->date_started }} to {!! $experience->is_current==0 ? $experience->date_ended : "date" !!}</small>
              @if($data["professionalexperience_responsibilities"])
                <ul>
                  @foreach($data["professionalexperience_responsibilities"] as $responsibility)
                    @if($responsibility->professional_experience_id == $experience->id )
                      <li>{!! nl2br(e($responsibility->duty)) !!}</li>
                    @endif
                  @endforeach
                </ul>
              @endif
              @if($data["professionalexperience_projects"])
                <ul>
                  @foreach($data["professionalexperience_projects"] as $project)
                    @if($project->professional_experience_id == $experience->id )
                      <li>{!! nl2br(e($project->project)) !!}</li>
                    @endif
                  @endforeach
                </ul>
              @endif
            @endforeach
          </div>
        @endif

        @if($data["education"])
          <div class="row_ my-4">
            <h5 style="color: {{ $data['properties']->color1 }}">EDUCATION</h5>
            @foreach($data["education"] as $education)
              <b>{{ $education->school }}, </b>{{ $education->address }}, {{ $education->country }}
              <br>
              <small>{{ $education->date_started }} to {!! $education->is_current==0 ? $education->date_ended : "date" !!}</small>
              @if($data["education_projects"])
                <ul>
                  @foreach($data["education_projects"] as $project)
                      @if($project->education_id == $education->eid )
                        <li>{!! nl2br(e($project->project)) !!}</li>
                      @endif
                  @endforeach
                </ul>
              @endif
            @endforeach
          </div>
        @endif
      </div>
      <div class="column25">
          
      </div>
    </div>
    </div>
  </body>
  </html>