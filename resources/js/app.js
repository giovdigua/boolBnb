/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    // -----se non ci sono promo non far apparire promo-section -----------//
    // if (!$('.row.promo').is(':empty')) {
    //     console.log('sono pieno');
    //     $('.row.promo').addClass('promo-section');
    // }
    // else {
    //     console.log('sono vuoto');
    //     $('.row.promo').css('display','none');
    // }
    // if ($('.row.promo').is(':empty')) {
    //     console.log('sono vuoto');
    //     $('.row.promo').css('display','none');
    // }
    // $('.row.promo:empty').css('display','none');
    // -----end non far apparire promo-section -----------//

  // -----NAVBAR AND FORM-----------//
  $(window).on('scroll', function(e) { //quando vado a fare scroll con il mouse
  st = $(this).scrollTop(); //imposto la posizione di scorrimento
  //console.log(st);
  if (st > 80) { //se la posizione di scorrimento è maggiore a 80px
    $('.home-navbar').addClass('change-prop'); //cambio le proprieta  della navbar
    $('.info-room-navbar').slideDown();
    $('.logoBlue').slideDown(); //appare il logo blue
  } else { //altrimenti (se faccio scroll in alto)
    $('.logoBlue').hide(); //scompare il logo blue
    $('.home-navbar').removeClass('change-prop'); //rimetto le proprieta  della navbar come prima
    $('.info-room-navbar').slideUp();
    $('.info-room-navbar .nav-item').removeClass('active');
  }
  prevTop = st; //la posizione iniziale sulla posizione corrente sulla pagina, diventa la posizione di scorrimento
  // if ($(window).width() > 996) { //se le dimensioni del display sono superiori a 996px
  //   if (st > 1000) { //se si fa scroll oltre i 900px
  //     $('.card-scroll').css('margin-top','700px'); //la card a lato scende fino in fondo
  //   } else {
  //     $('.card-scroll').css('margin-top','0'); //altrimenti risale
  //   }
  // }
});
// -----NAVBAR AND FORM END-----------//


//---------ACTIVE SU NAVBAR BLU-------------//
$('.info-room-navbar .nav-item').click(function(){
  $('.info-room-navbar .nav-item').removeClass('active');
    $(this).addClass('active');
});
//---------ACTIVE SU NAVBAR BLU END-------------//


// -----FILTERS -----------//
// if ($(window).width() > 768) { //se le dimensioni del display sono superiori a 768px
  $('.show-filters').on( "click", function(){ //al click sul pulsante "Filtri"
    $('.filters-container').slideToggle(); //appare il riquadro delle opzioni
  });
// }
// -----FILTERS END-----------//

//--------CAROUSEL------------//
// $(".leftArrow").click(function () { //al click sul pulsante di sinistra
//   var leftPos = $('.previev').scrollLeft();
//   $(".previev").animate({scrollLeft: leftPos - 500}, 800); //sottraggo 500px alle foto
// });
// $(".rightArrow").click(function () { //al click sul pulsante di destra
//   var leftPos = $('.previev').scrollLeft();
//   $(".previev").animate({scrollLeft: leftPos + 500}, 800); //aggiungo 500px alle foto
// });
//--------CAROUSEL END------------//

// -----MESSAGGI-----------//
$('.message-recev').on( "click", function(){ //quando si clicca sul div del mittente
  if($(this).siblings('.mex-info').is(':visible')){ //se il messaggio è aperto
      $('.mex-info').slideUp(); // chiudo il messaggio
  } else { // se non è aperto
      $('.mex-info').slideUp(); //chiudo prima tutti i messaggi aperti
      $(this).siblings().slideToggle(); //e poi apro il messaggio del mittente cliccato
  }
});
// -----MESSAGGI END-----------//

// -----MODAL-----------//
var modal = document.getElementById("myModal"); // Prendo l'id del modal
var btn = document.getElementById("myBtn"); // Prendo l'id del pulsante che aprirà il modal
var span = document.getElementsByClassName("close")[0];// Prendo la classe dello span con la x per la chiusura del modal
var pValuta = $('.valuta');
modalChangeElement(modal, btn, span, pValuta); //chiamo la mia funzione passandogli le variabili appena create
var modalLang = document.getElementById("myModal-lang"); // Prendo l'id del modal
var btnLang = document.getElementById("myBtn-lang"); // Prendo l'id del pulsante che aprirà il modal
var spanLang = document.getElementsByClassName("close-lang")[0];// Prendo la classe dello span con la x per la chiusura del modal
var pLanguage = $('.language');
modalChangeElement(modalLang, btnLang, spanLang, pLanguage); //chiamo la mia funzione passandogli le variabili appena create


function modalChangeElement(modalVar, buttonVar, spanVar, pVar) { //funzione che prende in pasto 4 variabili:
  //modalVar= id del modal che si dovrà aprire
  //buttonVar= id del pulsante che aprirà il modal
  //spanVar= classe dello span contenente la X per la chiusura del modal
  //pVar= la classe del p da selezionare
  buttonVar.onclick = function() { // Quando l'utente clicca sul pulsante
    modalVar.style.display = "block"; // si apre il modal
  }
  spanVar.onclick = function() { // Quando l'utente clicca sulla X
    modalVar.style.display = "none"; // si chiude il modal
  }
  window.onclick = function(event) { //OPZIONALE: Quando l'utente clicca su qualsiasi punto al di fuori del modal
    if (event.target == modalVar) { //Il modal si chiude
      modalVar.style.display = "none";
    }
  }
  $(pVar).on('click', function(){ //Quando l'utente clicca su un p all'interno del modal
    var current = $(this).text(); //prendo il contenuto del p cliccato
    $(buttonVar).text(current); // lo vado a sostituire nella navbar
    modalVar.style.display = "none"; // si chiude il modal
  });
}
// -----MODAL END-----------//

// -----CARD TITLE SLICE-----------//

tagliaTesto('.customJS', 15); //applico la funzione al titolo della card in index apartments (lato public)
tagliaTesto('.smallJS', 20); //applico la funzione all'indirizzo della card in index apartments (lato public)
tagliaTesto('.customAdminJS', 30); //applico la funzione al titolo della card in index apartments (lato admin)
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
// -----CARD TITLE SLICE  END-----------//

// -----FORM VALIDATION BOOTSTRAP-----------//
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
// -----FORM VALIDATION BOOTSTRAP END-----------//
// document.addEventListener("keydown", function(event) {
//   console.log(event.which);
// })


var lat = 0;
var lon = 0;


  $("#search-dove").keyup(function () {
    $("#item-list").empty();
     if (($(this).val()).length >= 3) {
       autoComplete($(this).val());
     }
   }); // end keyup search


   $(document).on('click', "li.singleAddress" , function(){
      lat = $(this).attr('data-lat');
      lon = $(this).attr('data-lon');
      $("#search-dove").val($(this).text());
      $("#lat").val(lat);
      $("#lon").val(lon);
      $("#item-list").empty();
      console.log(lat);
      console.log(lon);
   }); // end item-list click


   //SELEZIONE DEGLI LI CON I PULSANTI SU E GIU
   // $("#search-dove").keydown(function(event) {
   //   var giu = 40;
   //   var su = 38
   //   if (event.which == giu) {
   //    $("#item-list").children('ul').each(function() {
   //     $(this).children("li.singleAddress").css('color','#3490DC');
   //    });
   //   }
   //   if (event.which == su) {
   //
   //   }
   // });

  //  var ospiti = 1;
  //  $("#exampleFormControlSelect1").change(function(){
  //   ospiti = $(this).val();
  //   console.log(opsiti);
  //   $('#ospiti').val(ospiti);
  // }); //end change select
  //


  $("#via").keyup(function () {
    $("#via-list").empty();
    console.log($(this).val());
     if (($(this).val()).length >= 2) {
       autoCompleteCreate($(this).val());
     }
   }); // end keyup search


   $(document).on('click', 'li.via-address', function(){
     lat = $(this).attr('data-lat-create');
     lon = $(this).attr('data-lon-create');
     $('#via').val($(this).text());
     $("#lat-create").val(lat);
     $("#lon-create").val(lon);
     $("#via-list").empty();
     console.log(lat);
     console.log(lon);
   }); // end autoCompleteCreate

   // -----cambio style al cambio Visibilità-----------//
   $('.no-promo-section .custom-control.custom-switch').click(function(){
       if ($(this).find('input').is(':checked')) {
           $(this).parents('.card').find('.img-thumbnail').removeClass('apt-not-visible');
           $(this).parents('.card').find('h5').removeClass('text-dark');
           $(this).parents('.card').find('#promo-btn').removeClass('disabled');
           $(this).parents('.card').find('.js-switch').text('Visibile');
       } else {
           $(this).parents('.card').find('.img-thumbnail').addClass('apt-not-visible');
            $(this).parents('.card').find('h5').addClass('text-dark');
            $(this).parents('.card').find('#promo-btn').addClass('disabled');
            $(this).parents('.card').find('.js-switch').text('Non visibile');
       }
   });
      // -----cambio style al cambio Visibilità end-----------//

      //---controllo click agg file in forms-----//
      $(".add-product input[type='submit']").click(function(){
          if (images.files.length > 5){
           alert("Puoi inserire al massimo 5 immagini");
          }
          // var $fileUpload = $("input[type='file']");
          //      if (parseInt($fileUpload.get(0).files.length) > 5){
          //         alert("Puoi inserire al massimo 5 immagini");
          //      }
      });
      // $(".add-product input[type='file']").change(function(){
      //     if (images.files.length > 5){
      //      alert("Puoi inserire al massimo 5 immagini");
      //     }
      //     // var $fileUpload = $("input[type='file']");
      //     //      if (parseInt($fileUpload.get(0).files.length) > 5){
      //     //         alert("Puoi inserire al massimo 5 immagini");
      //     //      }
      // });
      //---controllo click agg file in forms-----//

 // autoComplete function
  function autoComplete(query){

    $.ajax({
      url: "https://api.tomtom.com/search/2/geocode/" + query + ".json",
      method: "GET",
      data:{
        key: "begalCOpySZrKc5PeNb372wgWaNLv7oq",
        limit: "5"
      },
      success: function (data) {
            console.log(data)
            if (data.results.length !== 0){
                $("#item-list").empty();
              $("#item-list").append(
                '<ul class="" style="display:block; position:absolute;">'
              );
                for (var i = 0; i < data.results.length ; i++) {
                  $("#search ul").append("<li class='singleAddress' data-lat='" + data.results[i].position.lat + "' data-lon='" + data.results[i].position.lon + "'>" + data.results[i].address.freeformAddress + "</li>");
                }
              $("#item-list").append("</ul>");
            }
          },
          "error": function () {
            // alert("error"); //per il momento commentato per ovviare all'errore in fase di ricerca (da l'erore in console ma la ricerca la effettua comunque)
          } //end error
        }); //end ajax

      } // end function autoComplete

  function autoCompleteCreate(query){

    $.ajax({
      url: "https://api.tomtom.com/search/2/geocode/" + query + ".json",
      method: "GET",
      data:{
        key: "begalCOpySZrKc5PeNb372wgWaNLv7oq",
        limit: "5"
      },
      success: function (data) {
            console.log(data)
            if (data.results.length !== 0){
                $("#via-list").empty();
              $("#via-list").append(
                '<ul class="" style="display:block; position:absolute;">'
              );
                for (var i = 0; i < data.results.length ; i++) {
                  $("#create ul").append("<li class='via-address' data-lat-create='" + data.results[i].position.lat + "' data-lon-create='" + data.results[i].position.lon + "'>" + data.results[i].address.freeformAddress + "</li>");
                }
              $("#via-list").append("</ul>");
            }
          },
          "error": function () {
            // alert("error");
          } //end error
        }); //end ajax

      } // end function autoComplete



  }); // end DOM
