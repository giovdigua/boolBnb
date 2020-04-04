@extends('layouts.public')
@section('content')
@include('layouts.partials.navbar')
<div>
  <div class="container-fluid home">
    @include('layouts.partials.book')
  </div>
  <div class="container">
    <div class="row justify-content-center evidence-container">
        <h1>{{__('home-public.HomeTitle')}}</h1>
      <div class="col-sm-12 in-evidenza mx-auto">
        @foreach ($apartments as $apartment)
          @if (($apartment->sponsors)->isNotEmpty())
            @foreach ($apartment->sponsors as $time)
              @php
                  $expired_date = $time->pivot->due_date;
                  // // $current_date = Carbon::now();
                  // // $diff_in_hours = $to->diffInHours($from);
                  $diff_in_hours = now()->diffInHours($expired_date);
              @endphp
              @if (now() <= $expired_date)
          <div class="col-lg-3 col-md-6 text-center evidenceApartment">
            <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
            @if ($apartment->visibilita == 1)
              <div class="apartments-promo">
                  @if (($apartment->images)->isNotEmpty())
                      @php
                          $copertina = $apartment->images->first()->filename
                      @endphp
                  @endif
                  <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento . {{$apartment->title}}">
                {{-- <img class="custom-img" src="{{asset('storage/' . $apartment->img)}}" alt="Immagine appartamento"> --}}
                <h5 class="text-primary font-weight-bold promo-title">{{ $apartment->titolo }}</h5>
              </div>
            @endif
            </a>
          </div>
            @endif
          @endforeach
        @endif
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
