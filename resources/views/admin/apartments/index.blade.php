{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')
    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="float-left">{{__('home-admin.IndexAdminTitle')}}</h1>
                <a class="btn btn-info float-right" href="{{ route('admin.apartments.create') }}">{{__('home-admin.BtnAddApart')}}</a>
            </div>
        </div>
        <hr>
    {{-- se ci sono elementi in Apartment_sponsor stampali in questo div --}}
        <div class="row promo-section">
            <div class="col-12">
                <h3 class="mb-3">Appartamenti in promozione</h3>
            </div>
            @forelse ($apartments as $apartment)
                @if (($apartment->sponsors)->isNotEmpty())
                    @foreach ($apartment->sponsors as $time)
                        @php
                            $expired_date = $time->pivot->due_date;
                            // // $current_date = Carbon::now();
                            // // $diff_in_hours = $to->diffInHours($from);
                            $diff_in_hours = now()->diffInHours($expired_date);
                        @endphp
                        @if (now() <= $expired_date)
                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <div class="card-img">
                                        <a class="text-decoration-none" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                                        @if (($apartment->images)->isNotEmpty())
                                            @php
                                                $copertina = $apartment->images->first()->filename
                                            @endphp
                                        @endif
                                        <img class="img-thumbnail" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento . {{$apartment->title}}">
                                    </div>
                                    <div class="card-body">
                                            <h5 class="card-title customAdminJS">{{ $apartment->titolo }}</h5>
                                        </a>
                                        <div class="row">
                                            <div class="col-12 col-xl-6 btn-apartment-crud">
                                                <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">{{__('home-admin.BtnEdit')}}</a>
                                            </div>
                                            <div class="col-12 col-xl-6 btn-apartment-crud">
                                                <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}#graphic" class="btn btn-primary float-right">{{__('home-admin.BtnChart')}}</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                          {{-- @foreach ($apartment->sponsors as $time) --}}
                                            <div class="col-12 btn-apartment-crud">
                                                <a href="#" class="btn btn-primary disabled" id="promo-btn">{{__('home-admin.AnnPromo')}} {{$diff_in_hours}} {{__('home-admin.AnnHours')}}</a>
                                            </div>
                                        {{-- @endforeach --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @empty
                <div class="col-12 mt-2 mb-2">
                    <div class="d-flex align-items-center flex-column text-center" >
                        <h4>{{__('home-admin.NoApartPromo')}}</h4>
                    </div>
                </div>
            @endforelse
        </div>
        <hr>

        <div class="row no-promo-section mt-3 mb-3">
            @forelse ($apartments as $apartment)
                @foreach ($apartment->sponsors as $time)
                    @php
                        $expired_date = $time->pivot->due_date;
                        // // $current_date = Carbon::now();
                        // // $diff_in_hours = $to->diffInHours($from);
                        $diff_in_hours = now()->diffInHours($expired_date);
                    @endphp
                @endforeach
                    @if ((($apartment->sponsors)->isEmpty()) || (($apartment->sponsors)->isNotEmpty() && now() > $expired_date))
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="card">
                                <div class="card-img">
                                     <a class="text-decoration-none" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">

                                         @if (($apartment->images)->isNotEmpty())
                                             @php
                                                 $copertina = $apartment->images->first()->filename
                                                 // $copertina = $apartment->images()->first()
                                             @endphp
                                         @endif
                                    @if ($apartment->visibilita == 1)
                                        <img class="img-thumbnail" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento">
                                    @else
                                        <img class="img-thumbnail apt-not-visible" src="{{asset('uploads/images/'. $apartment->id . '/' . $copertina)}}" alt="Immagine appartamento">
                                    @endif
                                </div>
                              <div class="card-body">
                                      @if ($apartment->visibilita == 1)
                                          <h5 class="card-title customAdminJS">{{ $apartment->titolo }}</h5>
                                      @else
                                          <h5 class="card-title text-dark">{{ $apartment->titolo }}</h5>
                                      @endif

                                  </a>
                                <div class="row d-lg-flex align-items-lg-center">
                                    <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                        <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn btn-primary float-left">{{__('home-admin.BtnEdit')}}</a>
                                    </div>
                                    <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                        <a id="stat-btn" href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}#graphic" class="btn btn-primary float-right">{{__('home-admin.BtnChart')}}</a>
                                    </div>
                                    <div class="col-12 col-xl-4 d-flex justify-content-center btn-apartment-crud">
                                        <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id])}}" method="post" onclick="return confirm('Sei sicuro di voler eliminare questo appartamento?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">{{__('home-admin.BtnDelete')}}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 btn-apartment-crud">
                                        @if ($apartment->visibilita == 1)
                                            <a href="{{ route('admin.apartments.promo', $apartment->id)}}" class="btn btn-primary" id="promo-btn">{{__('home-admin.BtnPromo')}}</a>
                                        @else
                                            <a href="{{ route('admin.apartments.promo', $apartment->id)}}" class="btn btn-primary disabled" id="promo-btn">{{__('home-admin.BtnPromo')}}</a>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-3 d-flex justify-content-center">
                                        <div class="custom-control custom-switch">
            {{--                              <input type="checkbox" class="custom-control-input input-visibilita" id="visibilita-{{$apartment->id}}" data-id="{{$apartment->id}}" {{($apartment->visibilita == "1") ? 'checked' : ""}}>--}}
            {{--                              <label class="custom-control-label" for="visibilita-{{$apartment->id}}">Visibilità annuncio</label>--}}
                                            <input type="checkbox" data-id="{{ $apartment->id }}" name="visibilita" class="js-switch" {{ $apartment->visibilita == 1 ? 'checked' : '' }}>
                                            @if ($apartment->visibilita == 1)
                                                <label class="js-switch" for="visibilita-{{$apartment->id}}">{{__('home-admin.Visible')}}</label>
                                            @else
                                                <label class="js-switch" for="visibilita-{{$apartment->id}}">{{__('home-admin.NotVisible')}}</label>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endif
            @empty
                <div class="col-12 mt-5 mb-5">
                    <div class="d-flex align-items-center flex-column text-center" >
                        <h4>{{__('home-admin.NoApart')}}</h4>
                        <a class="btn btn-info btn-lg" href="{{ route('admin.apartments.create') }}">{{__('home-admin.BtnAddApart')}}</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' ,color:'#237DC7'});
        });
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let visibilita = $(this).prop('checked') === true ? 1 : 0;
                let apartmentId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.apartments.change.status') }}',
                    data: {'visibilita': visibilita, 'apartment_id': apartmentId},
                    success: function (data) {
                        console.log(data.message);
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>
@endsection
