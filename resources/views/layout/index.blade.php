<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendors/img/logo.png" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="vendors/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="vendors/css/style.css">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="vendors/js/jquery.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>

    <script src="vendors/js/responsive_waterfall.js"></script>
    <title>Fresh Food</title>
</head>
    
<body>
    {{-- Thanh menu --}}
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);'>
        <div class="container-fluid">
            <div class="navbar-header"> 
                <a class="navbar-brand logo" href="/home" style="margin-left:80px;">
                    <img src="vendors/img/logo.png" height="50" width="50">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="margin-top:25px;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div>
        
            <div class="collapse navbar-collapse container" id="myNavbar">
                <form class="nav navbar-nav navbar-left" style="margin-top:22px;">
                    <input type="search" placeholder="Search">
                </form> 
                
                <ul class="nav navbar-nav navbar-right" style="margin-top:15px; margin-left:65px;">
                    <li>
                        <input type="file" name="image" id="imgInp" class="file" accept="image/*">
                        <a href="#" id="upload">Upload</a>
                    </li>
                    <li><a href="{{URL::to('profile')}}">{{Auth::user()->username}}</a></li>
                    <li class="dropdown" style="margin-top:10px;">
                        <img src="vendors/img/5.jpg" height="30" width="30" class="logo-profile" id="dropdownMenu2" data-toggle="dropdown" style='cursor:pointer;'>   
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
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::to('logout')}}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
       
    <section style='background-color:#E9E9E9;'>
        @yield('grid-layout')
    </section>

    @include('layout.modal')
    @include('layout.modal-view')
    
    <div class="parent2">
        <div class="test1"><i class="fa fa-map" data-toggle="tooltip" title="Ăn j bây h!" style='cursor:pointer;'></i></div>
        <div class="test2"><i class="fa fa-graduation-cap" data-toggle="tooltip" title="Hooray!" style='cursor:pointer;'></i></div>
        <div class="test3"><i class="fa fa-code" data-toggle="tooltip" title="Hooray!" style='cursor:pointer;'></i></div>
        <div class="test4"><i class="fa fa-envelope-o" data-toggle="tooltip" title="Hooray!" style='cursor:pointer;'></i></div>
        <div class="mask2"><i class="fa fa-home fa-2x" data-toggle="tooltip" title="Menu"style='cursor:pointer;'></i></div>
    </div>

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
        });
    
        $("#imgInp").change(function(){
            readURL(this);
        });

        $('.parent2').on('mousedown touchstart', function() {
            if (!active1) $(this).find('.test1').css({'background-color': 'gray', 'transform': 'translate(0px,-125px)'});
            else $(this).find('.test1').css({'background-color': 'dimGray', 'transform': 'none'}); 
            if (!active2) $(this).find('.test2').css({'background-color': 'gray', 'transform': 'translate(-60px,-105px)'});
            else $(this).find('.test2').css({'background-color': 'darkGray', 'transform': 'none'});
            if (!active3) $(this).find('.test3').css({'background-color': 'gray', 'transform': 'translate(-105px,-60px)'});
            else $(this).find('.test3').css({'background-color': 'silver', 'transform': 'none'});
            if (!active4) $(this).find('.test4').css({'background-color': 'gray', 'transform': 'translate(-125px,0px)'});
            else $(this).find('.test4').css({'background-color': 'silver', 'transform': 'none'});
            active1 = !active1;
            active2 = !active2;
            active3 = !active3;
            active4 = !active4;  
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
                cache :false,
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
            var reader = new FileReader();
            reader.onload = function (theFile) {
            var image = new Image();
            image.src = theFile.target.result;
            $('.modal-prgbar .progress-bar').css('width', '0%');
            $('.modal-prgbar .progress-bar').text('00%');
            $('.modal-prgbar').modal('show');
            
            i = 0;
            var myVar = setInterval(function(){
                $('.modal-prgbar .progress-bar').css('width', i+'%');
                $('.modal-prgbar .progress-bar').text(i+'%'); 
                if(i == 100){
                    clearInterval(myVar);
                }else{
                    i = i + 1;
                }
            }, 200);
            $.ajax({
                url :"{{url('/upload-img')}}",
                data: {src : image.src},
                type :'POST',
                cache :false,
            }).done(function(data) {
                clearInterval(myVar);
                $('.modal-prgbar .progress-bar').css('width', '100%');
                $('.modal-prgbar .progress-bar').text('100%');
                setTimeout(function(){ 
                    $('.modal-prgbar').modal('hide');
                    $('#blah').attr('src', image.src);
                    $('.modal-upload').modal('show'); 
                }, 3000);
            }).fail(function(data) {

            }).always(function(data) {

            });
        }           
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>