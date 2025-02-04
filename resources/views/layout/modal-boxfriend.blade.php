@section('modal')
<div class="dropup" style="position: fixed;right: 0px;bottom: 0px;" data-toggle="tooltip" title="Danh sách bạn bè">
  <button class="btn btn-default dropdown-toggle glyphicon glyphicon-comment" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:75px;">
  </button>
  <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2" id="chat_list">
    @foreach(App\Models\FollowEvent::getFriend(Auth::user()->user_id) as $key => $value)
    <li data-chatid="{{$value->user_id}}" >
      <div class="fr_item" style="padding-left:10px;">
        <img src="{{URL::to('/api/photo/')."/".$value->avatar_link}}" height="30" width="30" class="logo-profile" style='cursor:pointer;float:left;width:30px !important;'>
        <p style="padding-top: 5px;float:left;margin-left: 10px;">{{$value->name}}</p>
        <i class="fa fa-circle" style="float: right;margin-top: 10px;margin-right: 10px;color: green;"></i>
      </div>
    </li>
    @endforeach
    <li role="separator" class="divider" style="margin: 0px !important;"></li>
    <li>
      <div class="form-group" style="margin-bottom:0px !important;">
        <input  id="search_fr" type="text" class="form-control" placeholder="Search">
      </div>
    </li>
  </ul>
</div>

<script type="text/javascript">
//  $(document).ready(function(){
//    var waterfall = new Waterfall({
//        minBoxWidth: 250
//    });
//  });
  $('#search_fr').click(function(e) {
    e.stopPropagation();
  });
  $('#chat_list li').click(function(e) {
    showBox($(this).data('chatid'));
  });
  function getChatById(modal,id){
    $.ajax({
      url: "{{url('/create-box-chat')}}",
      type:"POST",
      data:{id : id},
        success:function(data){
          modal.attr("data-chatid",data.user_id);
          modal.find("#friend_profile").attr("href","http://foodieweb.com/"+data.username);
          modal.find("#friend_profile").text(data.name);
          loadConversation(data.message)
      }});
  }
//  Show hop thoai chat khi co tin nhan moi hoac nguoi dung click chuot
//  Editor by NhuanTD
   function showBox(e){
//          console.log(e);
        var friendid = e;
        getChatById($('.box-mess'), friendid);
        $('.box-mess').show();
        var user_id = $("#user-id-info").data('id');
        var channel_name = Math.min(user_id,friendid)+"-"+Math.max(user_id,friendid);
        var channel = createChannelChat(channel_name);
    }
    function loadConversation(data){
        var modal = $(".bm-container");
        var user_id = getUserId();
        for(var i = data.length-1;i>=0;i--){
            if(data[i].sender_id==user_id.toString()){
                modal.append("<div class='mess_item_owner'>"+data[i].text+"</div>")
            }
            else{
                modal.append("<div class='mess_item'>"+data[i].text+"</div>")
            }
        }
    }
</script>
{{-- @stop  --}}
