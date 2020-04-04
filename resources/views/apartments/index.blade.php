{{-- PAGINA DEI RISULTATI DI RICERCA --}}
@extends('layouts.public')


@section('content')
    <nav class="nav-options navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="show-filters btn btn-primary btn-sm" href="#">{{__('index-public.filt')}}</a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            {{--      start filter area     --}}
            <div class="filters-container col-sm-12 col-lg-2 col-md-2">
                <h3>{{__('index-public.filt')}}</h3>
                <div class="input-group num-select input-num-size">
                    <select class="custom-select border-custom" id="roomsNumSelect">
                        <option selected>N° {{__('index-public.rooms')}}</option>
                        @for ($i=1; $i <= 10; $i++)
                            <option value="{{$i}}"> {{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="input-group num-select input-num-size">
                    <select class="custom-select border-custom" id="bedsNumSelect">
                        <option selected>N° {{__('index-public.beds')}}</option>
                        @for ($i=1; $i <= 10; $i++)
                            <option value="{{$i}}"> {{$i}}</option>
                        @endfor
                    </select>
                </div>
                @foreach ($options as $option)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input option-check-box" name="optionsCheckBox" id="customCheck{{$option->id}}" value="{{$option->nome}}">
                        <label class="custom-control-label" for="customCheck{{$option->id}}">{{$option->nome}}</label>
                    </div>
                @endforeach
                <div class="cucstom-cuntrol">
                    <p>{{__('index-public.dist')}}: <span id="kmOutput"></span> KM</p>
                    <input id="sliderKM" type="range" name="kmDistance" min="1" max="250" value="25">
                </div>

                <div class="custom-control">
                    <input id="latSearch" type='hidden' name='lat' value="{{$lat}}">
                    <input id="lonSearch" type='hidden' name='lon' value="{{$lon}}">
                    <button id="searchDeepButton" class="apply-filters btn btn-primary">{{__('index-public.apply')}}</button>
                </div>
            </div>
            {{--      end filter area     --}}
            <div class="results-container col-12 col-md-10">
                <div class="row justify-content-center evidence-container">
                    <h1>{{__('home-public.HomeTitle')}}</h1>
                    <div class="col-sm-12 mx-auto evidence">
                        @foreach ($apartmentsAll as $apartment)
                            @if (($apartment->sponsors)->isNotEmpty())
                                @foreach ($apartment->sponsors as $time)
                                    @php
                                        $expired_date = $time->pivot->due_date;
                                        // // $current_date = Carbon::now();
                                        // // $diff_in_hours = $to->diffInHours($from);
                                        $diff_in_hours = now()->diffInHours($expired_date);
                                    @endphp
                                    @if (now() <= $expired_date)
                                        <div class="col-12 col-md-6 col-lg-3 text-center d-flex justify-content-center">
                                            <a href="{{route('apartments.show', $apartment->id)}}"  class="card-click text-decoration-none">
                                                @if ($apartment->visibilita == 1)
                                                    @if ($apartment->images->isNotEmpty())
                                                        <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/'.$apartment->images->first()->filename)}}" alt="Immagine appartamento . {{$apartment->titolo}}">
                                                    @else
                                                        <img class="custom-img" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Immagine appartamento . {{$apartment->titolo}}">
                                                    @endif
                                                    <h5 class="text-white promo-title">{{ $apartment->titolo }}</h5>
                                                @endif
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="results-title col-12">
                    <h1>{{__('index-public.search')}}</h1>
                </div>
                <section class="container" id="resultApartmentSection">
                    @include('layouts.partials.pagination_data')
                </section>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $(document).ready(function() {
            //   Slider in searchsidebar
            let slider = document.getElementById("sliderKM");
            let output = document.getElementById("kmOutput");
            // let container =  $('#resultApartmentSection');
            // let paginator = $('#paginator');
            output.innerHTML = slider.value;

            slider.oninput = function () {
                output.innerHTML = this.value;
            };



            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                console.log('click');
                let page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                let options = [];
                $('.option-check-box').each(function () {
                    if ($(this).is(":checked")) {
                        options.push($(this).val());
                    }
                });


                let latSearch = $('#latSearch').val() ? $('#latSearch').val() : 0.0;
                let lonSearch = $('#lonSearch').val() ? $('#lonSearch').val() : 0.0;
                let circle_radius = $('#sliderKM').val();
                let stanze = $.isNumeric($('#roomsNumSelect').val()) ? $('#roomsNumSelect').val() : 1;
                let posti_letto = $.isNumeric($('#bedsNumSelect').val()) ? $('#bedsNumSelect').val() : 1;


                fetch_data(page,latSearch,lonSearch,circle_radius,options,posti_letto,stanze);
                //fetch_data(page);
            });


            function fetch_data(page,lat,lon,circle_radius,options,posti_letto,stanze)
            {
                $.ajax({
                    //url:"/apartments/search?page="+page+"&lat="+lat+"&lon="+lon+"&circle_radius="+circle_radius+"&options="+options+"&posti_letto="+posti_letto+"&stanze="+stanze,
                    url: '/apartments/search',
                    data: {
                        page: page,
                        lat: lat,
                        lon: lon,
                        circle_radius: circle_radius,
                        options: options,
                        posti_letto: posti_letto,
                        stanze: stanze,

                    },
                    success:function(data)
                    {
                        console.log(data)
                        $('#resultApartmentSection').html(data);
                    },
                    error:function (err) {
                        console.log(err)
                    }
                });
            }



            //   Sidebar search ajax call
            $('#searchDeepButton').click(function (event) {
                event.preventDefault();
                if ($(window).width() < 768) { //se la mediaquery è inferiore a 768px
                  $('.filters-container').slideUp(); //la ricerca filtri scompare
                }
                let options = [];
                $('.option-check-box').each(function () {
                    if ($(this).is(":checked")) {
                        options.push($(this).val());
                    }
                });
                console.log(options)
                let page = $('#hidden_page').val();
                let latSearch = $('#latSearch').val() ? $('#latSearch').val() : 0.0;
                let lonSearch = $('#lonSearch').val() ? $('#lonSearch').val() : 0.0;
                let circle_radius = $('#sliderKM').val();
                let stanze = $.isNumeric($('#roomsNumSelect').val()) ? $('#roomsNumSelect').val() : 1;
                let posti_letto = $.isNumeric($('#bedsNumSelect').val()) ? $('#bedsNumSelect').val() : 1;
                fetch_data(page,latSearch,lonSearch,circle_radius,options,posti_letto,stanze);

            });


        });
    </script>
@endsection
