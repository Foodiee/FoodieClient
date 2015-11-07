@section('modal')
  <div class="modal fade modal-upload">
    <div class="modal-dialog" style="width:65%;">
      <div class="modal-content">
          <div class="col-md-6 left-upload-modal">
            <div class="wf-box" style="margin-top:25px;">
              <img src="vendors/img/5.jpg" id="blah">
              <div class="content">
                <textarea placeholder='Viết chú thích' class="description"></textarea>
                <i class="fa fa-map-marker fa-2x locate-map"></i>
                <div class="locate-text" style="display:none;"></div>
                <input id="pac-input" class="controls" type="text" placeholder="Search Box" style="display:none;">
                <div id="map" style="display:none;"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 right-upload-modal">
            <div class="row" style="margin-top:20px;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="row" style="margin-top:20px;">
              <ul class="list-group ajbh-list-hastag2">
                  <li class="list-group-item" style='float:left;'>BBQ</li>
                  <li class="list-group-item" style='float:left;'>BingSu</li>
                  <li class="list-group-item" style='float:left;'>BBQ</li>
                </ul>
            </div>
            <div class="row" style="margin-top:20px;">
              <div class="col-md-10">Chọn một bảng</div>
              <div class="col-md-2">
              </div>
            </div>
            <input type="text" class="form-control" placeholder="Search" style="margin-top:30px;">
            <div class="row" style="margin-top:30px;border-radius:6px;">
              <img src="vendors/img/5.jpg" width="50" height="50">
              <span style='margin-left:10px;'>Album 1</span>
              <div style="cursor:pointer;" class="pinit" data-option='1'>Pin it</div>
            </div>
            <div class="row" style="margin-top:30px;border-radius:6px;">
              <img src="vendors/img/5.jpg" width="50" height="50">
              <span style='margin-left:10px;'>Album 1</span>
            </div>
            <div class="row" style="margin-top:30px;border-radius:6px;">
              <img src="vendors/img/red-plus.png" width="50" height="50"> 
              <span style='margin-left:10px;'>Tạo thêm 1 bảng</span>
            </div>
          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    function initAutocomplete() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
             
      // Create the search box and link it to the UI element.
      var input = document.getElementById('pac-input');
      var searchBox = new google.maps.places.SearchBox(input);
      // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      // Bias the SearchBox results towards current map's viewport.
      map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
      });

      var markers = [];
          
      searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
          }));

          if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
          } else {
              bounds.extend(place.geometry.location);
          }

          console.log('ID: ' + place.place_id + ' <br> ' + 'LatLng' + place.geometry.location);

          $('.locate-map').show();
          $('.locate-map').html('tại- '+place.name);
          $('.locate-map').show();
          $('#pac-input').hide();
          $('#map').hide();
        });
        map.fitBounds(bounds);
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFo1vaTwz6NILG9inO-5HOEQ14yYWSf9U&signed&libraries=places"
  async defer></script>
{{-- @stop  --}}
