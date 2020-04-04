@extends('layouts.public')

@section('content')
    <div class="container admin-container terms-privacy">
        <div class="row mt-3">
          <div class="col-4 mt-5 mb-5">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-terms-list" data-toggle="list" href="#list-terms" role="tab" aria-controls="terms">Termini del Servizio</a>
              <a class="list-group-item list-group-item-action" id="list-nondiscrimination-list" data-toggle="list" href="#list-nondiscrimination" role="tab" aria-controls="nondiscrimination">Politiche di non discriminazione</a>
              <a class="list-group-item list-group-item-action" id="list-payments-list" data-toggle="list" href="#list-payments" role="tab" aria-controls="payments">Termini di Pagamento</a>
              <a class="list-group-item list-group-item-action" id="list-privacy-list" data-toggle="list" href="#list-privacy" role="tab" aria-controls="privacy">Informativa sulla Privacy</a>
              <a class="list-group-item list-group-item-action" id="list-guarantee-list" data-toggle="list" href="#list-guarantee" role="tab" aria-controls="guarantee">Garanzia Host</a>
              <a class="list-group-item list-group-item-action" id="list-refund-list" data-toggle="list" href="#list-refund" role="tab" aria-controls="refund">Rimborso Ospite</a>
            </div>
          </div>
          <div class="col-8 mt-5 mb-5">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-terms" role="tabpanel" aria-labelledby="list-terms-list">
                  <h2 class="text-primary">Termini del Servizio per Utenti europei</h2>
                     <p> Leggi attentamente i presenti Termini del Servizio per Utenti europei (“Termini”) in quanto forniscono informazioni importanti riguardanti diritti, rimedi giuridici e obblighi pertinenti all’utente. Accedendo o utilizzando la Piattaforma Airbnb, accetti di rispettare e di essere vincolato dai presenti Termini.</p>
              </div>
              <div class="tab-pane fade" id="list-nondiscrimination" role="tabpanel" aria-labelledby="list-nondiscrimination-list">
                  <h2 class="text-primary">Politiche di non discriminazione</h2>
                  <p>Il nostro impegno a favore dell'inclusione e del rispetto tra membri
              L'essenza di Airbnb è quella di essere una community aperta che facilita gli scambi internazionali e rende possibili esperienze importanti e condivise tra persone di tutto il mondo. Di tale community fanno parte milioni di utenti, provenienti in pratica da ogni Paese del globo. La composizione della community è estremamente varia e i suoi membri hanno culture, valori e regole diversissimi tra loro.</p>
              </div>
              <div class="tab-pane fade" id="list-payments" role="tabpanel" aria-labelledby="list-payments-list">
                  <h2 class="text-primary">Termini del Servizio di Pagamento</h2>
                  <p>Leggi attentamente i presenti Termini del Servizio di Pagamento (“Termini di Pagamento”) in quanto forniscono informazioni importanti riguardanti diritti, rimedi e obblighi dell’utente. Utilizzando i Servizi di Pagamento (come definiti di seguito), l’utente accetta di rispettare e di essere vincolato dai presenti Termini di Pagamento.
              La Sezione 22 dei presenti Termini del Servizio di Pagamento contiene una clausola sull’arbitrato e sulla rinuncia a class action o azioni collettive che si applica a tutti i Membri di Airbnb. Se il paese di residenza dell’utente si trova negli Stati Uniti, tale disposizione si applica a tutte le controversie con Airbnb Payments. Se il paese di residenza dell’utente si trova al di fuori degli Stati Uniti, tale disposizione si applica a qualsiasi azione intentata contro Airbnb Payments negli Stati Uniti. La suddetta clausola si applica alla risoluzione delle controversie con Airbnb Payments. Accettando i presenti Termini di Pagamento, l’utente accetta di essere vincolato a tale clausola sull’arbitrato e sulla rinuncia ad azioni collettive. Si prega di leggerla attentamente.
              Se il paese di residenza dell’utente si trova nello Spazio economico europeo (“SEE”), l’utente può accedere alla piattaforma di risoluzione online delle controversie della Commissione europea qui: https://ec.europa.eu/consumers/odr. Si prega di notare che Airbnb Payments non è impegnata o tenuta a utilizzare un organismo per la risoluzione delle controversie alternativo per risolvere le controversie coi consumatori.</p>
            </div>
            <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                  <h2 class="text-primary">Informativa sulla Privacy</h2>
                  <p>1. INTRODUZIONE <br><br>
                      Grazie per aver scelto di utilizzare Airbnb! La tua fiducia è importante per noi e ci impegniamo a proteggere la privacy e la sicurezza dei tuoi dati personali i. Le informazioni che vengono condivise con noi ci aiutano a fornire un’esperienza di qualità con Airbnb. Abbiamo un teamdedicato alla privacy che è impegnato a proteggere tutti i dati personali che raccogliamo e assicurare che i dati personali siano gestiti correttamente in tutto il mondo.
                      <br><br>
                      La presente Informativa sulla privacy descrive in che modo raccogliamo, utilizziamo, trattiamo e comunichiamo i tuoi dati personali, in relazione al tuo accesso e utilizzo della Piattaforma Airbnb e dei Servizi di Pagamento. Questa Informativa sulla privacy descrive le nostre pratiche relative alla privacy per tutti i siti web, le piattaforme e i servizi collegati agli stessi. Leggi l’Informativa sulla privacy sull’apposito sito.
                      <br><br>
                      1.1 DEFINIZIONI
                      <br><br>
                      I termini che non vengono definiti nella presente Informativa sulla privacy (ad esempio “Annuncio” o “Piattaforma Airbnb”) hanno lo stesso significato descritto nei nostri Termini del Servizio (“Termini”).</p>
            </div>
            <div class="tab-pane fade" id="list-guarantee" role="tabpanel" aria-labelledby="list-guarantee-list">
                  <h2 class="text-primary">Termini e condizioni della Garanzia dell’Host</h2>
                  <p>Importante: Le presenti Condizioni della Garanzia dell’Host contengono una clausola sull’arbitrato e sulla rinuncia a class action o azioni collettive che si applica a tutti i Membri di Airbnb. Se risiedi negli Stati Uniti, tale disposizione si applica a tutte le controversie con Airbnb. Se risiedi al di fuori degli Stati Uniti, tale disposizione si applica a qualsiasi azione che intenti contro Airbnb negli Stati Uniti. La suddetta clausola si applica alla risoluzione delle controversie con Airbnb. Accettando le presenti Condizioni della Garanzia dell’Host, accetti di essere vincolato da tale clausola sull’arbitrato e sulla rinuncia ad azioni collettive. Si prega di leggerla attentamente.
                      <br>
                      Leggere attentamente le presenti Condizioni della Garanzia dell’ Host in quanto forniscono informazioni importanti riguardanti diritti, rimedi e obblighi per te rilevanti. Pubblicando un Annuncio o utilizzando altrimenti la Piattaforma Airbnb come Host, l’utente accetta di rispettare e di essere vincolato dalle presenti Condizioni della Garanzia del Host.
                      <br>
                      La Garanzia dell’Host (come definita di seguito) non si applica agli Host che offrono un Alloggio in Giappone. L’Assicurazione dell’Host in Giappone troverà applicazione a tali Host.</p>
            </div>
            <div class="tab-pane fade" id="list-refund" role="tabpanel" aria-labelledby="list-refund-list">
                  <h2 class="text-primary">Condizioni di Rimborso Ospiti di Airbnb</h2>
                  <p>I presenti termini e condizioni disciplinano il regolamento di rimborso Ospiti di Airbnb (“Condizioni di Rimborso Ospiti”) e gli obblighi dell'Host associati a tali condizioni. Le Condizioni di Rimborso Ospiti si applicano in aggiunta ai Termini del servizio di Airbnb (“Termini di Airbnb”). Le Condizioni di Rimborso Ospiti sono disponibili per gli Ospiti che prenotano e pagano un Alloggio attraverso la Piattaforma Airbnb, interessati da un Problema di viaggio (come definito di seguito). I presenti termini non si applicano ai rimborsi per le Prenotazioni Luxe (come definiti dalle Condizioni di Rimborso Ospiti di Airbnb Luxe). I diritti dell'Ospite in base alle presenti Condizioni di Rimborso Ospiti di Airbnb sostituiscono i termini di cancellazione dell'Host.
                      <br>
                      I termini con iniziale maiuscola avranno il significato attribuito loro nei Termini di Airbnb o nei Termini di pagamento, salvo ove diversamente specificato nelle presenti Condizioni di Rimborso Ospiti.
                      <br>
                      Utilizzando la Piattaforma di Airbnb, come Host o come Ospite, l'utente dichiara implicitamente di aver letto le presenti Condizioni di Rimborso Ospiti e di accettarne il vincolo.</p>
            </div>
          </div>
        </div>
    </div>
@endsection
