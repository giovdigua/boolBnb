@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white title" {{--onclick="myFunction()"--}} href="#title">Panoramica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#services">Servizi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#graphic">Statistiche</a>
        </li>
      </ul>
    </div>
    <div class="ul-right col-lg-6">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-share-square"></i> Condividi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-heart"></i> Salva</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="container stacca">
  <div class="row">
    <div class="col-lg-12 scrol-left">
      <div class="title" id="title">
        <h2 class="text-primary">{{$apartment->titolo}}</h2>

        <!-- Button modifica -->
        <button class="btn float-right modif" type="submit" name="button">
            <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">Modifica</a>
        </button>
        <!-- fine -->

      </div>

      <div class="info section">
        <h4>{{__('show-admin.infoTitle')}}</h4>
        <div class="col-lg-12">
            <a href="#">{{$apartment->cita}}</a>
            <p>{{__('show-admin.infoRooms')}}: {{$apartment->stanze}}</p>
            <p>{{__('show-admin.infoBeds')}}: {{$apartment->posti_letto}}</p>
            <p>{{__('show-admin.infoBathrooms')}}: {{$apartment->bagni}}</p>
        </div>
      </div>
      <div class="description section">
        <h4>{{__('show-admin.descriptionsTitle')}}</h4>
        <div class="col-lg-12">
            <p>{{$apartment->descrizione}}</p>
        </div>
      </div>
      <div class="services-container section" id="services">
        <h4>{{__('show-admin.servicesTitle')}}</h4>
        <div class="services">
          <div class="col-lg-12">
            @forelse ($apartment->options as $option)
              {{ $option->nome }}{{ $loop->last ? '' : ',' }}
            @empty
                -
            @endforelse
          </div>
        </div>
      </div>


      <!-- parte da implementare con le immagini -->
      <div class="room section">
        <h4>{{__('show-admin.imgTitle')}}</h4>
        <div class="row container-admin-img container-fluid justify-content-center">
            {{-- @for ($i=0; $i < 5; $i++)
                <div class="col-sm-2">
                  <img class="room-img" src="https://r-cf.bstatic.com/images/hotel/max1024x768/669/66981196.jpg" alt="">
                </div>
            @endfor --}}
            @if (($apartment->images)->isNotEmpty())
            @foreach ($apartment->images as $image)
                @php
                    $pathImage = $image->filename
                @endphp
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <img class="room-img" src="{{ asset('uploads/images/'. $apartment->id . '/' . $pathImage) }}" alt="foto:{{$apartment->title}}">
                </div>
            @endforeach
            @endif
        </div>
      </div>
      <!-- fine -->

      @include('layouts/partials/maps')

      <div id="graphic">
          <h4>{{__('show-admin.statsTitle')}}</h4>
          <div class="row justify-content-center">
              <div class="graphic col">
                <div class="graphic-title">
                  <h5>{{__('show-admin.graphicsTitleVis')}}: {{$apartment->views->count()}}</h5>
                </div>
                <div class="grafici">
                    <div class="grafico1">
                        <div class="canv-container">
                            <canvas id="yourChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
              </div>

              <div class="graphic col">
                <div class="graphic-title">
                  <h5>{{__('show-admin.graphicsTitleMes')}}: {{$apartment->leads()->count()}}</h5>
                </div>
                <div class="grafici">
                    <div class="grafico2">
                       <div class="canv-container">
                           <canvas id="myChart" width="400" height="400"></canvas>
                       </div>
                   </div>
                </div>
              </div>
          </div>
      </div>
      <script>
      var ctx = document.getElementById('yourChart');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
              datasets: [{
                  label: 'visualizzazioni per mese',
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: [0, 10, 5, 2, 20, 30, 45]
              }]
          },

          // Configuration options go here
          options: {}
      });

      var ctx = document.getElementById('myChart');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
              datasets: [{
                  label: 'messaggi per mese',
                  data: [3, 5, 4, 2, 10, 14, 19],
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
      </script>
    </div>
  </div>
</div>
@endsection
