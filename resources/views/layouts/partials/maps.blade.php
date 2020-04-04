<div class="maps" id="maps">
  <div class="maps-title">
    <h3>{{__('map.mapTitle')}}</h3>
    <p class="card-text mb-3">{{$apartment->indirizzo}}</p>
  </div>
  <div class="maps-location mb-3" id="map">
    <script>
          // tt.setProductInfo('tomtom'. '5.49.1' );
          var ap_coord =  [{{$apartment->lon}}, {{$apartment->lat}}]
          console.log(ap_coord)
          var map = tt.map({
              key: 'begalCOpySZrKc5PeNb372wgWaNLv7oq',
              container: 'map',
              style: 'tomtom://vector/1/basic-main',
              center: ap_coord,
              zoom: 15
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
          var marker = new tt.Marker().setLngLat(ap_coord).addTo(map);
      </script>
  </div>
</div>
