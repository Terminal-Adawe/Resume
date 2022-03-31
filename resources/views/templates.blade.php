@include('head')
<body class="body">
  <div class="container-fluid">
    <div class="row">
      @foreach($data['templates'] as $template)
      <div class="col-3">
        <form method="get" action="/viewresume">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $template->template_id }}" name="templateid"/>
          <div class="card" style="width:400px">
            <img src="{{ $template->image }}"/>
            <div class="card-body">
              <h4 class="card-title">{{ $template->template_name }}</h4>
              <p class="card-text">{{ $template->description }}</p>
              <button type="submit" class="btn btn-primary">View Resume</button>
            </div>
          </div>
        </form>
      </div>
      @endforeach
    </div>
  </div>
 @include('footer')