@section('modal')
  <div class="modal fade modal-view" tabindex="-1">
    <div class="modal-dialog" style="width:75%;">
      <div class="modal-content">
          <div class="col-md-1">
            <div class="left-arrow">
              <i class="fa fa-chevron-left fa-2x"></i>
            </div>
          </div>
          <div class="col-md-7 center-right-side" id="main-post-id" style="border-radius:6px;margin-right:15px;">
            <div class="mv-title keep-open">
              <div class="mv-title-pinit" id="post_pin_btn">
                <span>Đánh dấu</span>
              </div>
              <div id="post_like_btn" class="mv-title-like">
                <em></em>
                <span>Thích</span>
              </div>
              <div id="post_share_btn" class="mv-title-share">
                <em></em>
                <span>Chia sẻ</span>
              </div> 
              <div id="post_send_btn" class="mv-title-send" id="dropdownMenu3" data-toggle="dropdown">
                <em></em>
                <span>Gửi</span>
              </div> 
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3" style="margin-top:26px;">
                <li class="mv-square"></li>
                <li role="presentation">
                  <textarea class="mv-mess" placeholder="Thêm tin nhắn..."></textarea>
                </li>
                <li role="presentation">
                  <ul class="mv-listfr">
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                  </ul>
                </li>
            </ul>
            </div>
            <div class="fluid-container mv-img">
              <div class="wf-box">
                <img id="main-photo-post" src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div>  
            </div>
            <div class="fluid-container mv-img-footer">
              <p id="main-post-description"></p>
              <p>
                 Upload bởi <span id="owner-post"></span>
              </p>
            </div>
          </div>
          <div class="col-md-3 center-left-side">
            <div class="fluid-container cls-title">
              <img src="{{URL::asset('img/5.jpg')}}" height="38" width="38" class="logo-profile">
              <div class="cls-user">
                <p class="cls-board">hh</p>
                <p class="cls-name">HoTung</p>
              </div>
            </div>
            <div class="row fluid-container cls-album">
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
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
            <div class="mv-cmt-item">
              <img src="img/5.jpg" class="logo-profile cmt-avatar">
              <div class="cmt-chat cmt-name">
                <a href="">Tung</a>
              </div>
              <div class="cmt-chat">dáđfsdfsdfd</div>
            </div>
            <div class="mv-cmt-item">
              <img src="img/5.jpg" class="logo-profile cmt-avatar">
              <div class="cmt-chat cmt-name">
                <a href="">Tung</a>
              </div>
              <div class="cmt-chat">dáđfsdfsdfd</div>
            </div>
            <div class="mv-cmt-item">
              <img src="img/5.jpg" class="logo-profile cmt-avatar">
              <div class="cmt-chat cmt-name">
                <a href="">Tung</a>
              </div>
              <div class="cmt-chat">dáđfsdfsdfd</div>
            </div>
            <div class="mv-cmt-item">
              <img src="img/5.jpg" class="logo-profile cmt-avatar">
              <div class="cmt-chat cmt-name">
                <a href="">Tung</a>
              </div>
              <div class="cmt-chat">dáđfsdfsdfd</div>
            </div>
            <div class="mv-cmt-owner">
              <img src="img/5.jpg" class="logo-profile cmt-avatar-owner">
              <div class="cmt-chat-owner">
                <a href="">Tung</a>
                <textarea class="cmt-boxchat" placeholder="Thêm bình luận"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-10 col-md-offset-1 mv-related-post">
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
                <div class="content">
                  <h3>Title</h3>
                  <p>Content Here</p>
                  <p>Content Here</p>    
                  <p>Content Here</p>
                </div>
              </div>
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
              </div>
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
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
    $('.dropdown-menu li, .dropdown-menu textarea').click(function(e) {
      e.stopPropagation();
    });
      
    function initMap(lat, lng) {
      var myLatLng = new google.maps.LatLng(lat, lng);
      var options = {
          zoom: 18,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var mapdetail = new google.maps.Map(document.getElementById('map-detail'), options);           

      
      var name = "Place.name";
      var marker = new google.maps.Marker({
          position: {lat: lat, lng: lng},
          map: mapdetail,
          title: name,
          draggable: true
      });
    }
    $("#post_like_btn").click(function(){
        likePost($("#main-post-id").data("id"));
    });
    function likePost(post_id){
        var url ="{{URL::to('/api/post')}}"+'/'+post_id+'/'+"like";
        $.ajax({
            url: url,
            type:"GET",
            success:function(data){
                span_text = $("#post_like_btn").find('span:first');
                if(span_text.text()=="Thích"){
                    span_text.text("Đã thích");
                }
                else {
                    span_text.text("Thích")
                }
         }});
    }
    function getPostById(modal,id){
        var url ="{{URL::to('/api/post')}}"+'/'+id;
        $.ajax({
            url: url,
            type:"GET",
            success:function(data){
                console.log(data);
                modal.find("#owner-post").text(data.owner);
                modal.find("#main-post-id").data("id",data.post_id);
                modal.find("#main-photo-post").attr("src","{{URL::to('api/photo')}}"+"/"+data.photo_link);
                modal.find("#main-post-description").text(data.description);
                if(data.liked==true)
                     modal.find("#post_like_btn").find('span:first').text("Đã thích");
                modal.modal('show');
            }
        });
    }
  </script>
{{-- @stop  --}}
