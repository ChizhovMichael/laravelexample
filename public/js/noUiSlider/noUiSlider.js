/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/noUiSlider/noUiSlider.js":
/*!***********************************************!*\
  !*** ./resources/js/noUiSlider/noUiSlider.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
  Inspired by: "Price Range Control"
  By: cubertodesign
  Link: https://www.instagram.com/p/Bs-0fByhwy8/
*/
document.addEventListener("DOMContentLoaded", function () {
  var minDollars = document.querySelector('#from');
  minDollars = minDollars.innerText.replace(/[^-0-9]/gim, '');
  minDollars = parseInt(minDollars);
  var maxDollars = document.querySelector('#to');
  maxDollars = maxDollars.innerText.replace(/[^-0-9]/gim, '');
  maxDollars = parseInt(maxDollars);
  var minSlider = document.querySelector('#min');
  var maxSlider = document.querySelector('#max');

  function numberWithSpaces(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
  }

  function updateDollars() {
    var fromValue = minSlider.value;
    var toValue = maxSlider.value;
    document.querySelector('#from').textContent = "".concat(numberWithSpaces(Math.floor(fromValue)), " \u20BD");
    document.querySelector('#to').textContent = "".concat(numberWithSpaces(Math.floor(toValue)), " \u20BD");
  }

  maxSlider.addEventListener('input', function () {
    var minValue = parseInt(minSlider.value);
    var maxValue = parseInt(maxSlider.value);

    if (maxValue < minValue + 10) {
      minSlider.value = maxValue - 10;

      if (minValue === parseInt(minSlider.min)) {
        maxSlider.value = 10;
      }
    }

    updateDollars();
  });
  minSlider.addEventListener('input', function () {
    var minValue = parseInt(minSlider.value);
    var maxValue = parseInt(maxSlider.value);

    if (minValue > maxValue - 10) {
      maxSlider.value = minValue + 10;

      if (maxValue === parseInt(maxSlider.max)) {
        minSlider.value = parseInt(maxSlider.max) - 10;
      }
    }

    updateDollars();
  });
});

/***/ }),

/***/ 1:
/*!*****************************************************!*\
  !*** multi ./resources/js/noUiSlider/noUiSlider.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\telezapchasti\resources\js\noUiSlider\noUiSlider.js */"./resources/js/noUiSlider/noUiSlider.js");


/***/ })

/******/ });