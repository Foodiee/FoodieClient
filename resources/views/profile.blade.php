@extends('layout.index')
@include('layout.modal-profile')
@include('layout.modal-login')
@section('grid-layout')
    <div class="container" style="width:100%;margin-top:100px;">
        <div class="left-side col-md-5">
            <img src="{{URL::to('/api/photo/')."/".$user["avatar_link"]}}" class="logo-profile">
        </div>
        <div class="right-side col-md-7">
            <div class="row">
            <h3>
                <span id="user-span" data-user="{{$user["user_id"]}}">{{$user["name"]}}</span>
                @if(Auth::user()!=null)
                    @if($user["user_id"]==Auth::user()->user_id)
                        <button id="btn-edit" class="btn follow_btn">
                            <em></em>
                            <span>Chỉnh sửa trang cá nhân</span>
                        </button>
                    @else
                        @if(!isset($user["follow"]))
                            <button id="btn-follow" class="btn follow_btn" data-id="1">
                                <em></em>
                                <span>Theo dõi</span>
                            </button>
                        @else
                            <button id="btn-follow" class="btn follow_btn" data-id="1">
                                <em></em>
                                <span>Đang theo dõi</span>
                            </button>
                        @endif
                    @endif
                @else
                    <button id="btn-follow" class="btn follow_btn" data-id="0">
                        <em></em>
                        <span>Theo dõi</span>
                    </button>
                @endif
                
            </h3>
          
            </div>
            <ul class="user-info" id="user-profile-list">
                <li id="post-list" class="user-profile-info"><span>7</span> Bài viết</li>
                <li id="board-list"class="user-profile-info"><span>7</span> Album</li>
                <li id="follower-list" class="user-profile-info"><span>7</span> Người theo dõi</li>
                <li id="following-list" class="user-profile-info"><span>7</span> Người đang theo dõi</li>
            </ul>
        </div>
    </div>
    <div id="user-container" class="wf-container" style="margin-top:40px;width:60%;">
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
                <h3>Title</h3>
                <p>Content aa asdfasdfjal</p>    
            </div>
        </div>
    </div> 
   
    <script type="text/javascript">
    
        menu = $("#user-profile-list");
        $("#post-list").click(function()
            {
                menu.find('.active-profile-li').removeClass('active-profile-li');
                $(this).addClass('active-profile-li');
                var user_id = $('#user-span').data("user");
                var photoUrl = "{{URL::to('api/photo/')}}"; 
                var url = "{{URL::to('api/user/')}}"+"/"+user_id+"/post";
                listContainer = $("#user-container");
                listContainer.empty();
                createListBox = function(data)
                {
                    for (var i = 0;i<data.length;i++)
                    {
                        var postBox = createPostBox(photoUrl+"/"+data[i].photo_link,
                            data[i].description,data[i].board_title,data[i].owner);
                        listContainer.append(postBox);
                    }   
                    var waterfall = new Waterfall({
                             containerSelector: '.wf-container',
                             boxSelector: '.wf-box',
                            });
                }
                $.get(url,function(data){createListBox(data)},'json');
            });
         $("#board-list").click(function()
            {
                 menu.find('.active-profile-li').removeClass('active-profile-li');
                $(this).addClass('active-profile-li');
            });
        function createUserBox(imgSrc,title,content)
        {
            img = $("<img/>",{src:imgSrc,class:"user-box"});
            divContent = jQuery("<div/>",{class:"content"}).append(
                $("<h3/>").text(title),
                $("<p/>").text(content)
                );
            return jQuery("<div/>",{
                class:"wf-box"
            }).append(img,divContent);
        }
        function createPostBox(imgSrc,title,content,owner)
        {
            img = $("<img/>",{src:imgSrc});
            divContent = jQuery("<div/>",{class:"content"}).append(
                $("<h3/>").text(title),
                $("<p/>").text(content),
                $("<p/>").text(owner)
                );
            return jQuery("<div/>",{
                class:"wf-box"
            }).append(img,divContent);
            // var box = document.createElement('div');
            // box.className = 'wf-box';
            // var image = document.createElement('img');
            // image.src = imgSrc;
            // box.appendChild(image);
            // var content = document.createElement('div');
            // content.className = 'content';
            // var title = document.createElement('h3');
            // title.appendChild(document.createTextNode(title));
            // content.appendChild(title);
            // var p = document.createElement('p');
            // p.appendChild(document.createTextNode(content));
            // content.appendChild(p);
            // box.appendChild(content);
            // return box;
        }
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
                $.post(url,data,function(data)
                {
                    // console.log(data);
                    if(data.result=="followed")
                    {
                    
                        text = "Đã theo dõi";
                        
                    }
                    else 
                    {
                       
                        text = "Theo dõi";
                    }
                    $("#btn-follow").find('span').text(text);
                },'json');
            }
        });
    </script>
@stop



