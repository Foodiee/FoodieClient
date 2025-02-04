@extends('layout.index')
<link href="{{URL::asset('img/logo.png')}}" rel="icon" type="image/png" sizes="96x96" >
@include('layout.modal-profile')
@include('layout.modal-login')
@section('grid-layout')
    <div class="container" style="width:100%;margin-top:30px;padding-left:0 !important; padding-right:0 !important;">
        <div class="left-side col-md-12">
            <div class="cover-profile" style="background-image: url('{{URL::to('/api/photo/')."/".$user["cover_link"]}}')"></div>
            <div class="dark-cover"></div>
            <div class='cover-content'>
                <img src="{{URL::to('/api/photo/')."/".$user["avatar_link"]}}" class="logo-profile">
                <h1 id="user-span" data-user="{{$user["user_id"]}}">{{$user["name"]}}</h1>
                <div class="cover-caption"><h4>{{$user["description"]}}</h4></div>
            </div>
        </div>
        <div class="right-side col-md-12">
            <div class="row" style="padding-top:18px;">
            <h3>
                @if(Auth::user()!=null)
                    @if($user["user_id"]==Auth::user()->user_id)
                        <button id="btn-edit" class="btn follow_btn">
                            <em></em>
                            <span>Edit Profile</span>
                        </button>
                    @else
                        @if(!isset($user["follow"]))
                            <button id="btn-follow" class="btn follow_btn" data-id="1">
                                <em></em>
                                <span data-user="{{$user["user_id"]}}">Follow</span>
                            </button>
                        @else
                            <button id="btn-follow" class="btn follow_btn" data-id="1">
                                <em></em>
                                <span data-user="{{$user["user_id"]}}">Followed</span>
                            </button>
                        @endif
                    @endif
                @else
                    <button id="btn-follow" class="btn follow_btn" data-id="0">
                        <em></em>
                        <span>Follow</span>
                    </button>
                @endif
            </h3>
            </div>
            <ul class="user-info nav nav-pills user-profile-list">
                <li id="post-list" class="user-profile-info active">
                    <a href="#user-container" data-toggle="tab"><span>{{$profile["number_of_posts"]}}</span> Posts</a>
                </li>
                <li id="board-count-list"class="user-profile-info">
                    <a href="#tab2" data-toggle="tab"><span>{{$profile["number_of_boards"]}}</span> Albums</a>
                </li>
                <li id="follower-list" class="user-profile-info">
                    <a href="#tab3" data-toggle="tab"><span>{{$profile["number_of_follower"]}}</span> Follower</a>
                </li>
                <li id="following-list" class="user-profile-info">
                    <a href="#tab4" data-toggle="tab"><span>{{$profile["number_of_following"]}}</span> Following</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="user-container" class="wf-container tab-pane active" style="margin: 40 auto;width: 90%;">
            @foreach($posts as $post)
                <div class="wf-box" data-id="{{$post["post_id"]}}">
                    <img src="{{URL::to('api/photo').'/'.$post["photo_link"]}}" class="box-img" data-id="{{$post["post_id"]}}"/>
                    <div class="content">
                        <h3 class="box-img-des">{{$post["description"]}}</h3>
                        <div class="box-img-card">
                            <img src="{{URL::asset("img/logo.png")}}" width="30" height="30" class="logo-profile">
                            <div>
                                <p class="card-owner">{{$post["owner"]}}</p>
                                <h4 class="card-title">{{$post['board_title']}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="tab2" class="wf-container tab-pane" style="margin: 40 auto;width: 90%;">
            @foreach($boards as $board)
            <div class="wf-box col-xs-3" data-id="11">
                <div class="grid-board">
                    <h3 class="box-img-des">{{$board["title"]}}</h3>
                    <img class="board-cover" src="{{$board["preview"][0]}}" style="height: 152px; width: 246px;" class="box-img" data-id="11"/>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img src="{{$board["preview"][1]}}" class="box-img" style="height: 50px;" data-id="11"/>
                        </li>
                        <li class="list-group-item">
                            <img src="{{$board["preview"][2]}}" class="box-img" style="height: 50px;" data-id="11"/>
                        </li>
                        <li class="list-group-item">
                            <img src="{{$board["preview"][3]}}" class="box-img"  style="height: 50px;"data-id="11"/>
                        </li>
                    </ul>
                </div>    
                <div class="content">
                    <div class="box-img-card">
                        <button>
                            @if(Auth::user()!=null)
                                @if($user["user_id"]==Auth::user()->user_id)
                                    <button id="btn-edit-board" class="btn edit_btn">
                                        <em></em>
                                        <span>Chỉnh sửa </span>
                                    </button>
                                @else
                                    @if(!isset($user["follow"]))
                                        <button id="btn-follow" class="btn edit_btn" data-id="1">
                                            <em></em>
                                            <span>Theo dõi</span>
                                        </button>
                                    @else
                                        <button id="btn-follow" class="btn edit_btn" data-id="1">
                                            <em></em>
                                            <span>Đang theo dõi</span>
                                        </button>
                                    @endif
                                @endif
                            @else
                                <button id="btn-follow" class="btn edit_btn" data-id="0">
                                    <em></em>
                                    <span>Theo dõi</span>
                                </button>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
        <div id="tab3" class="wf-container tab-pane" style="margin: 40 auto;width: 90%;">
            <div class="wf-box col-sm-3" data-id="11">
                <ul class="grid-board-fl list-group">
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                </ul>   
            </div>
            <div class="wf-box col-sm-3" data-id="11">
                <ul class="grid-board-fl list-group">
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                </ul>   
            </div>
        </div>
        <div id="tab4" class="wf-container tab-pane" style="margin: 40 auto;width: 90%;">
            <div class="wf-box col-sm-3" data-id="11">
                <ul class="grid-board-fl list-group">
                    <li class="list-group-item">
                        <img src="img/6.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/6.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/6.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/6.jpg" class="box-img" data-id="11"/>
                    </li>
                </ul>   
            </div>
            <div class="wf-box col-sm-3" data-id="11">
                <ul class="grid-board-fl list-group">
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                    <li class="list-group-item">
                        <img src="img/5.jpg" class="box-img" data-id="11"/>
                    </li>
                </ul>   
            </div>
        </div> 
    </div>   
    <script type="text/javascript">
        menu = $("#user-profile-list");
        $("#post-list").addClass('active-profile-li');

         $("#board-list").click(function()
            {
                 menu.find('.active-profile-li').removeClass('active-profile-li');
                $(this).addClass('active-profile-li');
            });
//
        $("#btn-edit").click(function(){
            $('.modal-profile').modal('show');
            showProfile($("#user-span").data("user"));
        });
        $('#btn-follow').click(function(){
            //Neu = 0 thi chua dang nhap con = 1 da dang nhap
            if($(this).data('id')==0)
                $('.modal-login').modal('show');
            else {
                var following_id = $('h3 span').data("user");
                var url = "{{URL::to('api/user/follow')}}";
                var data = {
                    "following_id":following_id
                };
//                alert(following_id);
                $.post(url,data,function(data)
                {
                    // console.log(data);
                    if(data.result=="followed") text = "Followed"; else {text = "Follow"; }
                    $("#btn-follow").find('span').text(text);
                },'json');
            }
        });
    </script>
@stop



