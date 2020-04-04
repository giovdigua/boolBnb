{{--<section class="container" id="resultApartmentSection">--}}

    @forelse ($apartments as $apartment)
        <div class="col-12 col-sm-9 col-md-5 col-lg-4 d-flex justify-content-center">
            <a href="{{route('apartments.show', $apartment->id)}}" class="card-click text-decoration-none">
                <div class="btn btn-primary card-results">
                    <div class="card-body">
                        @if (($apartment->images)->isNotEmpty())
                            <img class="custom-img" src="{{asset('uploads/images/'. $apartment->id . '/' . $apartment->images->first()->filename)}}" alt="Immagine appartamento . {{$apartment->titolo}}">
                        @else
                            <img class="custom-img" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Immagine appartamento . {{$apartment->titolo}}">
                        @endif
                    <div class="card-text">
                        <h5 class="card-title mt-3 customJS">{{ $apartment->titolo }}</h5>
                        <small>Stanze: {{$apartment->stanze}},  Posti letto: {{$apartment->posti_letto}}, Bagni: {{$apartment->bagni}}</small>
                        <p class="small-text smallJS">{{$apartment->indirizzo}}</p>
                    </div>
                </div>
                </div>
            </a>
        </div>

    @empty
        <p class="text-center">Non ci sono ancora appartamenti da mostrare</p>
    @endforelse
      <div class="paginate mx-auto mt-3">
        {{$apartments->links()}}
      </div>
<script type="text/javascript">
  tagliaTesto('.customJS', 15); //applico la funzione al titolo della card in index apartments (lato public)
  tagliaTesto('.smallJS', 20); //applico la funzione all'indirizzo della card in index apartments (lato public)
  tagliaTesto('.promo-title', 15); //applico la funzione al titolo degli appartamenti in promozione

  function tagliaTesto(classeTesto, numeroCaratteri) { //prende in pasto la classe del testo da tagliare e il numero di caratteri da tenere prima del taglio (CONSIGLIO: dare una classe a parte solo per poter utilizzare questa funzione, così si evitano casini nel caso la classe si ripeta da un'altra parte)
    $(classeTesto).each(function() { //ciclo tutti i titoli di ogni card
      var customLenght = $(this).text(); //mi prendo il contenuto di ogni titolo
      if (customLenght.length >= numeroCaratteri) { //se il numero di caratteri di quel titolo è maggiore o uguale a 15
        var cardSlice = $(this).text().slice(0, numeroCaratteri) + '...'; //del testo di ogni titolo prendo solo i primi 15 caratteri e ci aggiungo in fine 3 punti
        $(this).text(cardSlice); //sostituisco il testo di ogni titolo con il testo modificato
      }
    });
  }
</script>
