@section('modal')
  <div class="modal fade modal-view">
    <div class="modal-dialog" style="width:75%;">
      <div class="modal-content">
          <div class="col-md-1">
            <div class="left-arrow">
              <i class="fa fa-chevron-left fa-2x"></i>
            </div>
          </div>
          <div class="col-md-7 center-right-side" style="border-radius:6px;margin-right:15px;">
            <div class="mv-title">
              <button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-star"></span> Star
</button>
            </div>
            <div class="fluid-container mv-img">
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div>  
            </div>
            <div class="fluid-container mv-img-footer">
              <p>Upload bởi tùng</p>
            </div>
          </div>
          <div class="col-md-3 center-left-side">
            <div class="fluid-container cls-title">
              <img src="vendors/img/5.jpg" height="38" width="38" class="logo-profile">
              <div class="cls-user">
                <p class="cls-board">hh</p>
                <p class="cls-name">HoTung</p>
              </div>
            </div>
            <div class="row fluid-container cls-album">
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="vendors/img/5.jpg" class="box-img"/>
              </div> 
            </div>
          </div>
          <div class="col-md-3 mv-map">
            <div id="map-detail"></div>
          </div>
          <div class="col-md-1 col-right-arrow">
            <div class="right-arrow">
              <i class="fa fa-chevron-right fa-2x"></i>
            </div>
          </div>
          <div class="col-md-7 col-md-offset-1 mv-cmt">
            
          </div>
          <div class="col-md-10 col-md-offset-1 mv-related-post">
              <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                  <h3>Title</h3>
                  <p>Content Here</p>
                  <p>Content Here</p>    
                  <p>Content Here</p>
                </div>
              </div>
              <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
              </div>
              <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Heading</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
              </div>   
          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>

            function initMap(lat, lng) {
                var myLatLng = new google.maps.LatLng(lat, lng);
                var options = {
                    zoom: 18,
                    
                    center: myLatLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var mapdetail = new google.maps.Map(document.getElementById('map-detail'), options);           

              
                var name = "Place.name";
                var infowindow = new google.maps.InfoWindow({
                    content: name
                });
                var marker = new google.maps.Marker({
                    position: {lat: lat, lng: lng},
                    map: mapdetail,
                    title: name,
                    draggable: true
                });
            }    
        </script>
{{-- @stop  --}}
