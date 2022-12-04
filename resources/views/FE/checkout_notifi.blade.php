@extends('FE.layouts.home')
@section('content')
<section class="bread-crumb style2">
    <div class="container">
        <div class="inner-content-box clearfix">
            <div class="breadcrumb-menu float-left">
                <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="home">
                        <a itemprop="item" href="https://vmartplus.w2.exdomain.net/common/home">
                            <span itemprop="name"><i class="fa fa-home"></i> Trang chủ</span>
                        </a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                        <meta itemprop="position" content="0">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <strong itemprop="name">Thông báo đặt hàng</strong>
                        <meta itemprop="position" content="1">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>



<?php if(Str::length($order_detail) <1){ ?>
<div class="section-delivery-result">
    <div id="delivery-result" class="container">
        <div class="wrapper-delivery-result">
            <h2 class="section-title" style="text-transform: unset; color: forestgreen;">Bạn đã đặt hàng thàng công </h2>
            <div class="delivery-result__form">
                <div style="">
                    
                    <table>
                        <tbody>
                            <tr>
                                <th class="text-center" style="max-width: 150px; padding-left: 8px">Mã đơn hàng</th>
                                <th class="text-left" style="max-width: 400px">Sản phẩm</th>
                                <th class="text-right">Giá</th>
                                <th class="text-right">số lượng</th>
                                <th class="text-right">tổng giá</th>
                                <th class="text-center">Ngày đặt mua</th>
                                <th class="text-right">Trạng thái</th>
                            </tr>
                            <?php 
                            $num = 1;
                                foreach($order_detail as $order_details){ ?>
                            <tr>
                                
                                <td class="text-center" style="max-width: 100px; padding-left: 8px">#{{$order_details->order_id}}</td>
                                
                                <td class="delivery-result__product" style="max-width: 400px">
                                    <a href="javascript(0)">
                                        <img src="{{asset('uploads/product_imgs/'.$order_details->Hinh_anh_product)}}"
                                            alt="Điện thoại OPPO Reno5 (8GB|128GB)">
                                    </a>
                                    <p class="delivery-result__name text-left">
                                        <span>Điện thoại {{$order_details->Ten_sp}} ({{$order_details->Ram}}GB|{{$order_details->Rom}}GB)</span>
                                        <!-- <span>DI5208</span> -->
                                        <!-- <a href="javascript:void(0)" class="link">Chi tiết sản phẩm</span> -->
                                    </p>
                                </td>
                                <td class="text-right delivery-result__price">
                                    <span class="delivery-result__special main-text bold">{{number_format($order_details->Gia_tien, 0, ',', ',')}}</span>
                                    <span class="delivery-result__old"></span>
                                </td>
                                <td class="text-center delivery-result__price">
                                    <span class="delivery-result__special bold">{{$order_details->product_sales_qty}}</span>
                                    <span class="delivery-result__old"></span>
                                </td>
                                <td class="text-right delivery-result__price">
                                    <span class="delivery-result__special main-text bold">{{number_format($order_details->total_price, 0, ',', ',')}}</span>
                                    <span class="delivery-result__old"></span>
                                </td>
                                <td class="text-center">
                                {{$order_details->created_at}} </td>
                                <td class="text-right delivery-result__status">
                                    <span class="processing">Đang chờ xử lý</span>
                                    <!--<span class="delivery-result__date">01/12/2022</span>-->
                                </td>
                            </tr>
                            <?php $num++; } ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
@endsection