<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="vendors/img/logo.png" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{HTML::style('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="vendors/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="vendors/css/style.css">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    
    
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFo1vaTwz6NILG9inO-5HOEQ14yYWSf9U&signed_in=true"
  async defer></script>
    <script src="vendors/js/jquery.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>

    <script src="vendors/js/responsive_waterfall.js"></script>
    <title>Fresh Food</title>
</head>
    
<body>
    {{-- Thanh menu --}}
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);'>
        <div class="container-fluid">
            <div class="navbar-header"> 
                <a class="navbar-brand logo" href="/" style="margin-left:80px;">
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
                    <li><a href="#" class="loginfb">Đăng nhập bằng fb</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
       
    <section style="background-color:#E9E9E9;">
        <div class="wf-container">
            @foreach(App\Models\Post::GetPopularPost(App\Models\LikeEvent::GetMostPost(),0) as $key => $value)
                <div class="wf-box">
                    <img src="vendors/img/{{$value->photo_link}}" class="box-img" data-option='{{$value->post_id}}'>
                    <div class="content">
                        <h3>Nhuận</h3>
                        <p>{{$value->description}}</p>
                    </div>
                </div>
            @endforeach    
        </div>    
    </section>          
    @include('layout.modal-view')
    @include('layout.modal-login')
</body>

<script>
    $(document).ready(function(){
        var waterfall = new Waterfall({ 
            minBoxWidth: 250 
        });

        var chek = false;

        $('.loginfb').on('click', function(){
            $(".modal-login").modal('show'); 
        });

        $(document).on('click', '.box-img', function(){
           // initMap(21.0277644, 105.8341597999995);
           google.maps.event.addDomListener(window, "load", initMap(21.0277644, 105.8341597999995));
            // post_id = $(this).data('option');
            // $.ajax({
            //     type: "POST",
            //     url: "{{url('/detail-image')}}",
            //     cache: false,
            //     data: {post_id : post_id},
            //     success: function(data){
                
            //     }
            // });
            $(".modal-view").modal('show'); 
        });

        $("#upload-img").click(function(){
            $("#modal").toggle(1000); 
            $(".bar").toggle(2000);
            $(".bar-fill").css("width","100%");
        });

        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() > $(document).height() - 50) {
                if(!chek){                   
                    chek = true;
                    $.ajax({
                        type: "POST",
                        url: "{{url('/load-more')}}",
                        cache: false,
                        data: {},
                        success: function(data){
                            for (i = 0; i < data.length; i++) {
                                if(i % 4 == 0){
                                    $('.wf-container .wf-column:first-child()').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");
                                }else if(i % 4 == 1){
                                    $('.wf-container .wf-column:nth-child(2)').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");
                                }else if(i % 4 == 2){
                                    $('.wf-container .wf-column:nth-child(3)').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");
                                }else if(i % 4 == 3){
                                    $('.wf-container .wf-column:last-child()').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");
                                }
                            }
                            chek = false
                        }
                    });
                }
            }
        });
    }); 
    
</script>
