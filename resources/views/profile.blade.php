@extends('layout.index')
@include('layout.modal-profile')
@include('layout.modal-login')
@section('grid-layout')
    <div class="container" style="width:60%;margin-top:100px;">
        <div class="left-side col-md-4">
            <img src="vendors/img/5.jpg" class="logo-profile" height="150" width="150">
        </div>
        <div class="right-side col-md-7">
            <div class="row">
            <h3>
                <span data-user="{{$user["user_id"]}}">{{$user["name"]}}</span>
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
            <ul class="user-info">
                <li><span>7</span> Bài viết</li>
                <li><span>7</span> Album</li>
                <li><span>7</span> Người theo dõi</li>
                <li><span>7</span> theo dõi</li>
            </ul>
        </div>
    </div>
    <div class="wf-container" style="margin-top:40px;width:60%;">
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
        <div class="wf-box">
            <img src="vendors/img/5.jpg">
            <div class="content">
                <h3>Heading</h3>
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
   
    <script type="text/javascript">
        $("#btn-edit").click(function(){
            $('.modal-profile').modal('show');
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



