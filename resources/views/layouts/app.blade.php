<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 's') }} | Đăng nhập</title>
    <link rel="icon" type="image/max-icon" href="{{asset('/uploads/icon/icon.ico')}}">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/felayout.css" rel="stylesheet">
    <link href="/css/global.css" rel="stylesheet">
    <link href="/css/critical.css" rel="stylesheet">
    <link href="/css/header.scss.css" rel="stylesheet">
    <link href="/css/basecolor.css" rel="stylesheet">
    <link href="/css/product_style.css" rel="stylesheet">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
    <title>Document</title>
</head>


    <nav class="navbar navbar-expand-md navbar-light bg-nav shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-envelope"></i> dienthoaihoanglong.com
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
    
    <div  id="header-top" class="header"><!--header-middle-->
        <div class="container">
            <div class="header-top">
                <div class="row align-items-center">
                    <div class="col-4 col-lg-3">
                        <div class="header-item header-logo">
                            <a href="{{URL::to('/home')}}" class="logo">
                                <img width="200px" height="43px" src="{{ asset('uploads/logo/logo.png') }}">
                            </a>
                        </div>
                        <!-- <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/frontend/images/partner1.png')}}" alt="" /></a>
                        </div> -->
                        
                    </div>
                    
                    
                        </div>
                    </div>
                </div>
            </div>
                        <!-- <div class="nav justify-content-end"> -->
                            <!-- <form action="{{URL::to('/search-Results')}}" method="POST">
                                {{csrf_field()}}
                                <div class="nav justify-content-end padding">
                                    <input type="text" style="width: 250px; height: 25px" name="keyword_sub" placeholder="Bạn muốn tìm sản phẩm nào?"/>
                                    <input type="submit" style="color: blue" name="search_product" class="fa fa-google-plus" value="Search">
                                </div>
                            </form> -->
                        <!-- </div> -->
                    
                        
        </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    

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
                        <!-- <div class="footer-content">
                            <div class="block newsletter">
                                <div class="content">
                                    <form action="/tool/newsletter" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                        <input type="email" value="" class="email" placeholder="Nhập email tại đây..." name="email" id="mail-footer" aria-label="">
                                        <button class="btn subscribe" name="subscribe" id="subscribe-footer">
                                            <span>Đăng ký!</span>
                                        </button>
                                    </form>
                                    <div class="valid"></div>
                                </div>
                            </div>
                        </div> -->
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
                    </div>                                                                                                                    <div class="footer-item">
                    <!-- <div class="footer-title">
                        Menu:
                    </div>
                    <div class="footer-content">
                        <ul>
                            <li><a href="javascript:void(0);">Sản phẩm</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/product/category?path=246">Tai nghe có dây</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/product/category?path=251">Loa Bluetooth</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/product/category?path=275">Akko</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/product/category?path=307">Sony PS5</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/news/category?cat_news_id=23">Tin tức</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/information/information?information_id=8">Tuyển dụng</a></li>
                            <li><a href="https://vmartplus.w2.exdomain.net/information/contact">Liên hệ</a></li>
                        </ul>
                    </div> -->
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
</html>