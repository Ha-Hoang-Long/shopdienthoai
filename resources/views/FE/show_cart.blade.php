@extends('FE.layouts.home')
@section('content')
<link href="{{asset('/css/cart.css')}}" rel="stylesheet">
<title>Giỏ hàng</title>
<div class="container">
    <div class="inner-content-box clearfix">
        <div class="breadcrumb-menu float-left">
            <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="home">
                    <a itemprop="item" href="{{URL::to('/home')}}">
                        <span itemprop="name"><i class="fa fa-home"></i> Trang chủ</span>
                    </a>
                    <span class="mr_lr">&nbsp;/&nbsp;</span>
                    <meta itemprop="position" content="0">
                </li>
                
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                    <a itemprop="item" href="">
                        <span itemprop="name">Giỏ hàng</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>

            </ul>
        </div>
    </div>
</div>

<div class="heading-page">
    <div class="header-page">
        <h1>Giỏ hàng của bạn</h1>
        <p class="count-cart">Có <span>
                <?php if(Session::has("Cart") != null){?>
                {{number_format(Session::get("Cart")->totalQuantity, 0, ',', ',')}}
                <?php }
            else{ ?> 0
                <?php }?> sản phẩm
            </span> trong giỏ hàng
        </p>
    </div>
</div>


<?php if(Session::has("Cart") != null){?>
<div class="x_panel" id="list-cart">
    <div class="x_title">
        <!-- <h2>Hover rows <small>Try hovering over the rows</small></h2> -->

        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Giá tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php if(Session::has("Cart") != null){
                    $num = 1;
                    $qt = 1;
                    foreach(Session::get("Cart")->products as $product){

                     ?>

                <tr>
                    <th scope="row" style="vertical-align: middle">{{$num}}</th>
                    <td style="vertical-align: middle"> <img style="width:100px"
                            src="{{asset('uploads/product_imgs/'.$product['productInfo']->Hinh_anh_product)}}" alt="">
                    </td>
                    <td style="vertical-align: middle">{{$product['productInfo']->Ten_sp}}</td>
                    <td style="vertical-align: middle">{{number_format($product['productInfo']->Gia_tien, 0, ',', ',')}}
                    </td>
                    <td style="vertical-align: middle">
                        <div class="qty-ant clearfix custom-btn-number">
                            <div class="qty quantity-partent qty-click clearfix">
                                <button onclick=" up_size2('{{$num}}'); var result = document.getElementById('{{$num}}'); var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;  "  type="button"  class="qtyminus qty-btn">-</button>
                                <input type="text" id="{{$num}}" name="quantity" size="4"
                                    maxlength="3"
                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                    onchange="up_size('{{$num}}')" value="{{$product['quantity']}}" size="1"
                                    class="tc line-item-qty item-quantity">
                                <button onclick="up_size1('{{$num}}') ; var result = document.getElementById('{{$num}}'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type="button" class="qtyplus qty-btn">+</button>
                            </div>
                        </div>


                        
                    </td>
                    <td style="vertical-align: middle">{{number_format($product['price'], 0, ',', ',')}}</td>
                    
                    <td style="vertical-align: middle"><button type="button" class="btn-close" aria-label="Close"
                            onclick="location.href='{{URL::to('/delete-item-list-cart/'.$product['productInfo']->Ma_sp)}}'"></button>
                    </td>
                </tr>
                <?php
                    $num++;
                    }
                }?>
            </tbody>
        </table>
        <script>

            function up_size(id){
                
                $num1 = 1;
                var x = 1;
                // global $qty;
                var result = document.getElementById(id).value;
                $qt = parseInt(result) ;
                console.log( typeof $qt);
                
                <?php foreach(Session::get("Cart")->products as $pro){ ?>
                    $qt = parseInt(result) ;
                    $ma = "{{$pro['productInfo']->Ma_sp}}";
                    var y = x.toString();
                    // $pro['quantity'] = $qty;
                    if(y == id && $qt != '0'){
                        $.ajax({
                            url: 'update-quantity-item-cart/' + $ma + '/'+$qt,
                            type: "GET",
                        })
                        window.location.href = "{{URL::route('fe.list_cart')}}"
                        
                        
                    }
                    x = parseInt(y);
                    x++;
                    
                    
                <?php } ?>
            }

            function up_size2(id){
                var result = document.getElementById(id).value;
                // console.log(result);
                // console.log(id);
                $num1 = 1;
                var x = 1;
                $qt = parseInt(result) ;
                $qt--;
                console.log($qt);
                <?php foreach(Session::get("Cart")->products as $pro){ ?>
                    // $qt = parseInt(result) ;
                    $ma = "{{$pro['productInfo']->Ma_sp}}";
                    var y = x.toString();
                    // $pro['quantity'] = $qty;
                    if(y == id && $qt != '0'){
                        $.ajax({
                            url: 'update-quantity-item-cart/' + $ma + '/'+$qt,
                            type: "GET",
                        })
                        setInterval(function(){
                            window.location.href = "{{URL::route('fe.list_cart')}}";
                        },1000);
                        
                        
                        
                    }
                    x = parseInt(y);
                    x++;
                    
                    
                <?php } ?>
                

                
                
            }
            function up_size1(id){
                // console.log(Session::get("Cart")->totalPrice);
                // console.log(id);
                var result = document.getElementById(id).value;
                $num1 = 1;
                var x = 1;
                $qt = parseInt(result) ;
                $qt++;
                console.log($qt);
                
                <?php foreach(Session::get("Cart")->products as $pro){ ?>
                    // $qt = parseInt(result) ;
                    $ma = "{{$pro['productInfo']->Ma_sp}}";
                    var y = x.toString();
                    // $pro['quantity'] = $qty;
                    if(y == id && $qt != '0'){
                        $.ajax({
                            url: 'update-quantity-item-cart/' + $ma + '/'+$qt,
                            type: "GET",
                        })
                        setInterval(function(){
                            window.location.href = "{{URL::route('fe.list_cart')}}";
                        },1000);
                        
                        
                        
                    }
                    x = parseInt(y);
                    x++;
                    
                    
                <?php } ?>
            }
        </script>
    </div>
</div>
<?php } ?>
<?php if(Session::has("Cart") != null){?>
<div class="col-md-4 col-sm-4 col-xs-12 sidebarCart-sticky">
    <div class="sidebox-order">
        <div class="sidebox-order-inner">
            <div class="sidebox-order_title">
                <h3>Thông tin đơn hàng</h3>
            </div>
            <div class="sidebox-order_total">
                <p>Tổng tiền:

                    <span class="total-price">{{number_format(Session::get("Cart")->totalPrice, 0, ',', ',')}}</span>


                </p>
            </div>
            <div class="sidebox-order_text">
                <p>Phí vận chuyển sẽ được tính ở trang thanh toán.<br>Bạn cũng có thể nhập mã giảm giá ở trang thanh
                    toán.</p>
            </div>
            <div class="sidebox-order_action">
                <a href="{{URL::to('/check-out')}}" class="button dark btncart-checkout">Thanh toán</a>
                <p class="link-continue text-center">
                    <a href="{{URL::to('/')}}">
                        <i class="fa fa-reply"></i> Tiếp tục mua hàng </a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script>
    function delete_ListItemcart(id) {
        $.ajax({
            url: 'delete-item-list-cart/' + id,
            type: "GET",
        }).done(function (response) {
            RenderListItemCart(response);
        });

    }

    function RenderListItemCart(response) {
        $("#list-cart").empty();
        $("#list-cart").html('/list-cart');
    }
</script>

@endsection