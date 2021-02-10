/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! ./cart */ "./resources/js/cart.js");

/***/ }),

/***/ "./resources/js/cart.js":
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
/***/ (() => {

$(document).ready(function () {
  function setProductQty(productId, oldQty, qty) {
    if (window.location.href.split('/').pop() === 'cart' && oldQty !== qty && qty > 0) {
      var _token = $("input[name='_token']").val();

      $.ajax({
        url: "/product/set-quantity",
        type: "POST",
        data: {
          _token: _token,
          productId: productId,
          quantity: qty
        },
        beforeSend: function beforeSend() {
          $("#load-overlay").addClass("display-overlay");
        },
        success: function success(data) {
          $('#header-cart-container').html("<div class=\"cart-qtd\">\n                            <p class=\"amount\">".concat(data.cart_count, "</p>\n                        </div>"));
          $('#current-price-' + productId).html("".concat(data.product.current_price, " ").concat(data.currency));
          $('#total-price-' + productId).html("".concat(data.product.total, " ").concat(data.currency));
          $('#cart-sub-total').html("".concat(data.cart_totals.sub_total, " ").concat(data.currency));
          $('#cart-total').html("".concat(data.cart_totals.total, " ").concat(data.currency));
          $("#load-overlay").removeClass("display-overlay");
        }
      });
    }
  }

  $(".remove-item-btn").click(function (e) {
    e.preventDefault();
    $('.messages').empty();
    console.log();

    var _token = $("input[name='_token']").val();

    var productId = $(this).attr('data-product-id');
    $.ajax({
      url: "/product/remove-item",
      type: "POST",
      data: {
        _token: _token,
        productId: productId
      },
      beforeSend: function beforeSend() {
        $("#load-overlay").addClass("display-overlay");
      },
      success: function success(data) {
        if (data.status) {
          $('.messages').html('<li class="success-msg">' + '<ul>' + '<li>' + data.message + '</li>' + '</ul>' + '</li>');
          $('#header-cart-container').html("<div class=\"cart-qtd\">\n                            <p class=\"amount\">".concat(data.cart_count, "</p>\n                        </div>"));
          $('#product-row-' + productId).remove();
          $('#cart-sub-total').html("".concat(data.cart_totals.sub_total, " ").concat(data.currency));
          $('#cart-total').html("".concat(data.cart_totals.total, " ").concat(data.currency));
          $("#load-overlay").removeClass("display-overlay");
        }
      }
    });
  });
  $('[id^="product-dec-qty-"]').click(function (e) {
    var productId = $(this).attr('id').split('-').pop();
    var $qtyField = $('#product-qty-field-' + productId);
    var $qtyFieldValue = $qtyField.val();

    if (parseInt($qtyFieldValue) > 1) {
      $qtyField.val(parseInt($qtyFieldValue) - 1);
    } else {
      $qtyField.val($qtyField.attr('min'));
    }

    setProductQty(productId, parseInt($qtyFieldValue), parseInt($qtyField.val()));
  });
  $('[id^="product-inc-qty-"]').click(function (e) {
    var productId = $(this).attr('id').split('-').pop();
    var $qtyField = $('#product-qty-field-' + productId);
    var $qtyFieldValue = $qtyField.val();

    if (parseInt($qtyFieldValue) && parseInt($qtyFieldValue) < parseInt($qtyField.attr('max'))) {
      $qtyField.val(parseInt($qtyFieldValue) + 1);
    } else if (parseInt($qtyFieldValue) === parseInt($qtyField.attr('max'))) {
      $('#warning-msg-' + productId).addClass('display-msg');
    } else if (!parseInt($qtyFieldValue)) {
      $qtyField.val($qtyField.attr('min'));
    }

    setProductQty(productId, parseInt($qtyFieldValue), parseInt($qtyField.val()));
  });
  $('[id^="product-qty-field-"]').keypress(function (event) {
    if (event.which != 8 && event.which != 0 && event.which < 48 || event.which > 57 || event.which == "0".charCodeAt(0) && $(this).val().trim() == "") {
      event.preventDefault();
    }
  });
  $('[id^="product-qty-field-"]').on('keyup', function (event) {
    var productId = $(this).attr('id').split('-').pop();

    if (parseInt($(this).val()) > parseInt($(this).attr('max')) && event.keyCode !== 46 // keycode for delete
    && event.keyCode !== 8 // keycode for backspace
    ) {
        event.preventDefault();
        $(this).val($(this).attr('max'));
        $('#warning-msg-' + productId).addClass('display-msg');
      }
  });
  var $focusedField = null;
  var $focusedFieldValue = null;
  $('[id^="product-qty-field-"]').focus(function (event) {
    console.log($(this));
    $focusedField = $(this);
    $focusedFieldValue = $(this).val();
  });
  $('[id^="product-qty-field-"]').focusout(function (event) {
    var productId = $(this).attr('id').split('-').pop();

    if (!$(this).val()) {
      $(this).val($(this).attr('min'));
    }

    setProductQty(productId, parseInt($focusedFieldValue), parseInt($(this).val()));
    $focusedField = null;
    $focusedFieldValue = null;
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = x => {}
/************************************************************************/
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => Object.prototype.hasOwnProperty.call(obj, prop)
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./resources/js/app.js"],
/******/ 			["./resources/sass/app.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = x => {};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime, executeModules] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 		
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = x => {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = () => {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (x => {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	// run startup
/******/ 	__webpack_require__.x();
/******/ })()
;