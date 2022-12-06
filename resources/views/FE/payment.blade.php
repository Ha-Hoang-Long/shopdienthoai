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
                                                    <span class="product-thumbnail-quantity"
                                                        aria-hidden="true">{{$product['quantity']}}</span>
                                                </div>
                                            </td>
                                            <td class="product-description">
                                                <span class="product-description-name order-summary-emphasis">Điện thoại
                                                    {{$product['productInfo']->Ten_sp}}</span>
                                                <span class="product-description-option">
                                                    {{number_format($product['productInfo']->Gia_tien,0, ',', ',')}}đ x
                                                    {{$product['quantity']}}
                                                </span>
                                            </td>
                                            <td class="product-quantity visually-hidden">1</td>
                                            <td class="product-price">
                                                <span
                                                    class="order-summary-emphasis">{{number_format($product['price'],0,
                                                    ',', ',')}}đ</span>
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
                                            <tr class="total-line clearfix"><td class="total-line-name">Tổng</td><td class="total-line-price"> <span class="order-summary-emphasis">{{number_format(Session::get("Cart")->totalPrice,0,',', ',')}}đ</span></td></tr>
                                            <tr class="total-line clearfix"><td class="total-line-name">Ship</td><td class="total-line-price"> <span class="order-summary-emphasis">{{number_format(150000,0,',', ',')}}đ</span></td></tr>
                                            
                                            <tr class="total-line clearfix">
                                                    <td class="total-line-name">Thành tiền</td>
                                                    <td class="total-line-name payment-due"><span
                                                            class="payment-due-price">{{number_format(Session::get("Cart")->totalPrice+150000,0,
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
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="breadcrumb-link" step="1">
                                Thông tin giao hàng </a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            <a href="javascript:void(0)" class="breadcrumb-link" step="2">
                                Phương thức thanh toán </a>
                        </li>

                    </ul>

                </div>
                <div class="main-content">
                    <div class="step">
                        <form method="POST" action="{{URL::to('/order-place')}}" name="checkout_form" id="checkout_form"
                            enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate">
                            @csrf;
                            <input type="hidden" name="channel" value="web">
                            <div class="step-sections" step="1" style="display: none;">
                                
                            </div>
                            <div style="" class="step-sections" step="2">
                                <div id="section-shipping-rate" class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Vận chuyển</h2>
                                    </div>
                                    <div class="section-content">
                                        <div class="content-box" id="ajax-load-shipping-method">
                                            <div class="content-box-row">
                                                <div class="radio-wrapper"><label class="radio-label"
                                                        for="shipping_method__0">
                                                        <div class="radio-input"><input id="shipping_method__0"
                                                                class="input-radio" type="radio" name="shipping_method"
                                                                onclick="updateFee()" value="geo.geo" checked="checked">
                                                        </div><span class="radio-label-primary"><strong>Phí giao hàng
                                                                tận nơi</strong><br>Phí vận chuyển toàn Quốc</span><span
                                                            class="radio-accessory content-box-emphasis">150,000đ</span>
                                                    </label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="section-payment-method" class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Phương thức thanh toán</h2>
                                    </div>
                                    <p class="text-danger"></p>
                                    <!---->
                                    <div class="section-content">
                                        <div class="content-box">
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label" for="payment-method-bank_transfer">
                                                    <div class="radio-input payment-method-checkbox">
                                                        <input id="payment-method-bank_transfer" class="input-radio"
                                                            name="payment_method" type="radio" value="bank_transfer"
                                                            checked="">
                                                    </div>
                                                    <div class="radio-content-input">
                                                        <img class="main-img"
                                                            src="{{ asset('/uploads/icon/cod.png') }}"
                                                            alt="">
                                                        <div>
                                                            <span class="radio-label-primary"><input style="font-size: medium;" type="text" name ="payment_option" value="Thanh toán khi nhận hàng" readonly="False"></input></span>
                                                            <span class="quick-tagline"></span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <!-- <div class="">
                                                <div class="payment-method-toggle box-installment installment-disabled"
                                                    id="payment-method-info-bank_transfer" style="display: block;">
                                                    <div class="disabled-cod-body">Mô tả thanh toán</div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step-footer">
                            
                            <div class="step-footer__by-step step-sections-footer" style="" step="2">
                                <div class="step-footer__by-step__flex">
                                    <button id="submit_form_button" type="submit" class="step-footer-continue-btn btn">
                                        Đặt hàng </button>
                                    <a href="javascript:void(0)" class="step-footer-previous-link btn-step-back">
                                        Quay lại thông tin giao hàng </a>
                                </div>
                            </div>
                        </div>
                            
                        </form>
                        
                    </div>

                </div>
                <div class="main-footer footer-powered-by">
                    <span id="copyright">© Copyright 2022 . </span>
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


    <!-- <script type="text/javascript">
        /*
           var currentName = localStorage.getItem('name');
            var currentEmail = localStorage.getItem('email');
            var currentAddress = localStorage.getItem('address');
            var currentPhone = localStorage.getItem('phone');
            $('#input-firstname').val(currentName);
            $('#input-email').val(currentEmail);
            $('#input-address').val(currentAddress);
            $('#input-telephone').val(currentPhone);
            */
    </script> -->
    <!-- <script type="text/javascript">
        function loadListShipping() {
            var country_id = $("select[name=country_id]").val();
            var zone_id = $("select[name=zone_id]").val();
            var ward_id = $("select[name=ward_id]").val();
            var town_id = $("select[name=town_id]").val();

            $.ajax({
                url: '/check-out/ajaxGetHtmlShipping?updateView=true',
                dataType: 'json',
                method: 'post',
                data: {
                    country_id: country_id,
                    zone_id: zone_id,
                    ward_id: ward_id,
                    town_id: town_id
                },
                beforeSend: function () {
                    /*$('#ajax-load-shipping-method').html('');*/
                },
                complete: function () {

                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#ajax-load-shipping-method').html(json['data']);
                        updateFee();
                    } else {
                        console.log(json['error_message']);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

        function updateFee() {
            var shipping_method_code = (document.querySelector('input[name="shipping_method"]:checked')) ? document.querySelector('input[name="shipping_method"]:checked').value : '';
            var invoice = ($('input[name="invoice"]').is(":checked") === true) ? $('input[name="invoice"]').is(":checked") : '';
            $.ajax({
                url: '/check-out/ajaxGetTotal',
                dataType: 'json',
                method: 'post',
                data: {
                    shipping_method_code: shipping_method_code,
                    invoice: invoice
                },
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (json) {
                    if (json['error'] == false) {
                        var html = '<table class="table">';
                        for (i = 0; i < json['data'].length; i++) {
                            if (i == json['data'].length - 1) {
                                html += '<tr class="total-line clearfix total-line-table-footer">';
                                html += '<td class="total-line-name payment-due-label">' + json['data'][i]['title'] + '</td>';
                                html += '<td class="total-line-name payment-due"><span class="payment-due-price">' + json['data'][i]['text'] + '</span></td>';
                                html += '</tr>';
                            } else {
                                html += '<tr class="total-line clearfix">';
                                html += '<td class="total-line-name">' + json['data'][i]['title'] + '</td>';
                                html += '<td class="total-line-price" > <span class="order-summary-emphasis">' + json['data'][i]['text'] + '</span></td>';
                                html += '</tr>';
                            }

                        }
                        html += '</table>';
                        $('#ajax-load-total').html(html);
                    } else {
                        alert(json['error_message']);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    </script> -->
    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('.payment-method-toggle').hide();
            $('input[name=payment_method]').click(function () {
                $('.payment-method-toggle').hide();
                $('#payment-method-info-' + $(this).val()).toggle();
                /* Cap nhat cac loai phi */
                updateFee();
            });

            var country_id = $('#input-countryid').val();
            var zone_id = '0';
            var ward_id = '0';

            $.ajax({
                url: '/check-out//ajaxGetZone?country_id=' + country_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#label-zone').append('<span class="container-spin-loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>');
                },
                complete: function () {
                    $('#label-zone .container-spin-loading').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-zone').html('');

                        html = '<select name="zone_id" id="input-zoneid" onchange="getWard()" class="field-input form-control chosen-select-deselect">';

                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['zone_id'] == zone_id) {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }

                        html += "</select>";
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                        $('#load-ajax-zone').html(html);
                        getWard();
                    } else {
                        $('#load-ajax-zone').html('<select name="zone_id" onchange="getWard()" id="input-zoneid" class="field-input form-control chosen-select-deselect"></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });

            var e = document.getElementById("input-payment-countryid");
            /* var payment_country_id = e.options[e.selectedIndex].value;*/
            var payment_country_id = $("#input-payment-countryid :selected").val();
            var payment_zone_id = '0';

            $.ajax({
                url: '/check-out/ajaxGetZone?country_id=' + payment_country_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#label-payment-zone').append('<span class="container-spin-loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>');
                },
                complete: function () {
                    $('#label-payment-zone .container-spin-loading').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-payment-zone').html('');

                        html = '<select name="payment_zone_id" id="input-payment-zoneid" class="form-control">';

                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['zone_id'] == payment_zone_id) {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }

                        html += "</select>";
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                        $('#load-ajax-payment-zone').html(html);
                    } else {
                        $('#load-ajax-payment-zone').html('<select name="payment_zone_id" id="input-payment-zoneid" class="form-control"></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });

        $('select[name=\'country_id\']').bind('change', function () {
            var e = document.getElementById("input-countryid");
            /* var country_id = e.options[e.selectedIndex].value;*/
            var country_id = $("#input-countryid :selected").val();
            var zone_id = '0';

            $.ajax({
                url: '/check-out/ajaxGetZone?country_id=' + country_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#label-zone').append('<span class="container-spin-loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>');
                },
                complete: function () {
                    $('#label-zone .container-spin-loading').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-zone').html('');

                        html = '<select name="zone_id" onchange="getWard()" id="input-zoneid" class="field-input form-control chosen-select-deselect">';

                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['zone_id'] == zone_id) {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }

                        html += "</select>";
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                        $('#load-ajax-zone').html(html);
                        getWard();
                    } else {
                        $('#load-ajax-zone').html('<select name="zone_id" onchange="getWard()" id="input-zoneid" class="field-input form-control"><option data-code="null" value="null"  selected>------Chọn------</option></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });

        $('select[name=\'payment_country_id\']').bind('change', function () {
            var e = document.getElementById("input-payment-countryid");
            /* var payment_country_id = e.options[e.selectedIndex].value;*/
            var payment_country_id = $("#input-payment-countryid :selected").val();
            var payment_zone_id = '0';

            $.ajax({
                url: '/check-out/ajaxGetZone?country_id=' + payment_country_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#label-payment-zone').append('<span class="container-spin-loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>');
                },
                complete: function () {
                    $('#label-payment-zone .container-spin-loading').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-payment-zone').html('');

                        html = '<select name="payment_zone_id" id="input-payment-zoneid" class="form-control">';

                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['zone_id'] == payment_zone_id) {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['zone_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }
                        html += "</select>";
                        $('#load-ajax-payment-zone').html(html);
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                    } else {
                        $('#load-ajax-payment-zone').html('<select name="payment_zone_id" id="input-payment-zoneid" class="form-control"></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        });
    </script> -->
    <!-- <script type="text/javascript">
        function getWard() {
            /* Load fee */
            var e = document.getElementById("input-zoneid");
            /* var select_zone_id = e.options[e.selectedIndex].value;*/
            var select_zone_id = $("#input-zoneid :selected").val();
            var ward_id = '0';
            $.ajax({
                url: '/check-out/ajaxGetWard?zone_id=' + select_zone_id,
                dataType: 'json',
                beforeSend: function () {
                    $('#label-zone').append('<span class="container-spin-loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>');
                },
                complete: function () {
                    $('#label-zone .container-spin-loading').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-ward').html('');
                        html = '<select name="ward_id" onchange="getTown()" id="input-wardid" class="field-input chosen-select-deselect form-control">';
                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['ward_id'] == ward_id) {
                                    html += '<option value="' + json['data'][i]['ward_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['ward_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }

                        html += "</select>";

                        $('#load-ajax-ward').html(html);
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                        getTown();
                    } else {
                        $('#load-ajax-ward').html('<select name="ward_id" onchange="getTown()" id="input-wardid" class="field-input chosen-select-deselect form-control"></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
        function getTown() {
            var e = document.getElementById("input-wardid");
            /* var select_ward_id = e.options[e.selectedIndex].value;*/
            var select_ward_id = $("#input-wardid :selected").val();
            var town_id = '0';
            loadListShipping();
            $.ajax({
                url: '/check-out/ajaxGetTown?ward_id=' + select_ward_id,
                dataType: 'json',
                beforeSend: function () {
                    $('select[name=\'config_town_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
                },
                complete: function () {
                    $('.fa-spin').remove();
                },
                success: function (json) {
                    if (json['error'] == false) {
                        $('#load-ajax-town').html('');
                        html = '<select name="town_id" id="input-townid" class="field-input chosen-select-deselect form-control">';
                        if (json['data'] != '') {
                            for (i = 0; i < json['data'].length; i++) {
                                if (json['data'][i]['town_id'] == town_id) {
                                    html += '<option value="' + json['data'][i]['town_id'] + '"';
                                    html += ' selected="selected">' + json['data'][i]['name'] + '</option>';
                                } else {
                                    html += '<option value="' + json['data'][i]['town_id'] + '"';
                                    html += '>' + json['data'][i]['name'] + '</option>';
                                }
                            }
                        }
                        html += "</select>";
                        $('#load-ajax-town').html(html);
                        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
                    } else {
                        $('#load-ajax-town').html('<select name="town_id" onchange="loadListShipping()" id="input-townid" class="field-input form-control"></select>');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    </script> -->
</body>
<!-- <script src="/catalog/view/theme/default/javascript/library/jquery.validate.min.js"></script>
<script src="/catalog/view/theme/default/javascript/library/bootstrap.min.js"></script>
<script src="/catalog/view/theme/default/javascript/library/chosen.jquery.js"></script>
<script src="/catalog/view/theme/default/javascript/checkout/checkout_v2.js"></script> -->


<!-- <script>
    $(document).ready(function () {
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });

        function validate_form() {
            $('#checkout_form').validate({
                rules: {
                    firstname: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    telephone: {
                        required: true,
                    },
                    address_1: {
                        required: true,
                    }
                },
                messages: {
                    firstname: {
                        required: "Bạn chưa nhập tên người nhận",
                    },
                    email: {
                        required: "Bạn vui lòng điền email",
                        email: "Bạn vui lòng điền email",
                    },
                    telephone: {
                        required: "Bạn chưa nhập số điện thoại người nhận",
                    },
                    address_1: {
                        required: "Bạn chưa nhập địa chỉ người nhận",
                    }
                }
            });
            var check_form = $("#checkout_form").valid();
            if (!check_form) {
                return false;
            }
            return true;
        }

        $("#button-validate-form").click(function () {
            if (validate_form()) {
                var step = Number($(this).parent().parent().attr("step")) + 1;
                if (step <= 2) {
                    sectionStep(step);
                }
            }
        });

        $(".btn-step-back").click(function () {
            var step = Number($(this).parent().parent().attr("step")) - 1;
            sectionStep(step);
        });

        $(".breadcrumb-link").click(function () {
            if (validate_form()) {
                var step = Number($(this).attr("step"));
                sectionStep(step);
            }
        });

        $("#submit_form_button").click(function () {
            if ($("input[name='payment_method']:checked").length <= 0) {
                $("#section-payment-method .text-danger").text('Bạn vui lòng chọn phương thức thanh toán');
                return false;
            } else {
                $('#submit_form_button').prop('disabled', true);
                $('form#checkout_form').submit();
            }
        });
        funcSetEvent();
    });
</script> -->

</html>