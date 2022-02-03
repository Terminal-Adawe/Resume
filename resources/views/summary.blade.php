@extends('layouts.app')

@section('content')
<body class="body" style="background-image: url({{ asset('images/Subtle-Prism.svg') }}); background-size: cover;">

  @include('progress')

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-12">
      </div>

      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="card input-div-card">
          <div class="card-header">
            <h2>Summary</h2>
            <p>In a nutshell...</p>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                  <form action="/savesummary" class="needs-validation" method="post" id="form2" novalidate>
                    {{ csrf_field() }}
                    <input type="hidden" value="0" id="hiddencheck" name='hiddencheck'>
                    <div class="form-group">
                      <label for="summary">Summary:</label>
                      <textarea rows="5" id="summary" name='summary'>{{ $data['summary']->summary ?? '' }}</textarea>
                    </div>
                    
                    <div class="row">
                      <div class="col">
                          <button type="submit" class="stylessbutton"><img src="https://img.icons8.com/officel/40/000000/add.png"/> Save Summary</button>
                      </div>
                      <div class="col">
                        <button type="button" class="stylessbutton" id="next"><img src="https://img.icons8.com/ultraviolet/40/000000/circled-chevron-right.png"/> Add More</button>
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

      <div class="col-lg-2 col-md-2 col-sm-1">
        
      </div>

      <div class="col-lg-2 col-md-2 col-sm-12">
        <a href="https://icons8.com/icon/eLDQ6zxrIhcP/add">Add icon by Icons8</a>
      </div>
    </div>
  </div>
@endsection