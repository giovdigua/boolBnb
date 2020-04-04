@extends('layouts.public')
@section('content')

  <div class="container text-center contenitoreGrazie">
    <div class="row">
      <div class="col-sm-8 mx-auto grazie">
          <div class="title">
            <h2>{{__('grazie.titleThank')}}.</h2>
          </div>
          <div class="text">
            <h5 class="card-text">{{__('grazie.cardThank')}}</p>
            <a class="btn btn-outline-primary" href="{{ route('public-home') }}">{{__('grazie.bottomThank')}}</a>
          </div>
      </div>
    </div>
  </div>

@endsection
