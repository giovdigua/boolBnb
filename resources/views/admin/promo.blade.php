{{-- recupero template per la pagine admin --}}
@extends('layouts.admin')

{{-- struttura da inserire come content nel yield --}}
@section('content')

    <div class="container admin-container">
        <div class="row pt-5">
            <div class="col-12 col-md-9">
                <h1 class="text-center float-md-left">{{__('home-admin.PromoTitle')}}</h1>
            </div>

            <div class="col-12 col-md-3 d-flex justify-content-center">
                <a class="btn btn-info float-md-right btn-return" href="{{ route('admin.apartments.index') }}">{{__('home-admin.BtnGoBack')}}</a>
            </div>
            <hr class="w-100">
            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif
            <div class="row w-100 mb-5 d-flex justify-content-center">
                <div class="col-8 add-product">
                    <div class="row form-group">
                        <div class="col-12">
                            <p>{{__('home-admin.SelectAdPromo')}} <strong>{{$apartment->titolo}}</strong>:</p>
                        </div>
                    </div>

                    <form id="payment-form" class="" action="{{route('admin.apartments.promo.payment.process')}}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                <input type="radio" id="promo_1" name="promo" value="24" checked>
                                <label for="promo_1"><strong>Basic:</strong> 24h / 2,99€</label><br>
                                <input type="radio" id="promo_2" name="promo" value="72">
                                <label for="promo_2"><strong>Standard:</strong> 72h / 5,99€</label><br>
                                <input type="radio" id="promo_3" name="promo" value="144">
                                <label for="promo_3"><strong>Premium:</strong> 144h / 9,99€</label><br><br>
                            </div>
                        </div>
                        <div class="row form-group payment-info">


                            <div class="col-12 d-flex justify-content-center">
                                <div id="dropin-container"></div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                <input id="nonce" name="apartmentID" value="{{$apartment->id}}"type="hidden" />
                                <button type="submit" class="btn btn-info float-right">{{__('home-admin.ProcessPromo')}}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let form = document.querySelector('#payment-form');

        braintree.dropin.create({
            authorization: "{{ Braintree_ClientToken::generate() }}",
            container: '#dropin-container'
        }, function (createErr, instance) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    {{--$.get('{{ route('admin.apartments.promo.payment.process') }}', {payload}, function (response) {--}}
                    {{--    if (response.success) {--}}
                    {{--        console.log(response)--}}
                    {{--        alert('Payment successfull!');--}}
                    {{--        window.location.replace("/admin/apartments");--}}
                    {{--    } else {--}}
                    {{--        alert('Payment failed');--}}
                    {{--    }--}}
                    {{--}, 'json');--}}
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
