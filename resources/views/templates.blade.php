@include('head')
<body class="body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <form method="get" action="/viewresume">
          {{ csrf_field() }}
          <input type="hidden" value="1" name="templateid"/>
          <div class="card" style="width:400px">
            <img src="https://img.icons8.com/nolan/96/template.png"/>
            <div class="card-body">
              <h4 class="card-title">Orange Joy</h4>
              <p class="card-text">Some example text.</p>
              <button type="submit" class="btn btn-primary">View Resume</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 @include('footer')