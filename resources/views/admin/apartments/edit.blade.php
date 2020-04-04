{{-- estendi layout del template admin --}}
@extends('layouts.admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-8 add-product">
                <h1 class="text-center pb-3">{{__('home-admin.EditTitle')}}</h1>
                <hr>
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> {{__('home-admin.ErrorForm')}}
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                 <form id="create" action="{{ route('admin.apartments.update' , ['apartment' => $apartment->id])}}" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation edit-form" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="titolo">{{__('home-admin.FormTitle')}}</label>
                      {{-- old per recuperare vallue in caso di errore compilazione form --}}
                      <input type="text" class="form-control col-12 col-md-9" id="titolo" placeholder="{{__('home-admin.FormTitle')}}" name="titolo" value="{{ old('titolo', $apartment->titolo) }}" required autofocus>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">Ok!</div>
                      <div class="invalid-feedback col-12 col-md-9 offset-md-3">Aggiungi un titolo</div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="stanze">{{__('home-admin.FormRooms')}}</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="stanze" placeholder="{{__('home-admin.FormRooms')}}" name="stanze" value="{{ old('stanze', $apartment->stanze) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di stanze
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="posti_letto">{{__('home-admin.FormBeds')}}</label>
                        <input type="number" min="1" max="10" class="form-control col-12 col-md-9" id="posti_letto" placeholder="{{__('home-admin.FormBeds')}}" name="posti_letto" value="{{ old('posti_letto', $apartment->posti_letto) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il numero di posti letto
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="bagni">{{__('home-admin.FormBath')}}</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="bagni" placeholder="{{__('home-admin.FormBath')}}" name="bagni" value="{{ old('bagni', $apartment->bagni) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi il numero di bagni
                          </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-12 col-md-3" for="dimensioni">{{__('home-admin.FormMq')}}</label>
                        <input type="number" min="1" class="form-control col-12 col-md-9" id="dimensioni" placeholder="{{__('home-admin.FormMq')}}" name="dimensioni" value="{{ old('dimensioni', $apartment->dimensioni) }}" required>
                        <div class="valid-feedback col-12 col-md-9 offset-md-3">
                            Ok!
                          </div>
                          <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                            Aggiungi la dimensione in metri quadrati
                          </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="descrizione">{{__('home-admin.FormDescr')}}</label>
                      <textarea type="text" class="form-control col-12 col-md-9" id="descrizione" placeholder="{{__('home-admin.FormDescr')}}" name="descrizione" rows="5" required>{{ old('descrizione', $apartment->descrizione) }}</textarea>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi una descrizione
                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="indirizzo">{{__('home-admin.FormAddress')}}</label>
                      <input type="text" class="form-control col-12 col-md-9" id="via" placeholder="{{__('home-admin.FormAddress')}}" name="indirizzo" value="{{$apartment->indirizzo }}" autocomplete="off" required>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi l'indirizzo
                        </div>
                        <input id="lat-create" type='hidden' name='lat' value="{{$apartment->lat}}">
                        <input id="lon-create" type='hidden' name='lon' value="{{$apartment->lon}}">
                        <div id="via-list">

                        </div>
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="paese">{{__('home-admin.FormCountry')}}</label>
                      <input type="text" class="form-control col-12 col-md-9" id="paese" placeholder="{{__('home-admin.FormCountry')}}" name="paese" value="{{ old('paese', $apartment->paese) }}" required>
                      <div class="valid-feedback col-12 col-md-9 offset-md-3">
                          Ok!
                        </div>
                        <div class="invalid-feedback col-12 col-md-9 offset-md-3">
                          Aggiungi il Paese
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-12 col-md-3">{{__('home-admin.FormService')}}</label>
                        <div class="col-12 col-md-9 d-flex flex-row flex-wrap">
                            @foreach ($options as $option)
                                <div class="col-12 col-md-6">
                                    <input class="form-check-input" type="checkbox" id="nome_{{ $option->id }}" name="nome_id[]" value="{{ $option->id }}"
                                    @if ($errors->any())
                                        {{ in_array($option->id, old('nome_id', array())) ? 'checked' : '' }}
                                    @else
                                        {{ ($apartment->options)->contains($option) ? 'checked' : '' }}
                                    @endif >
                                    <label class="form-check-label" for="nome_{{ $option->id }}">
                                        {{ $option->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="custom-file">
                          <input type="file" multiple="multiple" name="images[]" class="custom-file-input" id="customFile" lang="it" accept="image/png, image/jpeg">
                          <label class="custom-file-label" for="customFile">{{__('home-admin.FormFiles')}}</label>
                        </div>
                        {{-- se avevo caricato img mostramela --}}
                        @if (($apartment->images)->isNotEmpty())
                        @foreach ($apartment->images as $image)
                            @php
                                $pathImage = $image->filename
                            @endphp
                            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                <img class="room-img" src="{{ asset('uploads/images/'. $apartment->id . '/' . $pathImage) }}" alt="foto:{{$apartment->title}}">
                            </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-2">Immagine 2</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-2" name="img-2">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-3">Immagine 3</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-3" name="img-3">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-4">Immagine 4</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-4" name="img-4">
                    </div>
                    <div class="row form-group">
                      <label class="col-12 col-md-3" for="img-5">Immagine 5</label>
                      <input class="col-12 col-md-9" type="file" class="form-control-file" id="img-5" name="img-5">
                    </div> --}}
                    <hr>
                    <div class="row form-group d-flex justify-content-center">
                        <div class="custom-control custom-switch">
{{--                            <input type="checkbox" class="custom-control-input" id="visibilita" {{($apartment->visibilita == "1") ? 'checked' : ""}}>--}}
{{--                            <label class="custom-control-label" for="visibilita">Visibilità annuncio</label>--}}
                            <input type="checkbox"  name="visibilita" {{$apartment->visibilita == 1 ? 'checked' : ''}} class="js-switch">
                            <label class="js-switch" for="visibilita">{{__('home-admin.FormVisible')}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">{{__('home-admin.FormEditBtn')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' ,color:'#237DC7'});
        });

        $('input[type="file"]').on("change", function() {
            let filenames = [];
            let files = document.getElementById("customFile").files;
              filenames.push("File caricati: " + files.length);
            $(this).next(".custom-file-label").html(filenames);
            if (files.length > 5) {
                alert('Non puoi caricare più di 5 immagini');
                $('input[type="file"]').val('');
                $('.custom-file-label').html('Carica fino a 5 immagini');
            }
          });
    </script>
@endsection
