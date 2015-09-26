<html lang="en">
    <meta charset="UTF-8">
@include('blade.sub-header')
<body>
@include('blade.sub-nav')

<div class="row">
                
                <h2><i class="ion-heart " style="margin-top:3%; color:rgba(255, 0, 0, 0.74);"></i> Get Interesting Food <i class="ion-heart " style="color:rgba(255, 0, 0, 0.74);"></i></h2>
            </div>
        
        <section class="row">
            <div class="photo-container">
                <h4> Bữa Sáng Nhẹ</h4>
                <img src="resources/css/img/1.jpg"></div>
            <div class="description-container"> 
                Details
                <hr>
                <b><i class="ion-location"></i> Địa Chỉ</b><br>
                100, Lê Thanh Nghị, Hai Bà Trưng Hà Nội
                <hr>
                <b><i class="ion-ios-pricetags"></i> Mô Tả</b><br>
                Anh Nguyễn đẹp trai nhất dải ngân hà. Anh Nguyễn đẹp trai nhất dải ngân hà. Anh Nguyễn đẹp trai nhất dải ngân hà. Anh Nguyễn đẹp trai nhất dải ngân hà. Anh Nguyễn đẹp trai nhất dải ngân hà. 
                <hr>
                <b><i class="ion-ios-clock-outline"></i> Giờ Mở Cửa</b><br>
                Mở Cả Ngày nhé đmm
                <hr>
                <b><i class="ion-earth"></i> Bản Đồ</b><br>
                <div id="map" style="width:100%; height:200px;"></div>
            </div>
            
            <section class="comment">
            <div class="status-meals">
                <b>Name</b> this is a meal dat sucks
            </div>
            <div class="like-meals">
                   <i class="ion-thumbsup"> Thích   </i>
                <i class="ion-ios-redo" style="margin-left:15px;"> Trả Lời</i>
            </div>
            <div class="comment-meals">
                   <b>Name</b> I think it's a big meal. 
            </div>
            
            <div class="comment-meals">
                   <b>Name1</b> I think it's a big meal. 
            </div>
            <div class="comment-meals">
                   <b>Name2</b> I think it's a big meal. 
            </div>
            <div class="comment-meals">
                   <b>Name3</b> I think it's a big meal. 
            </div>
            </section>
        </section>

        @include('blade.sub-footer')
        </body>
</html>