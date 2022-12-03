@extends('FE.layouts.home')
@section('content')
<title>Hoanglongmobile</title>
<div class="section section-slider">
    <div class="section-slider__main">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-xs-12 col-12">
                    <div class="main-index">
                        <div class="section_slider ">
                            <div class="swiper-container">
                                <div class="swiper-iwish-3 swiper-container-initialized swiper-container-horizontal" style="cursor: grab;">
                                    <div class="swiper-wrapper" id="swiper-wrapper-65b919ca310f341d3" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide swiper-slide-active" role="group"  >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" style="width: 226px; margin-right: 10px;" >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide" role="group"  style="width: 226px; margin-right: 10px;" >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide" role="group"  style="width: 226px; margin-right: 10px;" >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="5 / 6" style="width: 226px; margin-right: 10px;" >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="6 / 6" >
                                            <a>
                                                <picture>
                                                    <img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/main_banner-970x400.png" alt="" class="img-responsive center-block">
                                                </picture>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-button-prev swiper-button-disabled" ></div>
                                    <div class="swiper-button-next" ></div>
                                    <!-- <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide "></span></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span> -->
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>              
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-xs-12 col-12 hidden-xs ">
                    <div class="section-slider__main-item">
                        <a href="javascript:void(0)"><img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/side_banner_1-400x150.png" alt=""></a>
                    </div>
                    <div class="section-slider__main-item">
                        <a href="javascript:void(0)"><img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/side_banner_2-400x150.png" alt=""></a>
                    </div>
                    <div class="section-slider__main-item">
                        <a href="javascript:void(0)"><img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/side_banner_3-400x150.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-slider__banner hidden-xs">
    <div class="container">
        <a href="javascript:void(0)"><img src="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmartplus/banner/wide_banner-1920x150.png" alt=""></a>
    </div>
</div>
<div id="content">
<?php foreach($category_products as $key => $category){ ?>
    <div class="section section-product">
        <div class="container">
            <div class="section-product__title">
                <h2 class="section-product__name">
                    <a href="{{URL::to('listing/danh mục '.$category->Ten_danh_muc)}}">{{$category->Ten_danh_muc}}</a>
                </h2>
                <div class="section-product__tab">
                    <ul class="tabs tabs-title clearfix">
                    <?php foreach($brand as $key => $brands){ ?>
                        <?php if($brands->Ten_danh_muc == $category->Ten_danh_muc){ ?>
                        <li class="tab-link" data-tab="tab-0">
                            <span>{{$brands->Ten_hang}}</span>
                        </li>
                        <?php 
                        }
                    } ?>
                    </ul>
                </div>
            </div>
            <div class="section-product__content">
                <div id="tab-0" class="tab-content current">
                    <div class="swiper-container">
                        <div class="swiper-iwish-0 swiper-container-initialized swiper-container-horizontal" style="cursor: grab;">
                            <div class="swiper-wrapper" id="swiper-wrapper-65b919ca310f341d3" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            <?php foreach($products as $key => $product){ ?>
                                <?php if($product->Ten_danh_muc == $category->Ten_danh_muc){ ?>
                                    <div class="swiper-slide" role="group" aria-label="1 / 8" style="width: 226px; margin-right: 10px;">
                                        <div class="product-card">
                                            <a href="{{URL::to('chi-tiet-san-pham/'.$product->Ma_sp)}}" class="stretched-link">
                                                <div class="product-card__top">
                                                    <div class="product-img">
                                                        <img style="width:240px; height:240px; object-fit: scale-down; background-color: initial" src="uploads/product_imgs/{{$product->Hinh_anh_product}}" alt="Điện thoại OPPO Reno5 (8GB|128GB)" class="lazyload img-responsive center-block" style="">
                                                    </div>
                                                    <div style="min-height: 23px">
                                                    </div>
                                                </div>
                                                <div class="product-card__center">
                                                    <div class="product-name text-ellipsis ellipsis-2">{{$product->Ten_sp}}</div>
                                                    <div class="product-price ">
                                                        <span class="special-price">                    <!-- <span class="product-current">đ</span> -->
                                                        </span>
                                                        <span class="old-price">{{number_format($product->Gia_tien, 0, ',', ',')}} VNĐ                 <!-- <span class="product-current">đ</span> -->
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>                                       
                                    </div>
                            <?php 
                                }
                            } 
                            ?>                                                                         
                            </div>
                            <div class="swiper-button-prev swiper-button-disabled" ></div>
                            <div class="swiper-button-next" ></div>
                            <!-- <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span> -->                                    
                        </div>                              
                    </div>                                                     
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    
    
</div>
@endsection