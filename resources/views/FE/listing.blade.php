@extends('FE.layouts.home')
@section('content')
<title>Danh sách sản phẩm</title>
<div class="section-filter">
    <div class="container">
        <div class="wrapper-filter">

            <div class="aside-item aside-item__attribute filter-vendor f-left" style="margin-bottom: 8px">
                <div class="aside-title">
                    <div class="arrow-filter"></div>
                    <h2 class="title-filter title-head margin-top-0" style="margin-bottom: 8px">
                        <span>Lựa chọn theo tiêu chí:</span>
                    </h2>
                    <div class="other-filter">
                        <div class="filter-total">
                            <aside class="aside-item aside-other-item aside-handle filter-vendor f-left">
                                <div class="aside-title">
                                    <div class="arrow-filter"></div>
                                    <h2 class="title-filter title-head margin-top-0">
                                        <span>
                                            <svg width="10" height="10" viewBox="0 0 12 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7 12.0035H5C4.73478 12.0035 4.48043 11.8981 4.29289 11.7106C4.10536 11.523 4 11.2687 4 11.0035V7.20848L0.295 3.50348C0.107206 3.3168 0.00111639 3.06327 0 2.79848V1.00348C0 0.738263 0.105357 0.483909 0.292893 0.296372C0.48043 0.108836 0.734784 0.003479 1 0.003479H11C11.2652 0.003479 11.5196 0.108836 11.7071 0.296372C11.8946 0.483909 12 0.738263 12 1.00348V2.79848C11.9989 3.06327 11.8928 3.3168 11.705 3.50348L8 7.20848V11.0035C8 11.2687 7.89464 11.523 7.70711 11.7106C7.51957 11.8981 7.26522 12.0035 7 12.0035ZM1 1.00348V2.79848L5 6.79848V11.0035H7V6.79848L11 2.79848V1.00348H1Z"
                                                    fill="#1B1E2D"></path>
                                            </svg>
                                        </span>
                                        <span>Bộ lọc</span>
                                        <span class="count-filter">1</span>
                                    </h2>
                                </div>
                                <div class="aside-content margin-top-0 filter-group" style="display: none;">
                                    <div class="filter-total__item">
                                        <div class="aside-item filter-vendor f-left">
                                            <div class="aside-title">
                                                <h2 class="title-filter title-head margin-top-0"><span>Thương
                                                        hiệu:</span></h2>
                                            </div>
                                            <ul>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <input id="filter-manufacture-0" type="checkbox"
                                                            name="manufacturer[]" value="11">
                                                        <label for="filter-manufacture-0">
                                                            <img src="image/catalog/vmartplus/manufacturer/apple.png"
                                                                alt="Apple">
                                                        </label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="filter-total__list row">
                                        <div class="col-xl-12 col-lg-12">
                                            <aside
                                                class="aside-item aside-other-item aside-handle filter-vendor f-left">
                                                <div class="aside-title">
                                                    <h2 class="title-filter title-head margin-top-0">
                                                        <span>Giá</span>
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6">
                                                        <ul>
                                                            <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                                                style="margin-bottom: 8px;">
                                                                <input class="filter-all" id="filter-price-0"
                                                                    type="radio" name="price" value="0"
                                                                    checked="checked">
                                                                <label for="filter-price-0" class="checked">
                                                                    Tất cả </label>
                                                            </li>
                                                            <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                                                style="margin-bottom: 8px;">
                                                                <span>
                                                                    <input id="filter-price-1" type="radio" name="price"
                                                                        value="1">
                                                                    <label for="filter-price-1">
                                                                        Dưới 1 triệu </label>
                                                                </span>
                                                            </li>
                                                            <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                                                style="margin-bottom: 8px;">
                                                                <span>
                                                                    <input id="filter-price-2" type="radio" name="price"
                                                                        value="2">
                                                                    <label for="filter-price-2">
                                                                        Từ 1 đến 2 triệu </label>
                                                                </span>
                                                            </li>
                                                            <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                                                style="margin-bottom: 8px;">
                                                                <span>
                                                                    <input id="filter-price-3" type="radio" name="price"
                                                                        value="3">
                                                                    <label for="filter-price-3">
                                                                        Từ 2 đến 4 triệu </label>
                                                                </span>
                                                            </li>
                                                            <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                                                style="margin-bottom: 8px;">
                                                                <span>
                                                                    <input id="filter-price-4" type="radio" name="price"
                                                                        value="4">
                                                                    <label for="filter-price-4">
                                                                        Từ 4 đến 6 triệu </label>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6">
                                                        <p style="margin-bottom: 0" class="range-toggle">
                                                            <a href="javascript:void(0)"
                                                                onclick="showRangePrice($(this))" class="link">
                                                                <span>
                                                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M18.48 18.5368H21M4.68 12L3 12.044M4.68 12C4.68 13.3255 5.75451 14.4 7.08 14.4C8.40548 14.4 9.48 13.3255 9.48 12C9.48 10.6745 8.40548 9.6 7.08 9.6C5.75451 9.6 4.68 10.6745 4.68 12ZM10.169 12.0441H21M12.801 5.55124L3 5.55124M21 5.55124H18.48M3 18.5368H12.801M17.88 18.6C17.88 19.9255 16.8055 21 15.48 21C14.1545 21 13.08 19.9255 13.08 18.6C13.08 17.2745 14.1545 16.2 15.48 16.2C16.8055 16.2 17.88 17.2745 17.88 18.6ZM17.88 5.4C17.88 6.72548 16.8055 7.8 15.48 7.8C14.1545 7.8 13.08 6.72548 13.08 5.4C13.08 4.07452 14.1545 3 15.48 3C16.8055 3 17.88 4.07452 17.88 5.4Z"
                                                                            stroke="#363853" stroke-width="1.5"
                                                                            stroke-linecap="round"></path>
                                                                    </svg>
                                                                </span>
                                                                Hoặc chọn mức giá phù hợp với bạn
                                                            </a>
                                                        </p>
                                                        <div class="wrapper-slider-range" style="display: block;">
                                                            <div id="slider-range"
                                                                class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                                    style="left: 0%; width: 100%;"></div><span
                                                                    class="ui-slider-handle ui-state-default ui-corner-all"
                                                                    tabindex="0" style="left: 0%;"></span><span
                                                                    class="ui-slider-handle ui-state-default ui-corner-all"
                                                                    tabindex="0" style="left: 100%;"></span>
                                                            </div>
                                                            <div class="value-range">
                                                                <input type="hidden" name="product_price_from"
                                                                    value="0">
                                                                <input type="hidden" name="product_price_to"
                                                                    value="6000000">
                                                                <div id="amout-from" class="amout-from">0 đ</div>
                                                                <div id="amout-to" class="amout-to">6,000,000 đ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 filter-total__item">
                                        </div>
                                        <div class="col-xl-12 col-lg-12 filter-total__item">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <aside
                                                        class="aside-item aside-other-item aside-handle filter-vendor f-left">
                                                        <div class="aside-title">
                                                            <h2 class="title-filter title-head margin-top-0">
                                                                <span
                                                                    class="title-filter__option title-filter__option-checked">Bộ
                                                                    nhớ</span>
                                                            </h2>
                                                        </div>
                                                        <ul>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-13-0"
                                                                        class="filter-option-13-0" type="checkbox"
                                                                        name="option[]" value="13-50">
                                                                    <label for="filter-option-13-0" class="">
                                                                        256GB </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-13-1"
                                                                        class="filter-option-13-1" type="checkbox"
                                                                        name="option[]" value="13-51">
                                                                    <label for="filter-option-13-1" class="">
                                                                        128GB </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-13-2"
                                                                        class="filter-option-13-2" type="checkbox"
                                                                        name="option[]" value="13-52">
                                                                    <label for="filter-option-13-2" class="">
                                                                        64GB </label>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </aside>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <aside
                                                        class="aside-item aside-other-item aside-handle filter-vendor f-left">
                                                        <div class="aside-title">
                                                            <h2 class="title-filter title-head margin-top-0">
                                                                <span
                                                                    class="title-filter__option title-filter__option-checked">Màu
                                                                    sắc</span>
                                                            </h2>
                                                        </div>
                                                        <ul>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-14-0"
                                                                        class="filter-option-14-0" type="checkbox"
                                                                        name="option[]" value="14-53">
                                                                    <label for="filter-option-14-0" class="">
                                                                        Vàng </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-14-1"
                                                                        class="filter-option-14-1" type="checkbox"
                                                                        name="option[]" value="14-54">
                                                                    <label for="filter-option-14-1" class="">
                                                                        Đỏ </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-14-2"
                                                                        class="filter-option-14-2" type="checkbox"
                                                                        name="option[]" value="14-55">
                                                                    <label for="filter-option-14-2" class="">
                                                                        Trắng </label>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </aside>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <aside
                                                        class="aside-item aside-other-item aside-handle filter-vendor f-left">
                                                        <div class="aside-title">
                                                            <h2 class="title-filter title-head margin-top-0">
                                                                <span
                                                                    class="title-filter__option title-filter__option-checked">Size</span>
                                                            </h2>
                                                        </div>
                                                        <ul>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-15-0"
                                                                        class="filter-option-15-0" type="checkbox"
                                                                        name="option[]" value="15-56">
                                                                    <label for="filter-option-15-0" class="">
                                                                        S </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-15-1"
                                                                        class="filter-option-15-1" type="checkbox"
                                                                        name="option[]" value="15-57">
                                                                    <label for="filter-option-15-1" class="">
                                                                        M </label>
                                                                </span>
                                                            </li>
                                                            <li
                                                                class="filter-item filter-item--check-box filter-item--green ">
                                                                <span>
                                                                    <input id="filter-option-15-2"
                                                                        class="filter-option-15-2" type="checkbox"
                                                                        name="option[]" value="15-58">
                                                                    <label for="filter-option-15-2" class="">
                                                                        L </label>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </aside>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="other-filter__btn text-center"
                                        style="border: none; padding: 0px; margin: 10px 0px;">
                                        <div class="other-filter__btn-remove btn-remove__all">Bỏ chọn</div>
                                        <div class="other-filter__btn-filter" onclick="loadFilter()">Xem kết quả</div>
                                    </div>
                                </div>
                            </aside>
                        </div>

                        <aside class="aside-item aside-other-item aside-handle filter-vendor f-left showBox">
                            <div class="aside-title">
                                <div class="arrow-filter"></div>
                                <h2 class="title-filter title-head margin-top-0">
                                    <span>Giá</span>
                                    <span>
                                        <svg width="7" height="5" viewBox="0 0 7 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.77314 3.89481L6.88817 0.864894C6.96028 0.794816 7 0.701267 7 0.601519C7 0.501771 6.96028 0.408223 6.88817 0.338144L6.65882 0.115012C6.50938 -0.030182 6.26649 -0.030182 6.11727 0.115012L3.50145 2.65931L0.882733 0.112189C0.810628 0.0421102 0.714507 0.00341769 0.612011 0.00341769C0.509402 0.00341769 0.413281 0.0421102 0.341119 0.112189L0.111828 0.335321C0.0397234 0.405455 -2.16603e-08 0.498948 -2.60204e-08 0.598696C-3.03806e-08 0.698444 0.0397234 0.791993 0.111828 0.862071L3.22971 3.89481C3.30204 3.96506 3.39861 4.00364 3.50128 4.00342C3.60434 4.00364 3.70086 3.96506 3.77314 3.89481Z"
                                                fill="#1B1E2D"></path>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="aside-content margin-top-0 filter-group" style="display: none;">
                                <ul>
                                    <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                        style="margin-bottom: 8px;">
                                        <input class="filter-all" id="filter-price-2" type="radio" name="price"
                                            value="0" checked="checked">
                                        <label for="filter-price-0" class="checked">
                                            Tất cả </label>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                        style="margin-bottom: 8px;">
                                        <span>
                                            <input id="filter-price-1" type="radio" name="price" value="1">
                                            <label for="filter-price-1">
                                                Dưới 1 triệu </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                        style="margin-bottom: 8px;">
                                        <span>
                                            <input id="filter-price-2" type="radio" name="price" value="2">
                                            <label for="filter-price-2">
                                                Từ 1 đến 2 triệu </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                        style="margin-bottom: 8px;">
                                        <span>
                                            <input id="filter-price-3" type="radio" name="price" value="3">
                                            <label for="filter-price-3">
                                                Từ 2 đến 4 triệu </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green filter-radio"
                                        style="margin-bottom: 8px;">
                                        <span>
                                            <input id="filter-price-4" type="radio" name="price" value="4">
                                            <label for="filter-price-4">
                                                Từ 4 đến 6 triệu </label>
                                        </span>
                                    </li>
                                </ul>
                                <p style="margin-bottom: 0" class="range-toggle">
                                    <a href="javascript:void(0)" onclick="showRangePrice($(this))" class="link">
                                        <span>
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.48 18.5368H21M4.68 12L3 12.044M4.68 12C4.68 13.3255 5.75451 14.4 7.08 14.4C8.40548 14.4 9.48 13.3255 9.48 12C9.48 10.6745 8.40548 9.6 7.08 9.6C5.75451 9.6 4.68 10.6745 4.68 12ZM10.169 12.0441H21M12.801 5.55124L3 5.55124M21 5.55124H18.48M3 18.5368H12.801M17.88 18.6C17.88 19.9255 16.8055 21 15.48 21C14.1545 21 13.08 19.9255 13.08 18.6C13.08 17.2745 14.1545 16.2 15.48 16.2C16.8055 16.2 17.88 17.2745 17.88 18.6ZM17.88 5.4C17.88 6.72548 16.8055 7.8 15.48 7.8C14.1545 7.8 13.08 6.72548 13.08 5.4C13.08 4.07452 14.1545 3 15.48 3C16.8055 3 17.88 4.07452 17.88 5.4Z"
                                                    stroke="#363853" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                        </span>
                                        Hoặc chọn mức giá phù hợp với bạn
                                    </a>
                                </p>
                                <div class="wrapper-slider-range" style="display: block;">
                                    <div id="slider-range"
                                        class="slider-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                            style="left: 0%; width: 100%;"></div><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 0%;"></span><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 100%;"></span>
                                    </div>
                                    <div class="value-range">
                                        <input type="hidden" name="product_price_from" value="0">
                                        <input type="hidden" name="product_price_to" value="6000000">
                                        <div id="amout-from" class="amout-from">0 đ</div>
                                        <div id="amout-to" class="amout-to">6,000,000 đ</div>
                                    </div>
                                    <div class="other-filter__btn" style="">
                                        <div class="other-filter__btn-remove btn-remove__price">Bỏ chọn</div>
                                        <div class="other-filter__btn-filter" onclick="loadFilter()">Xem kết quả</div>
                                    </div>
                                </div>
                            </div>
                        </aside>

                        <aside class="aside-item aside-other-item aside-handle filter-vendor f-left aside-item__option">
                            <div class="aside-title">
                                <div class="arrow-filter"></div>
                                <h2 class="title-filter title-head margin-top-0">
                                    <span class="title-filter__option title-filter__option-checked">Bộ nhớ</span>
                                    <span class="title-filter__arrow">
                                        <svg width="7" height="5" viewBox="0 0 7 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.77314 3.89481L6.88817 0.864894C6.96028 0.794816 7 0.701267 7 0.601519C7 0.501771 6.96028 0.408223 6.88817 0.338144L6.65882 0.115012C6.50938 -0.030182 6.26649 -0.030182 6.11727 0.115012L3.50145 2.65931L0.882733 0.112189C0.810628 0.0421102 0.714507 0.00341769 0.612011 0.00341769C0.509402 0.00341769 0.413281 0.0421102 0.341119 0.112189L0.111828 0.335321C0.0397234 0.405455 -2.16603e-08 0.498948 -2.60204e-08 0.598696C-3.03806e-08 0.698444 0.0397234 0.791993 0.111828 0.862071L3.22971 3.89481C3.30204 3.96506 3.39861 4.00364 3.50128 4.00342C3.60434 4.00364 3.70086 3.96506 3.77314 3.89481Z"
                                                fill="#1B1E2D"></path>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="aside-content filter-group" style="display: none;">
                                <ul>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-13-0" class="filter-option-13-0" type="checkbox"
                                                name="option[]" value="13-50">
                                            <label for="filter-option-13-0" class="">
                                                256GB </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-13-1" class="filter-option-13-1" type="checkbox"
                                                name="option[]" value="13-51">
                                            <label for="filter-option-13-1" class="">
                                                128GB </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-13-2" class="filter-option-13-2" type="checkbox"
                                                name="option[]" value="13-52">
                                            <label for="filter-option-13-2" class="">
                                                64GB </label>
                                        </span>
                                    </li>
                                </ul>
                                <div class="other-filter__btn" style="">
                                    <div class="other-filter__btn-remove btn-remove__option">Bỏ chọn</div>
                                    <div class="other-filter__btn-filter" onclick="loadFilter()">Xem kết quả</div>
                                </div>
                            </div>
                        </aside>
                        <aside class="aside-item aside-other-item aside-handle filter-vendor f-left aside-item__option">
                            <div class="aside-title">
                                <div class="arrow-filter"></div>
                                <h2 class="title-filter title-head margin-top-0">
                                    <span class="title-filter__option title-filter__option-checked">Màu sắc</span>
                                    <span class="title-filter__arrow">
                                        <svg width="7" height="5" viewBox="0 0 7 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.77314 3.89481L6.88817 0.864894C6.96028 0.794816 7 0.701267 7 0.601519C7 0.501771 6.96028 0.408223 6.88817 0.338144L6.65882 0.115012C6.50938 -0.030182 6.26649 -0.030182 6.11727 0.115012L3.50145 2.65931L0.882733 0.112189C0.810628 0.0421102 0.714507 0.00341769 0.612011 0.00341769C0.509402 0.00341769 0.413281 0.0421102 0.341119 0.112189L0.111828 0.335321C0.0397234 0.405455 -2.16603e-08 0.498948 -2.60204e-08 0.598696C-3.03806e-08 0.698444 0.0397234 0.791993 0.111828 0.862071L3.22971 3.89481C3.30204 3.96506 3.39861 4.00364 3.50128 4.00342C3.60434 4.00364 3.70086 3.96506 3.77314 3.89481Z"
                                                fill="#1B1E2D"></path>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="aside-content filter-group" style="display: none;">
                                <ul>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-14-0" class="filter-option-14-0" type="checkbox"
                                                name="option[]" value="14-53">
                                            <label for="filter-option-14-0" class="">
                                                Vàng </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-14-1" class="filter-option-14-1" type="checkbox"
                                                name="option[]" value="14-54">
                                            <label for="filter-option-14-1" class="">
                                                Đỏ </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-14-2" class="filter-option-14-2" type="checkbox"
                                                name="option[]" value="14-55">
                                            <label for="filter-option-14-2" class="">
                                                Trắng </label>
                                        </span>
                                    </li>
                                </ul>
                                <div class="other-filter__btn" style="">
                                    <div class="other-filter__btn-remove btn-remove__option">Bỏ chọn</div>
                                    <div class="other-filter__btn-filter" onclick="loadFilter()">Xem kết quả</div>
                                </div>
                            </div>
                        </aside>
                        <aside class="aside-item aside-other-item aside-handle filter-vendor f-left aside-item__option">
                            <div class="aside-title">
                                <div class="arrow-filter"></div>
                                <h2 class="title-filter title-head margin-top-0">
                                    <span class="title-filter__option title-filter__option-checked">Size</span>
                                    <span class="title-filter__arrow">
                                        <svg width="7" height="5" viewBox="0 0 7 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.77314 3.89481L6.88817 0.864894C6.96028 0.794816 7 0.701267 7 0.601519C7 0.501771 6.96028 0.408223 6.88817 0.338144L6.65882 0.115012C6.50938 -0.030182 6.26649 -0.030182 6.11727 0.115012L3.50145 2.65931L0.882733 0.112189C0.810628 0.0421102 0.714507 0.00341769 0.612011 0.00341769C0.509402 0.00341769 0.413281 0.0421102 0.341119 0.112189L0.111828 0.335321C0.0397234 0.405455 -2.16603e-08 0.498948 -2.60204e-08 0.598696C-3.03806e-08 0.698444 0.0397234 0.791993 0.111828 0.862071L3.22971 3.89481C3.30204 3.96506 3.39861 4.00364 3.50128 4.00342C3.60434 4.00364 3.70086 3.96506 3.77314 3.89481Z"
                                                fill="#1B1E2D"></path>
                                        </svg>
                                    </span>
                                </h2>
                            </div>
                            <div class="aside-content filter-group" style="display: none;">
                                <ul>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-15-0" class="filter-option-15-0" type="checkbox"
                                                name="option[]" value="15-56">
                                            <label for="filter-option-15-0" class="">
                                                S </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-15-1" class="filter-option-15-1" type="checkbox"
                                                name="option[]" value="15-57">
                                            <label for="filter-option-15-1" class="">
                                                M </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green ">
                                        <span>
                                            <input id="filter-option-15-2" class="filter-option-15-2" type="checkbox"
                                                name="option[]" value="15-58">
                                            <label for="filter-option-15-2" class="">
                                                L </label>
                                        </span>
                                    </li>
                                </ul>
                                <div class="other-filter__btn" style="">
                                    <div class="other-filter__btn-remove btn-remove__option">Bỏ chọn</div>
                                    <div class="other-filter__btn-filter" onclick="loadFilter()">Xem kết quả</div>
                                </div>
                            </div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <div class="row">

                <?php foreach($products as $key => $products){ ?>
                <div class="col-6 col-md-3 col-lg-20 product-col">
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