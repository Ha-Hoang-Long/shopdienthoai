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
                    <!-- <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                        <a itemprop="item" href="https://vmartplus.w2.exdomain.net/product/productall">
                            <span itemprop="name">Sản phẩm</span>
                        </a>                                
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                        <meta itemprop="position" content="1">    
                    </li> -->
                    <?php foreach($product as $key => $products) {?>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                        <a itemprop="item" href="https://vmartplus.w2.exdomain.net/product/category?path=385">
                            <span itemprop="name">{{$products->Ten_danh_muc}}</span>
                        </a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem" class="">
                        <a itemprop="item" href="https://vmartplus.w2.exdomain.net/product/category?path=386">
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
                    <!-- <div class="btn-compare" onclick="compare.add('1853');">
                        <span class="non-compare">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1 7.50348V7.40348H12H8.6V4.00348V3.90348H8.5H7.5H7.4V4.00348V7.40348H4H3.9V7.50348V8.50348V8.60348H4H7.4V12.0035V12.1035H7.5H8.5H8.6V12.0035V8.60348H12H12.1V8.50348V7.50348ZM8 2.10348C11.2448 2.10348 13.9 4.75871 13.9 8.00348C13.9 11.2483 11.2448 13.9035 8 13.9035C4.75523 13.9035 2.1 11.2483 2.1 8.00348C2.1 4.75871 4.75523 2.10348 8 2.10348ZM8 0.903479C4.09477 0.903479 0.9 4.09825 0.9 8.00348C0.9 11.9087 4.09477 15.1035 8 15.1035C11.9052 15.1035 15.1 11.9087 15.1 8.00348C15.1 4.09825 11.9052 0.903479 8 0.903479Z" fill="#027DEE" stroke="#027DEE" stroke-width="0.2"></path>
                            </svg>
                        </span>
                        <span class="check-compare">                          
                            <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g data-name="checkmark-circle-2"><rect width="24" height="24" opacity="0"></rect><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path><path d="M14.7 8.39l-3.78 5-1.63-2.11a1 1 0 0 0-1.58 1.23l2.43 3.11a1 1 0 0 0 .79.38 1 1 0 0 0 .79-.39l4.57-6a1 1 0 1 0-1.6-1.22z"></path></g></g></svg>
                        </span>
                        <span class="btn-name">So sánh</span>
                    </div> -->
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
                                                    data-image="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/san_pham/OPPO-Reno-5-500x500.png"
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
                                                href="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/danh_muc_sp/icon18-500x500.png"
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="4 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                    data-image="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/danh_muc_sp/icon18-500x500.png"
                                                    class="img-responsive mx-auto d-block swiper-lazy lazyload"
                                                    style="">
                                            </a>
                                            <a class="swiper-slide" data-hash="3"
                                                href="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/danh_muc_sp/icon13-500x500.png"
                                                title="Điện thoại OPPO Reno5 (8GB|128GB)" role="group"
                                                aria-label="5 / 5" style="width: 378px; margin-right: 10px;">
                                                <img src="{{asset('uploads/product_imgs/'.$products->Hinh_anh_product)}}"
                                                    alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                    data-image="https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/danh_muc_sp/icon13-500x500.png"
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

                                    <div class="banner-detail" style="margin-top: 10px">
                                        <img src="image/catalog/vmartplus/banner/product_detail_page.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="product-detail-center details-pro col-12 col-md-12 col-lg-6">
                                <!-- <div class="product-reviewed">
                                    <span data-number="5" data-score="3" class="zozoweb-product-reviews-star" id="zozoweb-prv-summary-star" style="color: #EDD500;">
                                        <i data-alt="1" class="fa fa-star"></i>
                                        <i data-alt="2" class="fa fa-star"></i>
                                        <i data-alt="3" class="fa fa-star"></i>
                                        <i data-alt="4" class="far fa-star"></i>
                                        <i data-alt="5" class="far fa-star"></i>
                                    </span>
                                    <span class="product-count-reviewed">16 đánh giá</span>
                                </div> -->
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
                                        <!-- <div class="promotion-box">
                                            <div class="promotion-head">
                                                <span class="promotion-icon">                                      
                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.99242 10.4985C6.50995 10.4985 2.14685 10.4985 2.14685 10.4985C1.68368 10.4985 1.30469 10.8775 1.30469 11.3406V17.6615C1.30469 18.1246 1.68368 18.5036 2.14685 18.5036C2.14685 18.5036 6.60125 18.5036 8.09071 18.5036C8.28883 18.5036 8.28883 18.2907 8.28883 18.2907V10.7847C8.28876 10.7847 8.28877 10.4985 7.99242 10.4985Z" fill="#D70018"/>
                                                        <path d="M15.8531 10.4985C15.8531 10.4985 11.4733 10.4985 10.0135 10.4985C9.65782 10.4985 9.71108 10.8689 9.71108 10.8689V18.2976C9.71108 18.2976 9.7082 18.5034 9.92214 18.5034C11.4049 18.5034 15.853 18.5034 15.853 18.5034C16.3162 18.5034 16.6952 18.1245 16.6952 17.6613V11.3406C16.6953 10.8775 16.3163 10.4985 15.8531 10.4985Z" fill="#D70018"/>
                                                        <path d="M8.28878 5.52517C8.28878 5.52517 8.28878 5.23981 8.0068 5.23981C6.31823 5.23981 1.19586 5.23981 1.19586 5.23981C0.732691 5.23981 0.353699 5.6188 0.353699 6.08191V8.71068C0.353699 9.17385 0.732691 9.55278 1.19586 9.55278C1.19586 9.55278 6.34118 9.55278 8.02987 9.55278C8.28878 9.55278 8.28878 9.32822 8.28878 9.32822V5.52517Z" fill="#D70018"/>
                                                        <path d="M16.8041 5.23981C16.8041 5.23981 11.6796 5.23981 9.97145 5.23981C9.71124 5.23981 9.71124 5.48774 9.71124 5.48774V9.33344C9.71124 9.33344 9.71124 9.55278 10.0276 9.55278C11.7217 9.55278 16.8041 9.55278 16.8041 9.55278C17.2673 9.55278 17.6463 9.17385 17.6463 8.71068V6.08191C17.6463 5.6188 17.2673 5.23981 16.8041 5.23981Z" fill="#D70018"/>
                                                        <path d="M5.42439 4.61674C5.03907 4.61674 4.68714 4.58619 4.37852 4.52587C3.59465 4.37273 3.05588 4.07467 2.73144 3.61475C2.44074 3.20256 2.35177 2.69442 2.46693 2.10436C2.66867 1.072 3.36199 0.503479 4.41902 0.503479C4.64272 0.503479 4.88838 0.52931 5.14927 0.580296C5.81289 0.70994 6.66168 1.09047 7.41984 1.59818C8.70616 2.45967 8.76978 2.99524 8.70573 3.32319C8.61155 3.80507 8.16114 4.1494 7.32873 4.37592C6.76635 4.52894 6.07224 4.61674 5.42439 4.61674ZM4.41908 1.85324C4.00971 1.85324 3.86903 1.9676 3.79178 2.36316C3.72858 2.68656 3.80829 2.79952 3.83442 2.83664C3.94388 2.99187 4.229 3.12133 4.63732 3.20103C4.85765 3.2441 5.12988 3.26686 5.42432 3.26686C6.07181 3.26686 6.64223 3.16875 7.02073 3.06144C7.04828 3.05365 7.09104 3.02107 7.04521 2.99377C6.55038 2.59066 5.64508 2.05239 4.89047 1.90496C4.71469 1.87072 4.55602 1.85324 4.41908 1.85324Z" fill="#D70018"/>
                                                        <path d="M12.5951 4.6168C12.5951 4.6168 12.5951 4.6168 12.595 4.6168C11.9471 4.6168 11.2531 4.529 10.6907 4.37598C9.85821 4.14952 9.40786 3.80513 9.31368 3.32331C9.24968 2.99536 9.31319 2.45979 10.5996 1.5983C11.3577 1.09059 12.2065 0.710062 12.8702 0.580418C13.1311 0.529432 13.3768 0.503601 13.6003 0.503601C14.6575 0.503601 15.3508 1.07218 15.5523 2.10455C15.6676 2.69454 15.5787 3.20268 15.288 3.61487C14.9635 4.07485 14.4248 4.37285 13.6408 4.526C13.3323 4.58618 12.9803 4.6168 12.5951 4.6168ZM10.985 2.98549C10.9411 3.01095 10.9624 3.05114 10.9851 3.0577C11.3634 3.16648 11.9399 3.26698 12.595 3.26698C12.8895 3.26698 13.1616 3.24422 13.382 3.20115C13.7903 3.12139 14.0755 2.99199 14.1849 2.83676C14.2112 2.79964 14.2909 2.68669 14.2276 2.36328C14.1504 1.96772 14.0096 1.85336 13.6002 1.85336C13.4633 1.85336 13.3048 1.87078 13.1289 1.90514C12.3742 2.05252 11.4798 2.58232 10.985 2.98549Z" fill="#D70018"/>
                                                    </svg>
                                                </span>
                                                <span class="promotion-title">Khuyến mãi</span>
                                            </div>
                                            <div class="promotion-content">
                                                <div class="promotion-item">
                                                    <p class="promotion-number">1</p>
                                                    <a class="promotion-text" href="" target="_blank">
                                                        Ưu đãi phòng chờ hạng thương gia <span>(Xem chi tiết)</span>
                                                    </a>
                                                </div>
                                                <div class="promotion-item">
                                                    <p class="promotion-number">2</p>
                                                    <a class="promotion-text" href="" target="_blank">
                                                        Tặng gói combo ăn uống, giải trí trị giá đến 1,700,000đ <span>(Xem chi tiết)</span>
                                                    </a>
                                                </div>
                                                <div class="promotion-item">
                                                    <p class="promotion-number">3</p>
                                                    <a class="promotion-text" href="" target="_blank">
                                                        Giảm giá 30% cho gói Bảo hành mở rộng Samsung Care+ 12 tháng <span>(Xem chi tiết)</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> -->


                                        <div class="clearfix from-action-addcart">
                                            <!-- <div class="qty-ant clearfix custom-btn-number">
                                                <label class="d-none">Số lượng:</label>
                                                <div class="custom custom-btn-numbers clearfix input_number_product">
                                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;" class="btn-minus btn-cts" type="button">–</button>
                                                    <input aria-label="Số lượng" type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" class="btn-plus btn-cts" type="button">+</button>
                                                </div>
                                            </div> -->

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
                                                <button id="button-buy" type="button"
                                                    class="btn btn-lg btn-gray btn_buy btn-buy-now">
                                                    Mua ngay
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="col-lg-12 col-12 product-tab e-tabs not-dqtab">
                                <ul class="tabs tabs-title clearfix hidden current">
                                    <li class="tab-link current" data-tab="tab-description">
                                        <span>Mô tả</span>
                                    </li>
                                </ul>

                                <div id="tab-description" class="tab-content content_extab current">
                                    <div class="rte product_getcontent">
                                        <div class="ba-text-fpt has-height">
                                            <h3>Thiết kế đẹp đậm chất OPPO Reno Series</h3>
                                            <p>Có thể nói OPPO Reno5 là mẫu điện thoại phô diễn được đỉnh cao thiết kế
                                                và công nghệ chế tác của OPPO khi bề mặt lưng được phủ lớp Reno Glow với
                                                ngàn tinh thể phát sáng siêu nhỏ tạo nên hiệu ứng chuyển sắc vô cùng hút
                                                mắt.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-231120-031101.jpg"><img
                                                        title="Thiết kế mặt lưng | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-231120-031101.jpg"></a>
                                            </p>
                                            <p>Đặc biệt, với lớp phủ huỳnh quang độc đáo, giúp cho cụm camera sau cùng
                                                phần cạnh trên của chiếc điện thoại hiện lên trong bóng tối với màu xanh
                                                ngọc tuyệt đẹp.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-2-1.jpg"><img
                                                        title="Lớp phủ huỳnh quang giúp phát sáng vào ban đêm | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-2-1.jpg"></a>
                                            </p>
                                            <p>Mặt trước OPPO Reno5 cũng ấn tượng không kém với&nbsp;<a
                                                    title="Tham khảo các mẫu điện thoại có màn hình tràn viền tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-man-hinh-tran-vien"
                                                    type="Tham khảo các mẫu điện thoại có màn hình tràn viền tại Thegioididong.com">màn
                                                    hình tràn viền</a>&nbsp;được làm cong nhẹ 2.5D. Hai bên cạnh viền
                                                siêu mỏng, thiết kế camera đục lỗ giúp không gian hiển thị được mở rộng
                                                tối đa.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-231320-031318.jpg"><img
                                                        title="Màn hình tràn viền với thiết kế đục lỗ | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-231320-031318.jpg"></a>
                                            </p>
                                            <p>Các góc cạnh của OPPO Reno5 cũng được bo cong mềm mại về 2 phía bên cạnh
                                                của máy giúp máy nhìn trông mỏng hơn và tạo sự dễ chịu mỗi khi cầm sử
                                                dụng.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-133821-103834.jpg"><img
                                                        title="Thiết kế mỏng nhẹ, cầm nắm dễ dàng | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-133821-103834.jpg"></a>
                                            </p>
                                            <h3>Bức phá hiệu năng với vi xử lý Snapdragon 720G mới</h3>
                                            <p>Reno5 được OPPO ưu ái trang bị vi xử lý Snapdragon 720G, hậu tố “G” phía
                                                sau Snapdragon 720 ý muốn nói đây là dòng chip chuyên game đi kèm tính
                                                năng Elite Gaming của Qualcomm.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-181120-031138.jpg"><img
                                                        title="Trang bị chip chuyên game Snapdragon 720G | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-181120-031138.jpg"></a>
                                            </p>
                                            <p>Không phải bàn về hiệu năng của Snapdragon 720G, khi đây là vi xử lý
                                                chuyên&nbsp;<a
                                                    title="Tham khảo thêm các mẫu điện thoại cấu hình cao chơi game mượt tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-choi-game" target="_blank"
                                                    rel="noopener"
                                                    type="Tham khảo thêm các mẫu điện thoại cấu hình cao chơi game mượt tại Thegioididong.com">chơi
                                                    game</a>&nbsp;với những nâng cấp ấn tượng về xung nhịp lẫn khả năng
                                                đồ họa, hứa hẹn mang đến trải nghiệm game đỉnh cao.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-180520-030502.png"><img
                                                        title="Khả năng chơi game đồ họa cực mượt | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-180520-030502.png"></a>
                                            </p>
                                            <p>Bên cạnh đó, OPPO Reno5 còn chiếm ưu thế về lưu trữ và đa nhiệm khi trang
                                                bị&nbsp;<a
                                                    title="Tham khảo các mẫu smartphone có dung lượng RAM từ 8 GB trở lên tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-ram-8gb-tro-len"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo các mẫu smartphone có dung lượng RAM từ 8 GB trở lên tại Thegioididong.com">RAM
                                                    8 GB</a>&nbsp;tốc độ LPDDR4x cùng&nbsp;<a
                                                    title="Tham khảo các mẫu điện thoại có bộ nhớ trong từ 128 GB đến 256 GB tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-rom-128-den-256gb"
                                                    target="_blank" rel="noopener">bộ nhớ trong 128 GB</a>&nbsp;UFS 2.1,
                                                OPPO Reno5 vẫn dư sức cho bạn thoải mái cài đặt ứng dụng, lưu trữ ảnh,
                                                nhạc, video, đáp ứng đủ nhu cầu lưu trữ của bạn.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-231620-031631.jpg"><img
                                                        title="Khay gắn sim kép | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-231620-031631.jpg"></a>
                                            </p>
                                            <p>Qua phần đánh giá hiệu năng Antutu, OPPO Reno5 đạt được 287.975 điểm, với
                                                số điểm này dễ dàng giúp máy chiến hầu hết các tựa game từ nhẹ đến nặng
                                                một cách mượt mà, ổn định.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-1-3.jpg"><img
                                                        title="Antutu 287.975 điểm | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-1-3.jpg"></a>
                                            </p>
                                            <h3>Màn hình lớn chuyển động 90 Hz mượt mà</h3>
                                            <p>Màn hình chính là điểm cộng giúp cho Reno5 vượt trội trong tầm giá, khi
                                                tích hợp tần số quét 90 Hz và tốc độ lấy mẫu cảm ứng 180 Hz, mang đến độ
                                                mượt mà trong trải nghiệm vuốt chạm hàng ngày và cảm ứng siêu nhạy không
                                                độ trễ khi chơi game.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-231920-031951.jpg"><img
                                                        title="Sở hữu tần số quét cao 90 Hz | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-231920-031951.jpg"></a>
                                            </p>
                                            <p>Sở hữu màn hình rộng cùng tấm nền AMOLED Full HD+ sắc nét, OPPO Reno5
                                                mang đến trải nghiệm đẳng cấp với màu sắc sống động, độ sáng cao, màu
                                                đen sâu thu hút bạn tập trung vào nội dung giải trí.</p>
                                            <h3>Camera chụp siêu nét, selfie cực đỉnh</h3>
                                            <p>OPPO Reno5 dùng chung hệ thống cảm biến cao cấp trên&nbsp;<a
                                                    title="Tham khảo giá điện thoại OPPO Reno5 Pro chính hãng tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd/oppo-reno5-pro"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo giá điện thoại OPPO Reno5 Pro chính hãng tại Thegioididong.com">OPPO
                                                    Reno5 Pro</a>&nbsp;với cụm 4 camera sau gồm camera chính 64
                                                MP,&nbsp;<a
                                                    title="Tham khảo các mẫu điện thoại có camera chụp góc rộng siêu nét tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-camera-goc-rong"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo các mẫu điện thoại có camera chụp góc rộng siêu nét tại Thegioididong.com">camera
                                                    góc siêu rộng</a>&nbsp;8 MP,&nbsp;<a
                                                    title="Tham khảo các dòng smartphone có camera macro chụp cận tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-camera-macro"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo các dòng smartphone có camera macro chụp cận tại Thegioididong.com">camera
                                                    macro</a>&nbsp;2 MP và camera&nbsp;<a
                                                    title="Tham khảo những dòng smartphone trang bị camera chụp chân dùng xóa phông tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-camera-xoa-phong"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo những dòng smartphone trang bị camera chụp chân dùng xóa phông tại Thegioididong.com">xóa
                                                    phông</a>&nbsp;2 MP hứa hẹn đem đến chất lượng ảnh vô cùng ấn tượng.
                                            </p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-182120-032144.jpg"><img
                                                        title="Hệ thống camera sau | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-182120-032144.jpg"></a>
                                            </p>
                                            <p>Cảm biến 64 MP cùng các camera phụ cung cấp nhiều tùy chọn chụp đa dạng
                                                từ chụp cận cảnh đến góc rộng, xóa phông dù ngày hay đêm, thỏa mãn đam
                                                mê nhiếp ảnh của bạn.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-182920-032944.jpg"><img
                                                        title="Ảnh chụp cho ra độ chi tiết cao | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-182920-032944.jpg"></a>
                                            </p>
                                            <p>Thách thức bóng đêm với cảm biến Sony cao cấp và thuật toán xử lý bằng AI
                                                cải tiến giúp thu sáng và tái tạo các chi tiết rõ nét và cho ra những
                                                tấm hình tỏa sáng trong đêm.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-180520-030550.png"><img
                                                        title="Ảnh chụp đêm ở camera sau | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-180520-030550.png"></a>
                                            </p>
                                            <p>Giờ đây, Reno5 đã có thể quay phim HDR, bạn có thể quay phim khi ngược
                                                sáng mà các chi tiết vẫn được giữ lại đầy đủ cùng cân bằng trắng được
                                                thể hiện tự nhiên giữa các vùng chênh sáng.&nbsp;</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-183620-033655.jpg"><img
                                                        title="Ảnh chụp đêm ở sau camera sau | OPP Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-183620-033655.jpg"></a>
                                            </p>
                                            <p>Cùng với đó là công nghệ siêu chống rung 3.0, chế độ quay đồng thời từ cả
                                                camera trước và sau, chỉnh sửa video dễ dàng với Soloop giúp bạn sáng
                                                tạo những nội dung vlog thú vị để chia sẻ với bạn bè.</p>
                                            <p>Cực phẩm camera trước 44 MP của OPPO sẽ làm hài lòng các tín đồ chuyên
                                                chụp ảnh selfie bởi tính năng làm đẹp AI vô cùng tự nhiên, không cần đến
                                                ứng dụng chụp hình nào khác vì OPPO Reno5 đã sở hữu camera selfie tốt
                                                nhất hiện nay.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-180320-030314.png"><img
                                                        title="Ảnh chụp selfie | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-180320-030314.png"></a>
                                            </p>
                                            <h3>Sạc nhanh 50 W nhanh đến ấn tượng</h3>
                                            <p>Trang bị viên pin dung lượng 4310 mAh, OPPO Reno5 cho bạn một ngày làm
                                                việc, trải nghiệm hay giải trí mà không cần lo nghĩ về pin.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-9.jpg"><img
                                                        title="Tích hợp sạc nhanh 50 W | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-9.jpg"></a>
                                            </p>
                                            <p>Công nghệ&nbsp;<a
                                                    title="Tham khảo các mẫu điện thoại có tích hợp công nghệ sạc nhanh tại Thegioididong.com"
                                                    href="https://www.thegioididong.com/dtdd-sac-pin-nhanh"
                                                    target="_blank" rel="noopener"
                                                    type="Tham khảo các mẫu điện thoại có tích hợp công nghệ sạc nhanh tại Thegioididong.com">sạc
                                                    pin nhanh</a>&nbsp;với công suất 50 W tiên phong về tốc độ sạc. OPPO
                                                Reno5 đáp ứng cuộc sống năng động của bạn chỉ với 5 phút sạc là bạn đã
                                                có thể trải nghiệm thêm nhiều giờ liền và chưa đầy 1 tiếng là pin được
                                                nạp đầy 100%, sẵn sàng cho cả ngày sử dụng.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-232320-032303.jpg"><img
                                                        title="Sạc nhanh qua cổng sạc Type-C | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-232320-032303.jpg"></a>
                                            </p>
                                            <h3>ColorOS đầy màu sắc, đa tính năng, lướt mượt mà</h3>
                                            <p>OPPO Reno5 được cài sẵn ColorOS 11.1 mới nhất cùng với phiên
                                                bản&nbsp;Android&nbsp;11 vừa được ra mắt gần đây, mang đến tính năng thú
                                                vị như chế độ Dark Mode, trợ lý ảo Breeno, hay thư giãn cùng OPPO Relax
                                                2.0, cho bạn tận hưởng những âm thanh thường ngày.</p>
                                            <p><a
                                                    href="https://www.thegioididong.com/images/42/220438/oppo-reno5-184020-034039.jpg"><img
                                                        title="Chạy hệ điều hành mới nhất Android 11 | OPPO Reno5"
                                                        src="https://vmartplus.w2.exdomain.net/image/catalog/evo/oppo-reno5-184020-034039.jpg"></a>
                                            </p>
                                            <p>ColorOS 11.1 còn là bản nâng cấp đáng giá về khả năng tối ưu hệ thống
                                                giúp tốc độ phản hồi tăng 32% và độ ổn định tốc độ khung hình tăng 17%.
                                            </p>
                                            <p>Tóm lại, OPPO Reno5 là thế hệ tiếp nối đầy ấn tượng của Reno4 với nhiều
                                                nâng cấp mạnh mẽ về hiệu năng, thiết kế, phần mềm trong 1 sản phẩm duy
                                                nhất. Đặc biệt, hệ thống camera cải tiến chính là điểm hút khách, giúp
                                                cho OPPO Reno5 trở thành mẫu điện thoại chụp ảnh tốt nhất trong tầm giá.
                                            </p>
                                        </div>
                                        <div class="show-more">
                                            <div class="btn btn-default btn--view-more btn-click__popup btn-detail"
                                                data-tab="tab-info">
                                                <span class="more-text">Xem thêm <i
                                                        class="fa fa-chevron-down"></i></span>
                                                <span class="less-text">Thu gọn <i class="fa fa-chevron-up"></i></span>
                                            </div>
                                        </div>
                                    </div>
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
                        <div class="product-detail-right">
                            <!-- <div class="wrapper-stock-store">
                                <div class="stock-store-list">
                                    <div class="stock-store-item stock-store-city">
                                        <select class="stock-store-option">
                                            <option value="7">Miền Nam</option> 
                                            <option value="8">Miền Trung</option> 
                                            <option value="1">Miền Bắc</option>
                                        </select>
                                    </div>
                                    <div class="stock-store-location">
                                        <div class="stock-store-item stock-store-ward">
                                            <select class="stock-store-option">
                                                <option value="7">Miền Nam</option> 
                                                <option value="8">Miền Trung</option> 
                                                <option value="1">Miền Bắc</option>
                                            </select>
                                        </div>
                                        <div class="stock-store-item stock-store-zone">
                                            <select class="stock-store-option">
                                                <option value="7">Miền Nam</option> 
                                                <option value="8">Miền Trung</option> 
                                                <option value="1">Miền Bắc</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="stock-store-count">
                                        Có <strong>2</strong> cửa hàng có sản phẩm
                                    </p>
                                    <div class="stock-store-address">
                                        <div class="stock-store-address__item">
                                            <div class="stock-store-address__icon">
                                                <svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                            </div> 
                                            <div class="stock-store-address__phone"><a href="tel:02471007477" class="has-text-danger has-text-weight-semibold">02471007477</a></div> 
                                            <div title="219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên" class="address">| 219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên
                                            </div>
                                        </div>
                                        <div class="stock-store-address__item">
                                            <div class="stock-store-address__icon">
                                                <svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                            </div> 
                                            <div class="stock-store-address__phone"><a href="tel:02471007477" class="has-text-danger has-text-weight-semibold">02471007477</a></div> 
                                            <div title="219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên" class="address">| 219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên
                                            </div>
                                        </div>
                                        <div class="stock-store-address__item">
                                            <div class="stock-store-address__icon">
                                                <svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                                                </svg>
                                            </div> 
                                            <div class="stock-store-address__phone"><a href="tel:02471007477" class="has-text-danger has-text-weight-semibold">02471007477</a></div> 
                                            <div title="219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên" class="address">| 219 Hoàng Văn Thụ, phường Phan Đình Phùng, TP. Thái Nguyên
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
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
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4"
                                            style="width: 220px; margin-right: 20px;">
                                            <div class="product-card">
                                                <a
                                                    href="https://vmartplus.w2.exdomain.net/product/product?product_id=1852">
                                                    <div class="product-card__top">
                                                        <div class="product-img">
                                                            <img width="240" height="240"
                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                                data-src="https://vmartplus.w2.exdomain.net/image/cache/catalog/evo/iphone-12-pro-max-xanh-duong-new-600x600-600x600-d4f1f529-b76d-4a27-b5fb-671f597248f9-228x228.jpg"
                                                                alt="iPhone 12 Pro Max 256GB Chính Hãng (VN/A)"
                                                                class="lazyload img-responsive center-block">
                                                        </div>
                                                        <div style="min-height: 23px"></div>
                                                    </div>
                                                    <div class="product-card__center">
                                                        <div class="product-reviewed">
                                                            <span data-number="5" data-score="3"
                                                                class="zozoweb-product-reviews-star"
                                                                id="zozoweb-prv-summary-star" style="color: #EDD500;">
                                                                <i data-alt="1" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="2" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="3" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="4" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="5" class="far fa-star"></i>&nbsp;
                                                            </span>
                                                            <span class="product-count-reviewed">0 Đánh giá</span>
                                                        </div>
                                                        <div class="product-name text-ellipsis ellipsis-2">iPhone 12 Pro
                                                            Max 256GB Chính Hãng (VN/A)</div>
                                                        <div class="product-price ">
                                                            <span class="special-price">
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                            <span class="old-price">33,990,000đ
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <div class="product-card__bottom">
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
  </div> -->
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 4"
                                            style="width: 220px; margin-right: 20px;">
                                            <div class="product-card">
                                                <a
                                                    href="https://vmartplus.w2.exdomain.net/product/product?product_id=1851">
                                                    <div class="product-card__top">
                                                        <div class="product-img">
                                                            <img width="240" height="240"
                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                                data-src="https://vmartplus.w2.exdomain.net/image/cache/catalog/evo/a233de7dca2fbff7bbc6f8476e6ba7bf-56e2b026-8f61-4973-a17a-5a75ba5ec444-228x228.jpg"
                                                                alt="iPhone 12 128GB Chính hãng (VN/A)"
                                                                class="lazyload img-responsive center-block">
                                                        </div>
                                                        <div style="min-height: 23px"></div>
                                                    </div>
                                                    <div class="product-card__center">
                                                        <div class="product-reviewed">
                                                            <span data-number="5" data-score="3"
                                                                class="zozoweb-product-reviews-star"
                                                                id="zozoweb-prv-summary-star" style="color: #EDD500;">
                                                                <i data-alt="1" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="2" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="3" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="4" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="5" class="far fa-star"></i>&nbsp;
                                                            </span>
                                                            <span class="product-count-reviewed">0 Đánh giá</span>
                                                        </div>
                                                        <div class="product-name text-ellipsis ellipsis-2">iPhone 12
                                                            128GB Chính hãng (VN/A)</div>
                                                        <div class="product-price ">
                                                            <span class="special-price">
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                            <span class="old-price">24,990,000đ
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <div class="product-card__bottom">
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
  </div> -->
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="3 / 4"
                                            style="width: 220px; margin-right: 20px;">
                                            <div class="product-card">
                                                <a
                                                    href="https://vmartplus.w2.exdomain.net/product/product?product_id=1850">
                                                    <div class="product-card__top">
                                                        <div class="product-img">
                                                            <img width="240" height="240"
                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                                data-src="https://vmartplus.w2.exdomain.net/image/cache/catalog/evo/600x600-crop-iphone-12-mini-128gb-xtmobile-c32e1960-40fd-414b-8144-fb8517a9de97-228x228.jpg"
                                                                alt="iPhone 12 mini 64GB Chính hãng (VN/A)"
                                                                class="lazyload img-responsive center-block">
                                                        </div>
                                                        <div style="min-height: 23px"></div>
                                                    </div>
                                                    <div class="product-card__center">
                                                        <div class="product-reviewed">
                                                            <span data-number="5" data-score="3"
                                                                class="zozoweb-product-reviews-star"
                                                                id="zozoweb-prv-summary-star" style="color: #EDD500;">
                                                                <i data-alt="1" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="2" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="3" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="4" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="5" class="far fa-star"></i>&nbsp;
                                                            </span>
                                                            <span class="product-count-reviewed">0 Đánh giá</span>
                                                        </div>
                                                        <div class="product-name text-ellipsis ellipsis-2">iPhone 12
                                                            mini 64GB Chính hãng (VN/A)</div>
                                                        <div class="product-price ">
                                                            <span class="special-price">
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                            <span class="old-price">24,990,000đ
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <div class="product-card__bottom">
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
  </div> -->
                                            </div>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-label="4 / 4"
                                            style="width: 220px; margin-right: 20px;">
                                            <div class="product-card">
                                                <a
                                                    href="https://vmartplus.w2.exdomain.net/product/product?product_id=1849">
                                                    <div class="product-card__top">
                                                        <div class="product-img">
                                                            <img width="240" height="240"
                                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                                data-src="https://vmartplus.w2.exdomain.net/image/cache/catalog/evo/637170935875912528-ss-s20-ultra-den-1-228x228.jpg"
                                                                alt="Samsung Galaxy S20 Ultra"
                                                                class="lazyload img-responsive center-block">
                                                        </div>
                                                        <div style="min-height: 23px"></div>
                                                    </div>
                                                    <div class="product-card__center">
                                                        <div class="product-reviewed">
                                                            <span data-number="5" data-score="3"
                                                                class="zozoweb-product-reviews-star"
                                                                id="zozoweb-prv-summary-star" style="color: #EDD500;">
                                                                <i data-alt="1" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="2" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="3" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="4" class="far fa-star"></i>&nbsp;
                                                                <i data-alt="5" class="far fa-star"></i>&nbsp;
                                                            </span>
                                                            <span class="product-count-reviewed">0 Đánh giá</span>
                                                        </div>
                                                        <div class="product-name text-ellipsis ellipsis-2">Samsung
                                                            Galaxy S20 Ultra</div>
                                                        <div class="product-price ">
                                                            <span class="special-price">
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                            <span class="old-price">29,990,000đ
                                                                <!-- <span class="product-current">đ</span> -->
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <div class="product-card__bottom">
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
      <p style="margin: 0;">Phần mềm Office đi kèm 1 TB One Drive chỉ từ 990.000 đ</p>
  </div> -->
                                            </div>
                                        </div>
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
                        background: url('https://vmartplus.w2.exdomain.net/image/cache/catalog/vmart/banner/mblike-120x120.png') no-repeat;
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