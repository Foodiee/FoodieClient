<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendors/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="vendors/css/nomalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
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
                <form class="nav navbar-nav navbar-left" style="margin-top:17px;">
                    <input type="search" placeholder="Search">
                </form> 
                
                <ul class="nav navbar-nav navbar-right" style="margin-top:15px; margin-left:65px;">
                    <li><a href="#">Upload</a></li>
                    <li><a href="/profile">Home</a></li>
                    <li class="dropdown" style="margin-top:10px;">
                        <img src="vendors/img/5.jpg" height="30" width="30" class="logo-profile">       
                        <span class="caret dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"></span>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="margin-top:26px;">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sửa thông tin</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Đăng xuất</a></li>
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
</body>

<script>
    $(document).ready(function(){
        $("img").click(function(){
            $(".modal").modal('show'); 
        });

        $("#upload-img").click(function(){
            $("#modal").toggle(1000); 
            $(".bar").toggle(2000);
            $(".bar-fill").css("width","100%");
        });
    
        var waterfall = new Waterfall({ 
            minBoxWidth: 250 
        });
    }); 
</script>
</html>