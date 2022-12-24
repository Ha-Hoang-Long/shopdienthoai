<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/max-icon" href="{{asset('/uploads/icon/icon.ico')}}">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/felayout.css')}}" rel="stylesheet">
    <link href="{{asset('/css/global.css')}}" rel="stylesheet">
    <link href="{{asset('/css/critical.css')}}" rel="stylesheet">
    <link href="{{asset('/css/header.scss.css')}}" rel="stylesheet">
    <link href="{{asset('/css/basecolor.css')}}" rel="stylesheet">
    <link href="{{asset('/css/product_style.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://connect.facebook.net/vi_VN/sdk.js?hash=eb61b0f9d0ff6e1157e0ab549931a105" async="" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=829732533863539"></script>
    <script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>
    <link rel="stylesheet" href="https://pubcdn2.ivymoda.com/css/jquery-ui.min.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <script type="text/javascript">
    /* Autocomplete */
    window.addEventListener('DOMContentLoaded', (event) => {
        (function($) {
            if (typeof $.fn.autocomplete_pro == "undefined") {
                $.fn.autocomplete_pro = function(option) {
                    return this.each(function() {
                        this.timer = null;
                        this.items = new Array();
                        $.extend(this, option);
                        $(this).attr('autocomplete', 'off');
                        /*Focus*/
                        $(this).on('focus', function() {
                            var data = JSON.parse(localStorage.getItem('history_search'));
                            var html = "";
                            if (data != null) {
                                data.splice($.inArray('default', data), 1); // remove default item
                                html += "<li class='autocomplete-title'><a href ='javascript:void(0)'><span class=''>Lịch sử tìm kiếm</a></span><span</li>";
                                     for(var i = 0; i < data.length; i++){
                                        html += `<li data-value="` + data[i] + `" onclick=window.location.href='/product/search?search="` + data[i] + `">
                                            <a data-target="category" href="javascript:void(0)" onclick=window.location.href='/product/search?search=` + data[i] + `'>`
                                        html += data[i];
                                        html +=`</li>`;
                                    }
                            }
                            

                            $(this).siblings('ul.dropdown-menu').html(html);
                            if ($('input[name=\'search\']').val() == "") {
                                $(this).siblings('ul.dropdown-menu').show();
                            }
                            this.request();
                        });
                        /*Blur*/
                        $(this).on('blur', function() {
                            setTimeout(function(object) {
                                object.hide();
                            }, 200, this);
                        });
                        /*Keyup*/
                        $(this).on('keyup', function(event) {
                            if ($(this).val().length == 0) {
                                $(this).siblings('ul.dropdown-menu').hide();
                            }

                        });
                        /*Keydown*/
                        $(this).on('keydown', function(event) {
                            switch (event.keyCode) {
                                case 27:
                                    /*escape*/
                                    $(this).hide();
                                    break;
                                case 13:
                                    $('input[name=\'search\']').parent().find('button').trigger('click');

                                    var old_data = ["default"];
                                    if (!localStorage.getItem('history_search')) {
                                        localStorage.setItem("history_search", JSON.stringify(old_data))
                                    }
                                    var new_data = $('input[name=\'search\']').val();
                                    var data = JSON.parse(localStorage.getItem('history_search'));
                                    // only show 6 result
                                    if (data.length > 5) { 
                                        data.pop();
                                    }
                                    if ($.inArray(new_data, data) === -1) {
                                        data.unshift(new_data);
                                    }
                                    localStorage.setItem("history_search", JSON.stringify(data));
                                    $('input[name=\'search\']').val("");

                                    break;
                                default:
                                    this.request();
                                    break;
                            }
                        });
                        /*Click*/
                        this.click = function(event) {
                            event.preventDefault();
                            value = $(event.target).parent().attr('data-value');
                            if (value && this.items[value]) {
                                this.select(this.items[value]);
                            }
                        };
                        /*Show*/
                        this.show = function() {
                            var pos = $(this).position();
                            $(this).siblings('ul.dropdown-menu').css({
                                top: pos.top + $(this).outerHeight(),
                                left: pos.left
                            });
                            $(this).siblings('ul.dropdown-menu').show();
                        };
                        /*Hide*/
                        this.hide = function() {
                            $(this).siblings('ul.dropdown-menu').hide();
                        };
                        /*Request*/
                        this.request = function() {
                            clearTimeout(this.timer);
                            this.timer = setTimeout(function(object) {
                                object.source($(object).val(), $.proxy(object
                                    .response, object));
                            }, 200, this);
                        };
                        /*Response*/
                        this.response = function(json) {
                            if (html) {
                                this.show();
                            } else {
                                this.hide();
                            }
                            $(this).siblings('ul.dropdown-menu').html(html);
                            $('a[data-target="product"], a[data-target="category"]').on('click', function() {
                                location.href = $(this).attr('href');
                            });
                        };
                        $(this).after('<ul class="dropdown-menu"></ul>');
                        $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this
                            .click, this));
                    });
                }
            }

            $(`input[name="search"]`)
                .autocomplete_pro({
                    'source': function(request, response) {
                        if (request.length > 0) {
                            $.ajax({
                                url: 'product/search/autocomplete?filter_name=' +
                                    encodeURIComponent(request),
                                dataType: 'json',
                                success: function(json) {
                                    html = '';
                                    if (json['category']) {
                                        html += "<li class='autocomplete-title'><a href='javascript:void(0)'><span class=''>Có phải bạn muốn tìm</a></span></li>";
                                        for (var i in json['category']) {
                                            html += `<li data-value="` + json['category'][i]['category_id'] + `">
                                                <a data-target="category" href="` + json['category'][i]['href'] + `">`
                                            html += json['category'][i]['name'];
                                            html +=`</a></li>`;
                                        }
                                    }
                                    if (json['products']) {
                                        html += "<li class='autocomplete-title'><a href='javascript:void(0)'><span class=''>Sản phẩm gợi ý</a></span></li>";
                                        for (var i in json['products']) {
                                            html += `
                                            <li data-value="` + json['products'][i]['product_id'] + `">
                                                <a data-target="product" href="` + json['products'][i]['href'] + `">
                                                    <div class="row">
                                                        <div class="col-md-2 col-xs-2 col-4">
                                                            <img src="` + json['products'][i]['image'] + `">
                                                        </div>
                                                        <div class="col-md-10 col-xs-10 col-8">
                                                            <span style="display: block;" data-target="product" href="` + json['products'][i]['href'] + `">` + json['products'][i][
                                                                'name'] + `</span>`;
                                                                if(json['products'][i]['special']){
                                                                    html +=`
                                                                    <span class="special">` + json['products'][i]['special'] + `</span>
                                                                    <del class="price-old">` + json['products'][i]['price'] + `</del>`;
                                                                } else{
                                                                    html +=`
                                                                    <span class="price">` + json['products'][i]['price'] + `</span>`;
                                                                }   
                                                     html +=`                                                        
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>`;
                                        }
                                        html += "<span class='view-more-search' onclick=window.location.href='/product/search?search=" +
                                                request + "'>Xem tất cả</span>";
                                    }
                                    response((json, function(item) {
                                        return html;
                                    }));
                                }
                            });
                            // setTimeout(function() {
                            //     $('a[data-target="product"]').on('click', function() {
                            //         location.href = $(this).attr('href');
                            //     }); 
                            // }, 100);
                        }
                    },
                    'select': function(item) {
                        $(`input[name="search"]`)
                            .val(item['label']);
                    }
                })
        })(window.jQuery);
    });
</script>
    <script type="text/javascript">
    /* Autocomplete */
    window.addEventListener('DOMContentLoaded', (event) => {
        (function($) {
            if (typeof $.fn.autocomplete_pro == "undefined") {
                $.fn.autocomplete_pro = function(option) {
                    return this.each(function() {
                        this.timer = null;
                        this.items = new Array();
                        $.extend(this, option);
                        $(this).attr('autocomplete', 'off');
                        /*Focus*/
                        $(this).on('focus', function() {
                            var data = JSON.parse(localStorage.getItem('history_search'));
                            var html = "";
                            if (data != null) {
                                data.splice($.inArray('default', data), 1); // remove default item
                                html += "<li class='autocomplete-title'><a href ='javascript:void(0)'><span class=''>Lịch sử tìm kiếm</a></span><span</li>";
                                     for(var i = 0; i < data.length; i++){
                                        html += `<li data-value="` + data[i] + `" onclick=window.location.href='/product/search?search="` + data[i] + `">
                                            <a data-target="category" href="javascript:void(0)" onclick=window.location.href='/product/search?search=` + data[i] + `'>`
                                        html += data[i];
                                        html +=`</li>`;
                                    }
                            }
                            

                            $(this).siblings('ul.dropdown-menu').html(html);
                            if ($('input[name=\'search\']').val() == "") {
                                $(this).siblings('ul.dropdown-menu').show();
                            }
                            this.request();
                        });
                        /*Blur*/
                        $(this).on('blur', function() {
                            setTimeout(function(object) {
                                object.hide();
                            }, 200, this);
                        });
                        /*Keyup*/
                        $(this).on('keyup', function(event) {
                            if ($(this).val().length == 0) {
                                $(this).siblings('ul.dropdown-menu').hide();
                            }

                        });
                        /*Keydown*/
                        $(this).on('keydown', function(event) {
                            switch (event.keyCode) {
                                case 27:
                                    /*escape*/
                                    $(this).hide();
                                    break;
                                case 13:
                                    $('input[name=\'search\']').parent().find('button').trigger('click');

                                    var old_data = ["default"];
                                    if (!localStorage.getItem('history_search')) {
                                        localStorage.setItem("history_search", JSON.stringify(old_data))
                                    }
                                    var new_data = $('input[name=\'search\']').val();
                                    var data = JSON.parse(localStorage.getItem('history_search'));
                                    // only show 6 result
                                    if (data.length > 5) { 
                                        data.pop();
                                    }
                                    if ($.inArray(new_data, data) === -1) {
                                        data.unshift(new_data);
                                    }
                                    localStorage.setItem("history_search", JSON.stringify(data));
                                    $('input[name=\'search\']').val("");

                                    break;
                                default:
                                    this.request();
                                    break;
                            }
                        });
                        /*Click*/
                        this.click = function(event) {
                            event.preventDefault();
                            value = $(event.target).parent().attr('data-value');
                            if (value && this.items[value]) {
                                this.select(this.items[value]);
                            }
                        };
                        /*Show*/
                        this.show = function() {
                            var pos = $(this).position();
                            $(this).siblings('ul.dropdown-menu').css({
                                top: pos.top + $(this).outerHeight(),
                                left: pos.left
                            });
                            $(this).siblings('ul.dropdown-menu').show();
                        };
                        /*Hide*/
                        this.hide = function() {
                            $(this).siblings('ul.dropdown-menu').hide();
                        };
                        /*Request*/
                        this.request = function() {
                            clearTimeout(this.timer);
                            this.timer = setTimeout(function(object) {
                                object.source($(object).val(), $.proxy(object
                                    .response, object));
                            }, 200, this);
                        };
                        /*Response*/
                        this.response = function(json) {
                            if (html) {
                                this.show();
                            } else {
                                this.hide();
                            }
                            $(this).siblings('ul.dropdown-menu').html(html);
                            $('a[data-target="product"], a[data-target="category"]').on('click', function() {
                                location.href = $(this).attr('href');
                            });
                        };
                        $(this).after('<ul class="dropdown-menu"></ul>');
                        $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this
                            .click, this));
                    });
                }
            }

            $(`input[name="search"]`)
                .autocomplete_pro({
                    'source': function(request, response) {
                        if (request.length > 0) {
                            $.ajax({
                                url: 'product/search/autocomplete?filter_name=' +
                                    encodeURIComponent(request),
                                dataType: 'json',
                                success: function(json) {
                                    html = '';
                                    if (json['category']) {
                                        html += "<li class='autocomplete-title'><a href='javascript:void(0)'><span class=''>Có phải bạn muốn tìm</a></span></li>";
                                        for (var i in json['category']) {
                                            html += `<li data-value="` + json['category'][i]['category_id'] + `">
                                                <a data-target="category" href="` + json['category'][i]['href'] + `">`
                                            html += json['category'][i]['name'];
                                            html +=`</a></li>`;
                                        }
                                    }
                                    if (json['products']) {
                                        html += "<li class='autocomplete-title'><a href='javascript:void(0)'><span class=''>Sản phẩm gợi ý</a></span></li>";
                                        for (var i in json['products']) {
                                            html += `
                                            <li data-value="` + json['products'][i]['product_id'] + `">
                                                <a data-target="product" href="` + json['products'][i]['href'] + `">
                                                    <div class="row">
                                                        <div class="col-md-2 col-xs-2 col-4">
                                                            <img src="` + json['products'][i]['image'] + `">
                                                        </div>
                                                        <div class="col-md-10 col-xs-10 col-8">
                                                            <span style="display: block;" data-target="product" href="` + json['products'][i]['href'] + `">` + json['products'][i][
                                                                'name'] + `</span>`;
                                                                if(json['products'][i]['special']){
                                                                    html +=`
                                                                    <span class="special">` + json['products'][i]['special'] + `</span>
                                                                    <del class="price-old">` + json['products'][i]['price'] + `</del>`;
                                                                } else{
                                                                    html +=`
                                                                    <span class="price">` + json['products'][i]['price'] + `</span>`;
                                                                }   
                                                     html +=`                                                        
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>`;
                                        }
                                        html += "<span class='view-more-search' onclick=window.location.href='/product/search?search=" +
                                                request + "'>Xem tất cả</span>";
                                    }
                                    response((json, function(item) {
                                        return html;
                                    }));
                                }
                            });
                            // setTimeout(function() {
                            //     $('a[data-target="product"]').on('click', function() {
                            //         location.href = $(this).attr('href');
                            //     }); 
                            // }, 100);
                        }
                    },
                    'select': function(item) {
                        $(`input[name="search"]`)
                            .val(item['label']);
                    }
                })
        })(window.jQuery);
    });
</script>
    <!-- <title>Hoanglongmobile</title> -->
</head>

<nav class="navbar navbar-expand-md navbar-light bg-nav shadow-sm" style="padding: 0px; background: #D5D3D3;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-envelope"></i> dienthoaihoanglong.com
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="font-weight: 500;">Đăng nhập</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="font-weight: 500;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                            <a class="dropdown-item" href="{{route('user.profile')}}"
                                onclick="">
                                {{ __('Thông tin') }}
                            </a>
                            <hr style="margin: auto;width: 80%;">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            

                            
                        </div>
                        
                        
                    </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>
    
<div id="header-top" class="header"><!--header-middle-->
    <div class="container">
        <div class="header-top">
            <div class="row align-items-center">
                <div class="col-4 col-lg-3">
                    <div class="header-item header-logo">
                        <a href="{{URL::to('/home')}}" class="logo">
                            <img width="200px" height="43px" src="{{ asset('uploads/logo/logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-8 col-lg-9 ">
                    <div class="header-top__right">
                        <div class="header-item header-search is-dt">
                            <div class="wrapper-search" style="width: 100%; min-height: 47px;"><div class="theme-search-smart" role="search" id="search">
                                <div class="theme-search-smart" role="search" id="search">
                                    <div class="header_search theme-searchs">
                                        <div class="input-group search-bar theme-header-search-form ultimate-search" role="search">
                                            <form action="/search" method="GET">
                                                
                                                <input type="search" name="query" value="" placeholder="Tìm kiếm" class="search-auto input-group-field auto-search" autocomplete="off">
                                                
                                            </form>
                                            <!-- <input type="search" id="search_input" name="query" value="" placeholder="Tìm kiếm" class="search-auto input-group-field auto-search" onchange=" $name = document.getElementById('search_input').value; window.location='search/'$name'" autocomplete="off"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-item header-delivery-tracking is-dt">
                        <div class="header-item__image">
                            <img src="{{ asset('uploads/icon/fast-delivery.png') }}" >
                        </div>
                        <div class="header-delivery-tracking__text" onclick="window.location='{{URL::to('history_orders')}}'">
                            <p class="header-item__title">Tra cứu</p>
                            <span class="header-item__text">Đơn hàng</span>
                        </div>
                    </div>
                    <div class="header-item header-hotline is-dt">
                        <div class="header-item__image">
                            <img src="{{ asset('uploads/icon/phone-call.png') }}" >
                        </div>
                        <div class="header-hotline__text">
                            <p class="header-item__title">Hotline</p>
                            <span class="header-item__text">0914 107 417</span>
                        </div>
                    </div>
                    
                    <div id="cart" class="header-item header-cart" onclick="window.location = '{{URL::to('/list-cart')}}';">
                        <div class="header-item__image">
                            <img src="{{ asset('/uploads/icon/shopping-cart.png') }}" >
                            @include('FE.cart')
                            
                        </div>
                        <div class="header-hotline__text">
                            <!-- <p class="header-item__title">Hotline</p> -->
                            <span class="header-item__text">Giỏ hàng</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>           
    </div>
</div>
</div><!--/header-middle-->
<div id="header-main" class=""><!--head-menu-->
    <div class="header-main container">
        <div class="header_nav_main header-menu d-none d-lg-block clearfix">
            <div class="container">
                <div class="heade_menunavs">
                    <div class="wrap_main d-flex">
                        <!-- danh muc sp -->
                        <div class="menu_mega indexs"><div class="menu_mega_content indexs" style="">
                            <div class="title_menu">
                                <span class="title_">Danh mục sản phẩm</span>
                            </div>
                            <div class="list_menu_header ">
                                <ul class="ul_menu site-nav-vetical">
                                <?php foreach($category_products as $key => $category){ ?>
                                    <li class="nav_item lev-1 lv1 li_check">
                                        <a class="lazyload" href="{{URL::to('listing/danh mục '.$category->Ten_danh_muc)}}" title="Máy sấy tóc" style="background-image: url(image/catalog/vmart/danh_muc_sp/may_say.png);">{{$category->Ten_danh_muc}}</a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- main menu -->
                    <div class="bg-header-nav">
                        <nav class="header-nav">
                            <ul class="item_big">
                                
                                
                                <li class="nav-item">
                                    <a class="a-img" href="" title="Liên hệ">
                                        Liên hệ                                            </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div><!--head-menu-->

</header><!--/header-->
<body>
    <div class="container layout-main">
        @yield('content')
    </div>
    <div class="footer">
        <a href="#" class="backtop show" title="Lên đầu trang"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        <div class="container">
            <div class="footer-top footer-wrap">
                <div class="footer-top__logo">
                    <img src="{{ asset('uploads/logo/logo.png') }}" alt="logo">
                </div>
                <div class="footer-top__newsletter">
                    <!-- <div class="footer-title">
                        Nhận bản tin                
                    </div> -->
                    <div class="footer-top__newsletter-form">
                        
                        <script type="text/javascript">
                            $(document).ready(function () {
                                var id = '#mc-embedded-subscribe-form';
                                $(id).on('submit', function () {
                                    var email = $(id + ' .email').val();
                                    if (!isValidEmailAddress(email)) {
                                        $(id + ' + .valid').html("Email không hợp lệ").addClass('error');
                                        $(id + ' .email').focus();
                                        return false;
                                    }
                                    var url = "/tool/newsletter";
                                    $.ajax({
                                        type    : "post",
                                        url     : url,
                                        data    : $(id).serialize(),
                                        dataType: 'json',
                                        success : function (json) {
                                            $(".success_inline, .warning_inline, .error").remove();
                                            if (json['error']) {
                                                $(id + ' + .valid').html(json['error']);
                                                $(id + ' + .valid').addClass('error');
                                            }
                                            if (json['success']) {
                                                $(id + ' + .valid').html(json['success']).addClass('success');
                                                $(id)[0].reset();
                                            }
                                        }
                                    });
                                    return false;
                                });
                            });
                            function isValidEmailAddress(emailAddress) {
                                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                                return pattern.test(emailAddress);
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="footer-main footer-wrap">
                <div class="footer-main__flex footer-main__list-info">
                    <div class="footer-item flex-5">
                        <div class="footer-title">
                            Thông tin liên hệ:
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="javascript:void(0)">Địa chỉ: 28 Phan tứ, Mỹ An, Ngũ Hành Sơn, Đà Nẵng </a></li>
                                <li><a href="tel: 0123 456 789">Điện thoại: 0123 456 789</a></li>
                                <li><a href="mailto: contact@yourdomain.com">Email: Hoanglongmobile@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>                                                                                                                    
                
                    <div class="footer-item">
                        <div class="footer-title">
                            Thông tin:
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="">Về chúng tôi</a></li>
                                <li><a href="">Điều khoản &amp; Điều kiện</a></li>
                                <li><a href="">Chính sách bảo mật</a></li>
                                <li><a href="">Chính sách thanh toán</a></li>
                                <li><a href="">Chính sách giao hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-item">
                        <div class="footer-title">
                            Tổng đài hỗ trợ:
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="tel: 0123456789">Gọi mua: 0123456789 (7:30 - 22:00)</a></li>
                                <li><a href="tel: 0123456789">Kỹ thuật: 0123456789 (7:30 - 22:00)</a></li>
                                <li><a href="tel: 0123456789">Khiếu nại: 0123456789 (8:00 - 21:30)</a></li>
                                <li><a href="tel: 0123456789">Bảo hành: 0123456789 (8:00 - 21:00)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            
        </div>
        
    </div>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', (event) => {
        $('.child-footer').append($('#online-gov'));
        $('#online-gov').show();
        });
    </script>
    <div class="copyright d-flex">
        <div class="container">
        <!-- <div class="inner"> -->
            <div class="row tablet">
                <div id="copyright" class="col-lg-12 col-md-12 col-12 text-center">
                    <div class="wsp">
                    <span id="copyright">© Copyright 2022 HoangLong. </span>                
                </div>
                </div>
            </div>
        <!-- </div> -->
        
        </div>
    </div>
    <!-- <script>
        function AddCart(id){
            $.ajax({
                url: 'Add-cart/'+id,
                type: 'GET',
            }).done(function(response){
                console.log(response);
                $('#cart').empty();
                $('#cart').html(response);
                alertify.success('Đã thêm sản phẩm vào giỏ');
            })
        }
    </script> -->

</body>

 <link id="myCss" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" media="all"></div>



    <script type="text/javascript">
$('#button-search').bind('click', function() {
    url = '/product/search';

    var search = $('#content input[name=\'search\']').prop('value');

    if (search) {
        url += '?search=' + encodeURIComponent(search);
    }

    var category_id = $('#content select[name=\'category_id\']').prop('value');

    if (category_id > 0) {
        url += '&category_id=' + encodeURIComponent(category_id);
    }

    var sub_category = $('#content input[name=\'sub_category\']:checked').prop('value');

    if (sub_category) {
        url += '&sub_category=true';
    }

    var filter_description = $('#content input[name=\'description\']:checked').prop('value');

    if (filter_description) {
        url += '&description=true';
    }

    location = url;
    });

    $('#content input[name=\'search\']').bind('keydown', function(e) {
    if (e.keyCode == 13) {
        $('#button-search').trigger('click');
    }
    });

    $('select[name=\'category_id\']').on('change', function() {
    if (this.value == '0') {
        $('input[name=\'sub_category\']').prop('disabled', true);
    } else {
        $('input[name=\'sub_category\']').prop('disabled', false);
    }
});

$('select[name=\'category_id\']').trigger('change');
</script>
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', (event) => {
        $('.menu_mega').append($('.menu_mega_content'));
        $('.menu_mega_content').show();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
            window.addEventListener('DOMContentLoaded', (event) => {
                var swipertab = new Swiper('.swiper-iwish-0', {
                    slidesPerView: 5,
                    loop: false,
                    grabCursor: true,
                    spaceBetween: 10,
                    roundLengths: true,
                    slideToClickedSlide: false,
                    navigation: {
                        nextEl: '.swiper-iwish-0 .swiper-button-next',
                        prevEl: '.swiper-iwish-0 .swiper-button-prev',
                    },
                    autoplay: false,
                    breakpoints: {
                        300: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        500: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        640: {
                            slidesPerView: 3,
                            spaceBetween: 10
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 10
                        },
                        991: {
                            slidesPerView: 3,
                            spaceBetween: 10
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 15
                        },
                        1199: {
                            slidesPerView: 5,
                            spaceBetween: 20
                        }
                    }
                });
                var swipertab = new Swiper('.swiper-iwish-1', {
                        slidesPerView: 5,
                        loop: false,
                        grabCursor: true,
                        spaceBetween: 10,
                        roundLengths: true,
                        slideToClickedSlide: false,
                        navigation: {
                            nextEl: '.swiper-iwish-1 .swiper-button-next',
                            prevEl: '.swiper-iwish-1 .swiper-button-prev',
                        },
                        autoplay: false,
                        breakpoints: {
                            300: {
                                slidesPerView: 2,
                                spaceBetween: 10
                            },
                            500: {
                                slidesPerView: 2,
                                spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            991: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 4,
                                spaceBetween: 15
                            },
                            1199: {
                                slidesPerView: 5,
                                spaceBetween: 20
                            }
                        }
                    });
                    var swipertab = new Swiper('.swiper-iwish-2', {
                        slidesPerView: 5,
                        loop: false,
                        grabCursor: true,
                        spaceBetween: 10,
                        roundLengths: true,
                        slideToClickedSlide: false,
                        navigation: {
                            nextEl: '.swiper-iwish-2 .swiper-button-next',
                            prevEl: '.swiper-iwish-2 .swiper-button-prev',
                        },
                        autoplay: false,
                        breakpoints: {
                            300: {
                                slidesPerView: 2,
                                spaceBetween: 10
                            },
                            500: {
                                slidesPerView: 2,
                                spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            991: {
                                slidesPerView: 3,
                                spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 4,
                                spaceBetween: 15
                            },
                            1199: {
                                slidesPerView: 5,
                                spaceBetween: 20
                            }
                        }
                    });
                    var swipertab = new Swiper('.swiper-iwish-3', {
                        slidesPerView: 1,
                        loop: false,
                        grabCursor: true,
                        spaceBetween: 10,
                        roundLengths: true,
                        slideToClickedSlide: false,
                        navigation: {
                            nextEl: '.swiper-iwish-3 .swiper-button-next',
                            prevEl: '.swiper-iwish-3 .swiper-button-prev',
                        },
                        autoplay: false,
                        breakpoints: {
                            300: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            },
                            500: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            },
                            991: {
                                slidesPerView: 1,
                                spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 1,
                                spaceBetween: 15
                            },
                            1199: {
                                slidesPerView: 1,
                                spaceBetween: 20
                            }
                        }
                    });
                
                /* callback update for tabs */
                var ele = $('.section_tab_product ul li');
                ele.click(function() {
                    swipertab.update();
                });
            });
        </script>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</html>

