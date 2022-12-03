/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/checkout_v1.js ***!
  \*************************************/
var toggleShowOrderSummary = false;
$(document).ready(function () {
  $('body').on('click', '.order-summary-toggle', function () {
    toggleShowOrderSummary = !toggleShowOrderSummary;
    if (toggleShowOrderSummary) {
      $('.order-summary-toggle').removeClass('order-summary-toggle-hide').addClass('order-summary-toggle-show');
      $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary').removeClass('order-summary-is-collapsed').addClass('order-summary-is-expanded');
      $('.sidebar.sidebar-second .sidebar-content .order-summary').removeClass('order-summary-is-expanded').addClass('order-summary-is-collapsed');
    } else {
      $('.order-summary-toggle').removeClass('order-summary-toggle-show').addClass('order-summary-toggle-hide');
      $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary').removeClass('order-summary-is-expanded').addClass('order-summary-is-collapsed');
      $('.sidebar.sidebar-second .sidebar-content .order-summary').removeClass('order-summary-is-collapsed').addClass('order-summary-is-expanded');
    }
  });
});
function funcFieldHasValue(fieldInputElement, isCheckRemove) {
  if (fieldInputElement == undefined) return;
  var fieldElement = $(fieldInputElement).closest('.field');
  if (fieldElement == undefined) return;
  if ($(fieldElement).find('.field-input-wrapper-select').length > 0) {
    var value = $(fieldInputElement).find(':selected').val();
    if (value == 'null') value = undefined;
    if ($(fieldInputElement)[0].id == 'customer_shipping_country') {
      var country_selected = $('body').find('input[name=selected_customer_shipping_country]');
      if (country_selected && country_selected.length > 0) {
        $(country_selected).val(value);
      }
    }
    if ($(fieldInputElement)[0].id == 'customer_shipping_province') {
      var province_selected = $('body').find('input[name=selected_customer_shipping_province]');
      if (province_selected && province_selected.length > 0) {
        $(province_selected).val(value);
      }
    }
    if ($(fieldInputElement)[0].id == 'customer_shipping_district') {
      var district_selected = $('body').find('input[name=selected_customer_shipping_district]');
      if (district_selected && district_selected.length > 0) {
        $(district_selected).val(value);
      }
    }
    if ($(fieldInputElement)[0].id == 'customer_shipping_ward') {
      var ward_selected = $('body').find('input[name=selected_customer_shipping_ward]');
      if (ward_selected && ward_selected.length > 0) {
        $(ward_selected).val(value);
      }
    }
  } else {
    var value = $(fieldInputElement).val();
  }
  if (!isCheckRemove) {
    if (value != $(fieldInputElement).attr('value')) $(fieldElement).removeClass('field-error');
  }
  var fieldInputBtnWrapperElement = $(fieldInputElement).closest('.field-input-btn-wrapper');
  if (value && value.trim() != '') {
    $(fieldElement).addClass('field-show-floating-label');
    $(fieldInputBtnWrapperElement).find('button:submit').removeClass('btn-disabled');
  } else if (isCheckRemove) {
    $(fieldElement).removeClass('field-show-floating-label');
    $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
  } else {
    $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
  }
}
;
function funcFieldFocus(fieldInputElement, isFocus) {
  if (fieldInputElement == undefined) return;
  var fieldElement = $(fieldInputElement).closest('.field');
  if (fieldElement == undefined) return;
  if (isFocus) $(fieldElement).addClass('field-active');else $(fieldElement).removeClass('field-active');
}
;
function funcSetEvent() {
  var effectControlFieldClass = '.field input, .field select, .field textarea';
  $('body').on('focus', effectControlFieldClass, function () {
    funcFieldFocus($(this), true);
  }).on('blur', effectControlFieldClass, function () {
    funcFieldFocus($(this), false);
    funcFieldHasValue($(this), true);
  }).on('keyup input paste', effectControlFieldClass, function () {
    funcFieldHasValue($(this), false);
  });
  $('body').on('change', '#section-payment-method input:radio', function () {
    $('#section-payment-method .content-box-row.content-box-row-secondary').addClass('hidden');
    var id = $(this).attr('id');
    if (id) {
      var sub = $('body').find('.content-box-row.content-box-row-secondary[for=' + id + ']');
      if (sub && sub.length > 0) {
        $(sub).removeClass('hidden');
      }
    }
  });
}
;
function sectionStep(step) {
  $(".breadcrumb-link").each(function (url_key, link) {
    if (Number($(link).attr("step")) == Number($(this).attr("step"))) {
      $(link).parent().removeClass('breadcrumb-item-current');
    }
    if (Number($(link).attr("step")) == Number(step)) {
      $(link).parent().addClass('breadcrumb-item-current');
    }
  });
  $(".step-sections").each(function (index, value) {
    if (Number($(value).attr("step")) == Number($(this).attr("step"))) {
      $(value).hide();
    }
    if (Number($(value).attr("step")) == Number(step)) {
      $(value).show();
    }
  });
  $(".step-sections-footer").each(function (index, value) {
    if (Number($(value).attr("step")) == Number($(this).attr("step"))) {
      $(value).hide();
    }
    if (Number($(value).attr("step")) == Number(step)) {
      $(value).show();
    }
  });
}
window.addEventListener('DOMContentLoaded', function (event) {
  if ($('#is-delivery-address').is(":checked") == true) {
    $('#container-form-address-ship').css('display', 'none');
  } else {
    $('#container-form-address-ship').css('display', 'block');
  }
});
function showHideDeliveryAddress() {
  var toggle_info_payment = $('#is-delivery-address').is(":checked");
  if (toggle_info_payment == true) {
    $('#container-form-address-ship').css('display', 'none');
  } else {
    $('#container-form-address-ship').css('display', 'block');
  }
}
window.addEventListener('DOMContentLoaded', function (event) {
  if ($('#request-invoice').is(":checked") == true) {
    $('#container-form-invoice').show();
  } else {
    $('#container-form-invoice').hide();
  }
});
function showHideInvoice() {
  var toggle_invoice = $('#request-invoice').is(":checked");
  if (toggle_invoice == true) {
    $('#container-form-invoice').css('display', 'block');
  } else {
    $('#container-form-invoice').css('display', 'none');
  }
  loadListShipping();
}
/******/ })()
;