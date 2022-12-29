@extends('FE.layouts.home')
@section('content')
<title>Danh sách sản phẩm</title>
<section class="bread-crumb style2">
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
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <strong itemprop="name">Điện thoại</strong>
                        <meta itemprop="position" content="1">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="category-products products category-products-grids">
        <section class="products-view products-view-grid">
            <div class="row" style="width:1100px;margin:auto">

                <?php foreach($products as $key => $products){ ?>
                <div class="col-sm-3 col-md-3 col-lg-20">
                    <div class="product-card">
                        <a href="{{URL::to('chi-tiet-san-pham/'.$products->Ma_sp)}}">
                            <div class="product-card__top">
                                <div class="product-img">
                                    <img style="width:240px; height:240px; object-fit: scale-down; background-color: initial"
                                        src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                        class="lazyload img-responsive center-block" style="">
                                </div>
                                <div style="min-height: 23px"></div>
                            </div>
                            <div class="product-card__center">

                                <div class="product-name text-ellipsis ellipsis-2">Điện thoại {{$products->Ten_sp}}
                                    ({{$products->Ram}}|{{$products->Rom}})</div>
                                <div class="product-price ">
                                    <span class="special-price">
                                        <!-- <span class="product-current">đ</span> -->
                                    </span>
                                    <span class="old-price">{{number_format($products->Gia_tien, 0, ',', ',')}} VNĐ
                                        <!-- <span class="product-current">đ</span> -->
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <?php } ?>
                <div class="text-xs-right text-center">
                    <nav class="clearfix relative nav_pagi w_100">
                    </nav>
                </div>

            </div>
        </section>
    </div>
</section>
@endsection