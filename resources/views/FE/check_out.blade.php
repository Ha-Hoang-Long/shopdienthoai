<!DOCTYPE html>
<html class="flexbox ">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content=" Thanh toán" />
    <title> Thanh toán</title>
    <link rel="icon" type="image/max-icon" href="{{asset('/uploads/icon/icon.ico')}}">
    <link rel="stylesheet" href="{{asset('/css/checkout.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/checkout_v1.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


</head>

<body class="checkout-checkout ">


    <div class="content">

        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">

                            <?php if(Session::has("Cart") != null){
                                $num = 1;
                                $qt = 1;
                                foreach(Session::get("Cart")->products as $product){

                            ?>
                            <div class="order-summary-section order-summary-section-product-list"
                                data-order-summary-section="line-items">
                                <table class="product-table">

                                    <tbody>
                                        <tr class="product" data-variant-id="103">
                                            <td class="product-image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail-wrapper">
                                                        <img class="product-thumbnail-image"
                                                            alt="Điện thoại OPPO Reno5 (8GB|128GB)"
                                                            src="{{asset('uploads/product_imgs/'.$product['productInfo']->Hinh_anh_product)}}">
                                                    </div>
                                                    <span class="product-thumbnail-quantity" aria-hidden="true">{{$product['quantity']}}</span>
                                                </div>
                                            </td>
                                            <td class="product-description">
                                                <span class="product-description-name order-summary-emphasis">Điện thoại
                                                    {{$product['productInfo']->Ten_sp}}</span>
                                                <span class="product-description-option">
                                                {{number_format($product['productInfo']->Gia_tien,0, ',', ',')}}đ x {{$product['quantity']}}
                                                </span>
                                            </td>
                                            <td class="product-quantity visually-hidden">1</td>
                                            <td class="product-price">
                                                <span class="order-summary-emphasis">{{number_format($product['price'],0, ',', ',')}}đ</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <?php
                                $num++;
                                }
                            }?>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                data-order-summary-section="payment-lines">
                                <div class="panel panel-default" id="ajax-load-total">
                                    <div class="panel-body">
                                        <table class="adr-oms table">
                                            <tbody>
                                                <tr class="total-line clearfix">
                                                    <td class="total-line-name">Thành tiền</td>
                                                    <td class="total-line-name payment-due"><span
                                                            class="payment-due-price">{{number_format(Session::get("Cart")->totalPrice,0,
                                                            ',', ',')}}đ</span></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main">
                <div class="main-header">
                    <a href="javascript:void(0)"
                        onclick="document.location='https://vmartplus.w2.exdomain.net/common/home'" class="logo">
                        <h1 class="logo-text"><img
                                src="https://vmartplus.w2.exdomain.net/image/catalog/vmartplus/icons/Logo.svg"
                                alt="Vmart"></h1>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)"
                                onclick="document.location='https://vmartplus.w2.exdomain.net/checkout/cart'">Giỏ
                                hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            <a href="javascript:void(0)" class="breadcrumb-link" step="1">
                                Thông tin giao hàng </a>
                        </li>
                        <!-- <li class="breadcrumb-item ">
                            <a href="javascript:void(0)" class="breadcrumb-link" step="2">
                                Phương thức thanh toán </a>
                        </li> -->

                    </ul>

                </div>



                <div class="main-content">
                    <div class="step">
                        <form method="POST" action="{{URL::to('/add-customer')}}" name="checkout_form"
                            id="checkout_form" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="channel" value="web">
                            <div class="step-sections" step="1">
                                <div class="">
                                    <div class="section-header">
                                        <h2 class="section-title">Địa chỉ nhận hàng</h2>
                                    </div>
                                    <!--<h3 class="panel-title">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Địa chỉ nhận hàng                                </h3>-->
                                    <div class="section-content section-customer-information no-mb">
                                        <!-- <p class="section-content-text">
                                            Bạn đã có tài khoản?
                                            <a onclick="document.location='{{ route('login') }}'">Đăng
                                                nhập</a>
                                        </p> -->
                                        @guest
                                        @if (Route::has('login'))
                                        <p class="section-content-text">
                                            Bạn đã có tài khoản?
                                            <a onclick="document.location='{{ route('login') }}'">Đăng
                                                nhập</a>
                                        </p>
                                        @endif
                                        @else
                                        <p class="section-content-text">
                                            <!-- Bạn đã có tài khoản?
                                            <a onclick="document.location='{{ route('login') }}'">Đăng
                                                nhập</a> -->
                                        </p>
                                        @endguest
                                        <div class="fieldset">

                                            <div class="field required">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-firstname">Tên
                                                        đầy đủ </label>
                                                    <input type="text" name="fullname" value=""
                                                        placeholder="Ví dụ: Nguyễn Văn A"
                                                        class="field-input form-control" hide />
                                                    <!---->
                                                </div>
                                            </div>

                                            <div class="field required field-two-thirds ">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label"
                                                        for="input-email">Email</label>
                                                    <input type="email" name="email" id="input-email" value=""
                                                        placeholder="contact@yourdomain.com"
                                                        class="field-input form-control" />
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field required field-third ">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-telephone">Điện
                                                        thoại</label>
                                                    <input type="text" name="phone_number" id="input-telephone" value=""
                                                        placeholder="Ví dụ: 01234567890"
                                                        class="field-input form-control" />
                                                    <!---->
                                                </div>
                                            </div>

                                            <div class="field required">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-address">Số
                                                        nhà,tên đường</label>
                                                    <input type="text" name="apartment_number" value=""
                                                        id="input-address" placeholder="Ví dụ: Số 247 Nguyễn Văn Linh"
                                                        class="field-input form-control" />
                                                    <!---->
                                                </div>
                                            </div>

                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Tỉnh/TP</label>
                                                    <select name="province" id="city"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn tỉnh thành--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Quận/huyện</label>
                                                    <select name="District" id="district"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn quận huyện--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>
                                            <div class="field field-half">
                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                    <label class="field-label" for="input-countryid">Phường/Xã</label>
                                                    <select name="commune" id="ward"
                                                        class="field-input form-control chosen-select-deselect">
                                                        <option value="" selected disabled>--Chọn phường xã--</option>
                                                    </select>
                                                    <!---->
                                                </div>
                                            </div>


                                            <div class="field ">
                                                <div class="field-input-wrapper">
                                                    <label class="control-label field-label" for="input-comment">Lời
                                                        nhắn</label>
                                                    <textarea name="note" id="input-comment" rows="3"
                                                        class="field-input form-control"
                                                        placeholder="Ví dụ: Chuyển hàng ngoài giờ hành chính"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>




                            <div class="step-footer">
                                <div class="step-footer__by-step step-sections-footer" step="1">
                                    <div class="step-footer__by-step__flex">
                                        <button type="submit" class="step-footer-continue-btn btn btn-step"
                                            id="button-validate-form">
                                            <span class="btn-content">Tiếp tục đến phương thức thanh toán</span>
                                            <i class="btn-spinner icon icon-button-spinner"></i>
                                        </button>
                                        <a href="javascript:void(0)" class="step-footer-previous-link"
                                            onclick="document.location='{{URL::to('/list-cart')}}'">
                                            Giỏ hàng </a>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
                <div class="main-footer footer-powered-by">
                    <span id="copyright">&copy; Copyright 2022 . </span>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            district.onchange = function () {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>


    

</html>