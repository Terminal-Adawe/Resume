@extends('layouts.app')

@section('content')
<body class="body" style="background-image: url({{ asset('images/Subtle-Prism3.svg') }}); background-size: cover;">

 @include('progress')

  <div class="container-fluid">
    <input type="hidden" value="education" id="form_type">
      <div id="form">
      </div>
  </div>
@endsection