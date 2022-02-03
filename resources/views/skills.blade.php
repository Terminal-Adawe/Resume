@extends('layouts.app')

@section('content')
<body class="body" style="background-image: url({{ asset('images/Subtle-Prism4.svg') }}); background-size: cover;">

 @include('progress')


  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12">
      </div>

      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="card input-div-card">
          <div class="card-header">
             <h2>Skills</h2>
             <p>What are you particularly good at?</p>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                  <form action="/saveskill" class="needs-validation" id="form2"  method="post" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="0" id="hiddencheck" name='hiddencheck'>
                    <div class="form-group">
                      <label for="skill">Skill:</label>
                      <input type="text" id="skill" placeholder="Enter Skill" name="skill" required>
                    </div>

                    <div class="row my-2">
                      <div class="col">
                          <button type="submit" class="stylessbutton addtab"><img src="https://img.icons8.com/officel/40/000000/add.png"/> Add Skill</button>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col">
                        <button type="button" class="stylessbutton" id="next"><img src="https://img.icons8.com/ultraviolet/40/000000/circled-chevron-right.png"/>Add Hobbies</button>
                      </div>
                      <div class="col">
                        <button type="button" class="stylessbutton" id="viewResume"><img src="https://img.icons8.com/color/48/000000/submit-progress--v1.png"/> View Resume</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-1 col-sm-1">
        <div class="row input-div-card">
          List of skills
        </div>
        @foreach($data['skills'] as $skill)
        <div class="card text-white mt-1" style="background-color: #85c1e9">
          <div class="card-body">{{ $skill->skill }}</div>
        </div>
        @endforeach
      </div>

      <div class="col-lg-2 col-md-2 col-sm-12">
        <a href="https://icons8.com/icon/eLDQ6zxrIhcP/add">Add icon by Icons8</a>
      </div>
    </div>
  </div>
@endsection