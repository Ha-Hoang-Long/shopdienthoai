@extends('FE.layouts.home')
@section('content')

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
                    
                    <?php foreach($product as $key => $products) {?>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                        <a itemprop="item" href="{{URL::to('/listing/danh mục '.$products->Ten_danh_muc)}}">
                            <span itemprop="name">{{$products->Ten_danh_muc}}</span>
                        </a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                        <a itemprop="item" href="">
                            <span itemprop="name">{{$products->Ten_hang}}</span>
                        </a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                        <meta itemprop="position" content="3">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <strong itemprop="name">{{$products->Ten_sp}}</strong>
                        <meta itemprop="position" content="4">
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php foreach($product as $key => $product) {?>
<section class="section-product">
    <section class="product vmartplus-product">
        <div class="container">
            <div class="wrapper-product-detail">
                <div class="product-detail__name">
                    <h1 class="title-head">Điện thoại {{$product->Ten_sp}} ({{$product->Ram}}|{{$product->Rom}})</h1>
                </div>
                <div class="row">
                    <div class="details-product col-sm-12 col-xs-12 col-md-8 ">
                        <div class="row">
                            <div class="product-detail-left product-images col-12 col-md-12 col-lg-6">
                                <div class="product-image-detail">
                                    <div
                                        class="swiper-container swiper-iwish-3 swiper-container-initialized swiper-container-horizontal gallery-top margin-bottom-10">
                                        <div class="swiper-wrapper" id="swiper-wrapper-71fd0d1c984eaa9b"
                                            aria-live="polite">
                                            <a class="swiper-slide swiper-slide-next" data-hash="2"
                                                href="uploads/product_imgs/{{$products->Hinh_anh_product}}"
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="2 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                    data-image=""
                                                    class="img-responsive mx-auto d-block swiper-lazy lazyload"
                                                    style="">
                                            </a>
                                            <a class="swiper-slide" data-hash="1"
                                                href="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="3 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    class="img-responsive mx-auto d-block swiper-lazy lazyload"
                                                    style="">
                                            </a>
                                            <a class="swiper-slide" data-hash="2"
                                                href=""
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="4 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                    data-image=""
                                                    class="img-responsive mx-auto d-block swiper-lazy lazyload"
                                                    style="">
                                            </a>
                                            <a class="swiper-slide" data-hash="3"
                                                href=""
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="5 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                    data-image=""
                                                    class="img-responsive mx-auto d-block swiper-lazy lazyload"
                                                    style="">
                                            </a>
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive"
                                            aria-atomic="true"></span>
                                    </div>
                                    <div class="d-flex" style="margin-top: 10px">
                                        <div class="btn-click__popup btn-detail swiper-slide swiper-slide__bonus swiper-slide__info-detail text-center"
                                            data-tab="tab-info">
                                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.0625 21.0659H17.9375V18.0034H24.0625V21.0659Z"
                                                    fill="#FFAE14"></path>
                                                <path d="M25.8125 26.3159H21.4375V24.1284H25.8125V26.3159Z"
                                                    fill="#FFAE14"></path>
                                                <path d="M13.5625 20.6284H10.0625V18.8784H13.5625V20.6284Z"
                                                    fill="#FFAE14"></path>
                                                <path d="M13.5625 10.1284H10.0625V6.62842H13.5625V10.1284Z"
                                                    fill="#FFAE14"></path>
                                                <path
                                                    d="M12.6855 12.7543L22.1808 3.259L25.2427 6.32088L15.7474 15.8162L12.6855 12.7543Z"
                                                    fill="#FFAE14"></path>
                                                <path
                                                    d="M26.25 17.5659H19.6875V12.497L26.7999 5.38461C27.2917 4.89286 27.5625 4.23923 27.5625 3.54404C27.5625 2.10861 26.3948 0.940918 24.9594 0.940918C24.2642 0.940918 23.6106 1.21173 23.1188 1.70304L19.6875 5.13436V4.00342C19.6875 2.79723 18.7062 1.81592 17.5 1.81592H14.357C14.1759 1.30798 13.6946 0.940918 13.125 0.940918H7C6.43037 0.940918 5.94913 1.30798 5.768 1.81592H2.625C1.41881 1.81592 0.4375 2.79723 0.4375 4.00342V22.3784C0.4375 23.5846 1.41881 24.5659 2.625 24.5659H14.4375V26.7534C14.4375 27.477 15.0264 28.0659 15.75 28.0659H26.25C26.9736 28.0659 27.5625 27.477 27.5625 26.7534V18.8784C27.5625 18.1548 26.9736 17.5659 26.25 17.5659V17.5659ZM18.8125 17.5659H17.9375V14.247L18.8125 13.372V17.5659ZM14.4375 18.8784V21.9409H3.0625V4.44092H5.768C5.94913 4.94886 6.43037 5.31592 7 5.31592H13.125C13.6946 5.31592 14.1759 4.94886 14.357 4.44092H17.0625V7.75979L12.3112 12.511L11.0128 15.9734C10.9629 16.106 10.9375 16.2451 10.9375 16.3877C10.9375 17.0374 11.466 17.5659 12.1157 17.5659C12.2579 17.5659 12.3974 17.5405 12.5291 17.4911L15.9919 16.1922L17.0625 15.122V17.5659H15.75C15.0264 17.5659 14.4375 18.1548 14.4375 18.8784V18.8784ZM14.5281 14.594L22.0938 7.02829L23.0064 7.94092L15.5076 15.4397L12.2211 16.6721C12.0361 16.7408 11.8125 16.5912 11.8125 16.3877C11.8125 16.351 11.8191 16.3155 11.8318 16.2819L13.0638 12.9958L20.5625 5.49704L21.4751 6.40967L13.9094 13.9754L14.5281 14.594ZM23.7374 2.32211C24.0638 1.99573 24.4978 1.81592 24.9594 1.81592C25.9122 1.81592 26.6875 2.59117 26.6875 3.54404C26.6875 4.00561 26.5077 4.43961 26.1813 4.76598L23.625 7.32229L21.1811 4.87842L23.7374 2.32211ZM18.8125 4.00342V6.00936L17.9375 6.88436V4.44092C17.9375 3.95836 17.5451 3.56592 17.0625 3.56592H14.4375V2.69092H17.5C18.2236 2.69092 18.8125 3.27979 18.8125 4.00342ZM6.5625 2.25342C6.5625 2.01236 6.7585 1.81592 7 1.81592H13.125C13.3665 1.81592 13.5625 2.01236 13.5625 2.25342V4.00342C13.5625 4.24448 13.3665 4.44092 13.125 4.44092H7C6.7585 4.44092 6.5625 4.24448 6.5625 4.00342V2.25342ZM2.625 23.6909C1.90137 23.6909 1.3125 23.102 1.3125 22.3784V4.00342C1.3125 3.27979 1.90137 2.69092 2.625 2.69092H5.6875V3.56592H3.0625C2.57994 3.56592 2.1875 3.95836 2.1875 4.44092V21.9409C2.1875 22.4235 2.57994 22.8159 3.0625 22.8159H14.4375V23.6909H2.625ZM26.6875 26.7534C26.6875 26.9949 26.4915 27.1909 26.25 27.1909H15.75C15.5085 27.1909 15.3125 26.9949 15.3125 26.7534V18.8784C15.3125 18.6369 15.5085 18.4409 15.75 18.4409H26.25C26.4915 18.4409 26.6875 18.6369 26.6875 18.8784V26.7534Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M19.6875 19.3159H20.5625V21.0659H19.6875V19.3159Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M21.4375 19.3159H22.3125V21.0659H21.4375V19.3159Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M23.1875 25.4409H24.0625V26.3159H23.1875V25.4409Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M21.4375 25.4409H22.3125V26.3159H21.4375V25.4409Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M24.9375 25.4409H25.8125V26.3159H24.9375V25.4409Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M21.4375 23.6909H25.8125V24.5659H21.4375V23.6909Z"
                                                    fill="#1B1E2D"></path>
                                                <path
                                                    d="M8.87819 5.44409L8.13138 6.1909H3.9375V10.5659H8.3125V7.24703L9.49681 6.06272L8.87819 5.44409ZM7.4375 9.6909H4.8125V7.0659H7.25638L6.125 8.19728L5.55931 7.63159L4.94069 8.25022L6.125 9.43453L7.4375 8.12203V9.6909Z"
                                                    fill="#1B1E2D"></path>
                                                <path
                                                    d="M3.9375 15.8159H8.3125V11.4409H3.9375V15.8159ZM4.8125 12.3159H7.4375V14.9409H4.8125V12.3159Z"
                                                    fill="#1B1E2D"></path>
                                                <path
                                                    d="M3.9375 21.0659H8.3125V16.6909H3.9375V21.0659ZM4.8125 17.5659H7.4375V20.1909H4.8125V17.5659Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 6.19092H13.5625V7.06592H10.0625V6.19092Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 7.94092H13.5625V8.81592H10.0625V7.94092Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 9.69092H13.5625V10.5659H10.0625V9.69092Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 18.4409H13.5625V19.3159H10.0625V18.4409Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 20.1909H13.5625V21.0659H10.0625V20.1909Z"
                                                    fill="#1B1E2D"></path>
                                            </svg>
                                            <p>Thông tin sản phẩm</p>
                                        </div>

                                    </div>

                                    
                                </div>
                            </div>

                            <div class="product-detail-center details-pro col-12 col-md-12 col-lg-6">
                               
                                <div class="price-box clearfix">
                                    <span class="special-price">
                                        <span class="price product-price">{{number_format($products->Gia_tien, 0, ',',
                                            ',')}} VNĐ</span>
                                    </span>
                                </div>

                                <!-- <div class="group-power">
                                    <div class="inventory_quantity">
                                        <span class="a-stock a2"><span class="a-stock">Tình trạng: <strong>98</strong></span></span>
                                    </div>
                                </div> -->
                                <div id="product">
                                    <form class="form-product">
                                        <input type="hidden" value="" class="product-option-id"
                                            name="product_option_id">
                                        <textarea id="single-product-option" style="display: none;">[]</textarea>
                                        <!-- end -->
                                        <style>
                                            .out-of {
                                                border: 1px solid #cfcfcf !important;
                                                color: #cfcfcf !important;
                                            }
                                        </style>
                                        <div class="options-box"></div>
                                        


                                        <div class="clearfix from-action-addcart">
                                            

                                            <div id="mua"class="btn-mua">
                                                <input type="hidden" name="product_id" value="{{$product->Ma_sp}}">
                                                <button id="button-cart" type="button"
                                                    onclick="window.location.href='{{URL::to('/Add-cart/'.$products->Ma_sp)}}'"
                                                    class="btn btn-lg btn-gray btn-cart btn_buy add_to_cart">
                                                    <span>
                                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.625 17.3784C6.24632 17.3784 6.75 16.8747 6.75 16.2534C6.75 15.6321 6.24632 15.1284 5.625 15.1284C5.00368 15.1284 4.5 15.6321 4.5 16.2534C4.5 16.8747 5.00368 17.3784 5.625 17.3784Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M13.5 17.3784C14.1213 17.3784 14.625 16.8747 14.625 16.2534C14.625 15.6321 14.1213 15.1284 13.5 15.1284C12.8787 15.1284 12.375 15.6321 12.375 16.2534C12.375 16.8747 12.8787 17.3784 13.5 17.3784Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M2.80159 2.08061C2.77609 1.9531 2.70719 1.83836 2.60663 1.75591C2.50606 1.67347 2.38004 1.62842 2.25 1.62842H0V2.75342H1.78875L3.94841 13.5512C3.97391 13.6787 4.04281 13.7935 4.14337 13.8759C4.24394 13.9584 4.36996 14.0034 4.5 14.0034H14.625V12.8784H4.96125L4.51125 10.6284H14.625C14.753 10.6284 14.8771 10.5848 14.977 10.5047C15.0768 10.4246 15.1463 10.3129 15.1741 10.188L16.45 4.44092H15.2984L14.174 9.50342H4.28625L2.80159 2.08061Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M10.125 3.87842V1.62842H9V3.87842H6.75V5.00342H9V7.25342H10.125V5.00342H12.375V3.87842H10.125Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </span>
                                                    <span>Thêm vào giỏ</span>
                                                </button>
                                                <!-- <button id="button-buy" type="button"
                                                    class="btn btn-lg btn-gray btn_buy btn-buy-now">
                                                    Mua ngay
                                                </button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            
                        </div>

                    </div>

                    <aside class="right right-content col-md-4 col-md-pull-8">


                        <script type="text/javascript">
                            window.addEventListener('DOMContentLoaded', (event) => {
                                $('.menu_mega').append($('.menu_mega_content'));
                                $('.menu_mega_content').show();
                            });
                        </script>
                        <div class="wrapper-policy">
                            <div class="content-policy">
                                <div class="policy-title">
                                    <span>Yên tâm mua hàng</span>
                                </div>
                                <ul class="policy-list">
                                    <li class="policy-item">Uy tín 20 năm xây dựng và phát triển</li>
                                    <li class="policy-item">Sản phẩm chính hãng 100%</li>
                                    <li class="policy-item">Trả góp lãi suất 0% toàn bộ giỏ hàng</li>
                                    <li class="policy-item">Trả bảo hành tận nơi sử dụng</li>
                                    <li class="policy-item">Bảo hành tận nơi cho doanh nghiệp</li>
                                    <li class="policy-item">Ưu đãi riêng cho học sinh sinh viên</li>
                                    <li class="policy-item">Vệ sinh miễn phí trọn đời PC, Laptop</li>
                                </ul>
                            </div>
                        </div>

                        <style type="text/css">
                            .wrapper-policy {
                                border: 1px solid var(--bg_hide_color);
                                border-radius: 5px;
                            }

                            .wrapper-policy .policy-title {
                                background: var(--bg_hide_color);
                                padding: 10px;
                                font-weight: 600;
                            }

                            .wrapper-policy .policy-list {
                                list-style-type: disc;
                                padding: 10px 10px 10px 30px;
                                margin: 0;
                            }
                        </style>
                        
                    </aside>
                </div>

                <div class="section product-related">
                    <div class="section-product__title">
                        <h2 class="section-product__name">
                            <a href="javascript:void(0)">Sản phẩm liên quan</a>
                        </h2>
                    </div>
                    <div class="section-product__content">
                        <div class="tab-content current">
                            <div class="swiper-container">
                                <div class="swiper-iwish-1 swiper-container-initialized swiper-container-horizontal"
                                    style="cursor: grab;">
                                    <div class="swiper-wrapper" id="swiper-wrapper-4fd003cb78e46eed" aria-live="polite"
                                        style="transform: translate3d(0px, 0px, 0px);">
                                        @foreach ($product_Related as $Related)
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4"
                                            style="width: 220px; margin-right: 20px;">
                                            
                                                
                                            
                                            <div class="product-card">
                                                <a
                                                    href="">
                                                    <div class="product-card__top">
                                                        <div class="product-img">
                                                            <img width="240" height="240"
                                                                src="{{URL::to('uploads/product_imgs/' . $Related->Hinh_anh_product)}}"
                                                                data-src=""
                                                                alt="iPhone 12 Pro Max 256GB Chính Hãng (VN/A)"
                                                                class="lazyload img-responsive center-block">
                                                        </div>
                                                        <div style="min-height: 23px"></div>
                                                    </div>
                                                    <div class="product-card__center">
                                                        
                                                        <div class="product-name text-ellipsis ellipsis-2">{{$Related->Ten_sp}}</div>
                                                        <div class="product-price ">
                                                            <span class="special-price">
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                            <span class="old-price">{{number_format($products->Gia_tien, 0, ',',
                                            ',')}} VNĐ
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            
                                            </div>
                                            
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-4fd003cb78e46eed"
                                        aria-disabled="true"></div>
                                    <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button"
                                        aria-label="Next slide" aria-controls="swiper-wrapper-4fd003cb78e46eed"
                                        aria-disabled="true"></div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <style type="text/css">
                    .section_maybe_iwish .swap:after {
                        content: "";
                        
                        position: absolute;
                        top: 43px;
                        right: -6px;
                        height: 110px;
                        width: 121px;
                        z-index: 9
                    }
                </style>
            </div>
        </div>

    </section>
</section>
<?php } ?>
<script>
        function AddCart(id){
            $.ajax({
                url: 'Add-cart/'+id,
                type: 'GET',
            }).done(function(response){
                console.log(response);
                $('#mua').empty();
                $('#mua').html(response);
                alertify.success('Đã thêm sản phẩm vào giỏ');
            })
        }
    </script>
@endsection