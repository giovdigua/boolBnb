@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="#title">{{__('show-public.navLinkOverv')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#services">{{__('show-public.navLinkServ')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#maps">{{__('show-public.navLinkPos')}}</a>
        </li>
      </ul>
    </div>
    <div class="ul-right col-lg-6">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="far fa-share-square"></i> {{__('show-public.navLinkShare')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="far fa-heart"></i> {{__('show-public.navLinkSave')}}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid room">
  <div class="row">
    <div class="col-lg-12 col-md-12 previev">
      @if (($apartment->images)->isNotEmpty())
        @foreach ($apartment->images as $image)
          @php
          $pathImage = $image->filename
          @endphp
          <div class="col-12 col-md-6 col-lg-6  showImgContainer">
            <img  class="room-img-public" src="{{asset('uploads/images/'. $apartment->id . '/' . $pathImage)}}" alt="foto:{{$apartment->title}}">
          </div>
        @endforeach
        @endif
    </div>

  </div>
</div>
<div class="container" id="title">
  <div class="row">
    <div class="col-lg-7 col-sm-12 scrol-left">
      <div class="title">
        <h2>{{$apartment->titolo}}</h2>
        <div class="user-container float-right">
          <strong>{{__('show-public.infoOwn')}}</strong>
          <p class="text-center">{{$apartment->user->first_name}}</p>
        </div>
      </div>
      <div class="info section">
        <a href="#">{{$apartment->cita}}</a>
        <p>{{__('show-public.infoRooms')}}: {{$apartment->stanze}},  {{__('show-public.infoBed')}}: {{$apartment->posti_letto}}, {{__('show-public.infoBat')}}: {{$apartment->bagni}}</p>
      </div>
      <div class="other-info-container section">
        <div class="other-info">
          <strong><i class="fas fa-home"></i> {{__('show-public.infoHouse')}}</strong>
          <p>{{__('show-public.infoApart')}}</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-broom"></i> {{__('show-public.infoClean')}}</strong>
          <p>{{__('show-public.infoOsp')}}</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-map-marker-alt"></i> {{__('show-public.infoPos')}}</strong>
          <p>{{__('show-public.info100')}}</p>
        </div>
      </div>
      <div class="description section" id="services">
        <h3>{{__('show-public.Desc')}}</h3>
        <p>{{$apartment->descrizione}}</p>
      </div>
      <div class="services-container section">
        <strong>{{__('show-public.Serv')}}</strong>
        <div class="services">
          <div class="col-lg-6">
            @forelse ($apartment->options as $option)
              {{ $option->nome }}{{ $loop->last ? '' : ',' }}
            @empty
                -
            @endforelse
          </div>
        </div>
      </div>
      <div class="other-info-container section">
        <div class="other-info">
          <h2>{{__('show-public.Hosted')}} {{$apartment->user->first_name}}</h2>
        </div>
        <div class="other-info">
          {{__('show-public.hello')}} {{$apartment->user->first_name}}. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
    <div class="col-lg-5 fix-right">
      <div class="card-scroll" >
        <div class="card-body">
          <h3 class="card-title">{{__('show-public.Write')}}</h5>
          <small>* = {{__('show-public.Required')}}</small>
          <form action="{{--inserire la rotta che ti porta alla view grazie--}}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">{{__('show-public.name')}}*</label>
              <input type="text" class="form-control" name='nome' id="name"  placeholder="Nome" required>
            </div>
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name='email_mittente' id="email" placeholder="{{ Auth::user() ? Auth::user()->email : 'email' }}" value="{{ Auth::user() ? Auth::user()->email : '' }}" required>
            </div>
            <div class="form-group">
              <label for="subject">{{__('show-public.obj')}}*</label>
              <input type="text" class="form-control" name='oggetto' id="subject" placeholder="Oggetto" required>
            </div>
            <div class="form-group">
              <label for="message">{{__('show-public.mess')}}*</label>
              <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="messaggio" rows="9" required></textarea>
              <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
            </div>
            <button type="submit" class="btn btn-primary">{{__('show-public.send')}}</button>
            @if(session()->has('message'))
            <div class="alert alert-danger disappear" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>{{ session()->get('message') }}</strong>
            </div>
          @endif
          </form>
        </div>
      </div>
    </div>
    <div class="col-12">
      @include('layouts/partials/maps')
    </div>
  </div>
</div>
@endsection
