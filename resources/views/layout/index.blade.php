<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{URL::asset('img/logo.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{URL::asset('css/kc.fab.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="vendors/js/responsive_waterfall.js"></script>
    <title>Fresh Food</title>
</head>
    
<body>
    {{-- Thanh menu --}}
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);'>
        <div class="container-fluid">
            <div class="navbar-header"> 
                <a class="navbar-brand logo" href="/home" style="margin-left:80px;">
                    <img src="{{URL::asset("img/logo.png")}}" height="50" width="50">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="margin-top:25px;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div>
        
            <div class="collapse navbar-collapse container" id="myNavbar">
                <form class="nav navbar-nav navbar-left" >
                    <input type="search" placeholder="Search" style="margin-top:22px;">
                </form> 
                
                <ul class="nav navbar-nav navbar-right" style="margin-top:15px; margin-left:65px;">
                    <li>
                        <input type="file" name="image" id="imgInp" data-id = "" class="file" accept="image/*">
                        <a href="#" id="upload">Upload</a>
                    </li>
                    <li>
                        <a href="{{URL::to('home')}}">Home</a>
                    </li>
                    @if(Auth::user()!=null)
                    <li><a href="{{URL::to(Auth::user()->username)}}">{{Auth::user()->username}}</a></li>
                    @endif
                    <li class="dropdown" style="margin-top:10px;">
                         @if(Auth::user()!=null)
                        <img src="{{URL::to('/api/photo/')."/".Auth::user()["avatar_link"]."_75"}}" height="30" width="30" class="logo-profile" id="dropdownMenu2" data-toggle="dropdown" style='cursor:pointer;'>
                        @endif
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2" style="margin-top:26px;">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sửa thông tin</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Đăng xuất</a></li>
                        </ul>    
                        <span class="caret dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style='cursor:pointer;'></span>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="margin-top:26px;">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sửa thông tin</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('user/logout')}}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
       
    <section class="layout-mainpage">
        @yield('grid-layout')
    </section>
    @include('layout.modal')
    @include('layout.modal-view')

    @include('layout.sub-menu')
    @include('layout.modal-message')

    <div class="modal fade modal-prgbar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                    00%
                    </div>
                </div>    
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
<script src="{{URL::asset('js/kc.fab.min.js')}}"></script>
<script>
    $(document).ready(function(){

        var active1 = false;
        var active2 = false;
        var active3 = false;
        var active4 = false;

        var waterfall = new Waterfall({ 
            minBoxWidth: 250 
        });

        //sự kiện upload ảnh
        $('#imgInp').hide();
        $('#upload').on('click', function(){

            document.getElementById("imgInp").click();
            //Ham nay o trang modal.blade.php
            listBoardUser();
        });
    
        $("#imgInp").change(function(){
            readURL(this);
        });

    
        $('.locate-map').on('click',function(){
            $('.locate-map').hide();
            $('.locate-text').hide();
            $('#pac-input').show();
            $('#map').show();
            initAutocomplete();
        });

        $('.test1 i').on('click', function(){
            window.location = '/an-gi-bay-gio';
        });

        $('.box-img').on('click', function(){
            $('.modal-view').modal('show');
        });        

        $(document).on('click', '#pinit', function(){
            board_id = $(this).data('option');
            description = $('.description').val();
            place_id = 1;
            hashtag = $(".ajbh-list-hastag2 li").map(function(){
                return $(this).text();
            }).get();
            $.ajax({
                url :"{{url('/upload-post')}}",
                data: {board_id:board_id, description:description, place_id:place_id, hashtag:hashtag},
                type :'POST',
                cache :false
            }).done(function(data) {
                
            }).fail(function(data) {

            }).always(function(data) {

            });
        });
    }); 

 
    function readURL(input) {
        if (input.files && input.files[0]) {
            if(input.files[0].size > 5*1024*1024)
            {
                alert("Qua dung luong");
                return;
            }
            console.log(input.files[0]);
            var formData = new FormData();
            $('.modal-prgbar').modal('show');
            formData.append("src",input.files[0]);
            $.ajax({
                    url :"{{url('/api/photo')}}",
                    data: formData,
                    type :'POST',
                    dataType: 'json',
                    processData: false, // Don't process the files
                    contentType: false,
                    xhr: function()
                    {
                        var xhr = new window.XMLHttpRequest();
                        //Upload progress
                        xhr.upload.addEventListener("progress", function(evt){
                            var percentComplete = (evt.loaded / evt.total)*100;
                            //Do something with upload progress
                            console.log(percentComplete);
                            $('.modal-prgbar .progress-bar').css('width', percentComplete+'%');
                            $('.modal-prgbar .progress-bar').text(percentComplete+'%'); 
                        }, false);
                        return xhr;
                   },
                }).success(function(evt){
                    // console.log(evt);
                    $('.modal-prgbar').modal('hide');
                    image_url = "{{url('api/photo/')}}"+"/"+evt;
                    $('#blah').attr('src', image_url);
                    $('#blah').attr('data-id',evt);
                    $('.modal-upload').modal('show'); 
                });
            var reader = new FileReader();
            reader.onload = function (theFile) {
                var image = new Image();
                image.src = theFile.target.result;
                $('.modal-prgbar .progress-bar').css('width', '0%');
                $('.modal-prgbar .progress-bar').text('00%');
                $('.modal-prgbar').modal('show');
                
                // var formData = new FormData();
                // formData.append("src",input.files[0]);
                // console.log(formData);
                // i = 0;
                // var myVar = setInterval(function(){
                //     $('.modal-prgbar .progress-bar').css('width', i+'%');
                //     $('.modal-prgbar .progress-bar').text(i+'%'); 
                //     if(i == 100){
                //         clearInterval(myVar);
                //     }else{
                //         i = i + 1;
                //     }
                // }, 200);
                // $.ajax({
                //     url :"{{url('/api/photo')}}",
                //     data: {src : image.src},
                //     type :'POST',
                //     dataType: 'json',
                //     processData: false, // Don't process the files
                //     contentType: false,
                //    //  xhr: function()
                //    //  {
                //    //      var xhr = new window.XMLHttpRequest();
                //    //      //Upload progress
                //    //      xhr.upload.addEventListener("progress", function(evt){
                //    //        if (evt.lengthComputable) {
                //    //          var percentComplete = evt.loaded / evt.total;
                //    //          //Do something with upload progress
                //    //          console.log(percentComplete);
                //    //        }
                //    //      }, false);
                //    //      return xhr;
                //    // },
                // }).success(function(evt){
                //     console.log(evt);
                // });
            }           
        // reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>