@extends('layouts.app')

@section('content')
<div class="home_wallpaper" style="background-image: url('{{ asset('images/coporate_workers.png') }}');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-12">

                <div class="card-l">
                    <div class="card-lt"></div>
                    <div class="create-cv-pane">
                        <div class="row info-corner">
                                </div>
                        <div class="row">
                            <div class="col-12">  
                                <div class="row">
                                        <a href="{{ url('/create_cv') }}" class="btn btn-info btn-lg btn-block mt-4 mx-auto" style="width:80%">Create a new CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-10">
                <div class="card-r">
                    <div class="card-rt">
                    </div>
                    <div class="resumes_pane">
                        <div class="container">
                            <div class="row mt-4 mb-1">
                                <button class="btn btn-block btn-danger"><b>Personal Details</b></button>
                            </div>
                            <hr>
                            <div class="row my-4">
                                
                            </div>
                            <div class="row my-4 mx-auto">
                                <span class="mx-auto"><h3>Existing Resumes</h3></span>
                            </div>
                            @foreach($data['resumes'] as $i=>$resume)
                            <div class="row mb-1">
                                <form action="{{ route('existing_resume') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="resume_id" value="{{ $resume->resume_id }}">
                                    <button class="btn btn-block btn-info" type="submit"><b>{{ $resume->title }}</b></button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-sm-1">
            </div>
        </div>
    </div>
</div>
@endsection
