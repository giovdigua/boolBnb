<footer>
    <div class="container">
        <div class="row footer-top mb-3">
            <div class="col-12 col-lg-3">
                <ul class="list-unstyled text-center text-lg-left">
                    <li><strong>Airbnb</strong></li>
                    <li><a href="#">{{__('home-public.footerWork')}}</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">{{__('home-public.footerCondict')}}</a></li>
                    <li><a href="#">{{__('home-public.footerDivers')}}</a></li>
                    <li><a href="#">{{__('home-public.footerAcces')}}</a></li>
                    <li><a href="#">{{__('home-public.footerInfoCont')}}</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3">
                <ul class="list-unstyled text-center text-lg-left">
                    <li><strong>{{__('home-public.footerDiscov')}}</strong></li>
                    <li><a href="#">{{__('home-public.footerAffidSic')}}</a></li>
                    <li><a href="#">{{__('home-public.footerTravCred')}}</a></li>
                    <li><a href="#">{{__('home-public.footerCity')}}</a></li>
                    <li><a href="#">{{__('home-public.footerTravWork')}}</a></li>
                    <li><a href="#">{{__('home-public.footerActiv')}}</a></li>
                    <li><a href="#">Airbnbmag</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3">
                <ul class="list-unstyled text-center text-lg-left">
                    <li><strong>{{__('home-public.footerOsp')}}</strong></li>
                    <li><a href="#">{{__('home-public.footerWhy')}}</a></li>
                    <li><a href="#">{{__('home-public.footerRacc')}}</a></li>
                    <li><a href="#">{{__('home-public.footerHospit')}}</a></li>
                    <li><a href="#">{{__('home-public.footerHospResp')}}</a></li>
                    <li><a href="#">Community Center</a></li>
                    <li><a href="#">{{__('home-public.footerOff')}}</a></li>
                    <li><a href="#">Open Homes</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3">
                <ul class="list-unstyled text-center text-lg-left">
                    <li><strong>{{__('home-public.footerAss')}}</strong></li>
                    <li><a href="#">{{__('home-public.footerHelp')}}</a></li>
                    <li><a href="#">{{__('home-public.footerServAss')}}</a></li>
                    {{-- after con label nuovo --}}
                </ul>
            </div>
        </div>
        <div class="row footer-bottom pt-3 text-center">
            <div class="col-12 col-xl-4 mb-3 float-xl-right">
              @php //per visualizzare il nome del locale
              $locale = App::getLocale();
              if (App::isLocale('en')) {
                  $footercurrentLocale = 'EN';
              }
              if (App::isLocale('it')) {
                  $footercurrentLocale = 'IT';
              }
              @endphp
                <a class="d-md-inline" href="#"><i class="fas fa-globe"></i></i>{{$footercurrentLocale}}</a>
                <ul class="list-inline social-icon d-none d-sm-none d-md-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-xl-4 float-xl-left">
                <span><a href="#"><i class="fab fa-airbnb"></i></a>© 2020 Airbnb, Inc. All rights reserved.</span>
            </div>
            <div class="col-12 col-xl-4 float-xl-left">
                <span><a href="{{ route('termini-privacy') }}">{{__('home-public.footerPrivacy')}}</a></span>
                {{-- <span>- <a href="{{ route('termini-privacy') }}#list-privacy"> Privacy</a></span> --}}
            </div>

        </div>
    </div>
</footer>
