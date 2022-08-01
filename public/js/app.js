/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

// require('./bootstrap');
__webpack_require__(/*! ./home */ "./resources/js/home.js");

/***/ }),

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/***/ (() => {

"use strict";


function openLoading() {
  var element = document.getElementById("app-spinner-id");

  if (element) {
    element.style.visibility = "visible";
  }
}

function closeLoading() {
  var element = document.getElementById("app-spinner-id");

  if (element) {
    element.style.visibility = "hidden";
  }
}

function handleScrollTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

function handleScrollBottom() {
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: 'smooth'
  });
}

function getItem(item) {
  var img = item.image ? item.image : '/img/laravel.png';
  return "\n  <div class=\"card-item\">\n    <div class=\"card\">\n      <img src=\"".concat(img, "\" style=\"width: 100%; height: 150px;\" class=\"card-img-top\" alt=\"Img\">\n      <div class=\"card-body\">\n        <a href=\"/posts/view/").concat(item.id, "\">\n          <h5 class=\"card-title text-truncate\">").concat(item.id, " - ").concat(item.title, "</h5>\n        </a>\n\n        <p class=\"card-text text-truncate\">\n          ").concat(item.description1 || '', "\n        </p>\n      </div>\n    </div>  \n  </div>");
}

function handleRes() {
  var data = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var list = document.getElementById("list-post-body");

  if (list) {
    data === null || data === void 0 ? void 0 : data.forEach(function (item) {
      list.innerHTML += getItem(item);
    });
  }
}

function handleViewMoreBtn() {
  var meta = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

  if ((meta === null || meta === void 0 ? void 0 : meta.current_page) >= (meta === null || meta === void 0 ? void 0 : meta.last_page)) {
    var viewMoreElement = document.getElementById("view-more-btn");

    if (viewMoreElement) {
      // viewMoreElement.classList.add("view-more-btn-hidden");
      viewMoreElement.style.display = "none";
    }
  }

  var searchTotalElement = document.getElementById("search-total-items");

  if (searchTotalElement) {
    searchTotalElement.innerHTML = Math.min((meta === null || meta === void 0 ? void 0 : meta.current_page) * (meta === null || meta === void 0 ? void 0 : meta.per_page), meta === null || meta === void 0 ? void 0 : meta.total);
  }
}

function handleViewMore() {
  openLoading();
  var search = '';
  var page = 1;
  var searchInputElement = document.getElementById("search-input-id");

  if (searchInputElement) {
    search = searchInputElement.value;
  }

  var currentPageElement = document.getElementById("current-page-id");

  if (currentPageElement) {
    page = Number(currentPageElement.value) + 1;
  }

  var params = new URLSearchParams({
    search: search,
    page: page
  });
  var url = '/api/list?' + params;
  fetch(url).then(function (response) {
    return response.json();
  }).then(function (res) {
    handleRes(res === null || res === void 0 ? void 0 : res.data);
    handleViewMoreBtn(res === null || res === void 0 ? void 0 : res.meta);
  })["catch"](function (error) {
    console.error("Error: ", error);
  })["finally"](function () {
    currentPageElement.value = page;
    handleScrollBottom();
    closeLoading();
  });
}

window.onload = function () {
  var viewMoreElement = document.getElementById("view-more-btn");

  if (viewMoreElement) {
    viewMoreElement.addEventListener("click", handleViewMore);
  }

  var scrollTopElement = document.getElementById("scroll-top-btn-id");

  if (scrollTopElement) {
    scrollTopElement.addEventListener("click", handleScrollTop);
  }

  var scrollBottomElement = document.getElementById("scroll-down-btn-id");

  if (scrollBottomElement) {
    scrollBottomElement.addEventListener("click", handleScrollBottom);
  }
};

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
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
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
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
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
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
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
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
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;