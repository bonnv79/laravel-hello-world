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
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function handleScrollBottom() {
  window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
}

function getItem(item) {
  return `
  <div class="card-item">
    <div class="card">
      <img src="/img/laravel.png" class="card-img-top" alt="Img">
      <div class="card-body">
        <a href="/posts/view/${item.id}">
          <h5 class="card-title text-truncate">${item.id} - ${item.title}</h5>
        </a>

        <p class="card-text text-truncate">
          ${item.description}
        </p>
      </div>
    </div>  
  </div>`;
}

function handleRes(data = []) {
  var list = document.getElementById("list-post-body");

  if (list) {
    data?.forEach(item => {
      list.innerHTML += getItem(item);
    });
  }
}

function handleViewMoreBtn(meta = {}) {
  if (meta?.current_page >= meta?.last_page) {
    var viewMoreElement = document.getElementById("view-more-btn");
    if (viewMoreElement) {
      // viewMoreElement.classList.add("view-more-btn-hidden");
      viewMoreElement.style.display = "none";
    }
  }

  var searchTotalElement = document.getElementById("search-total-items");
  if (searchTotalElement) {
    searchTotalElement.innerHTML = Math.min(meta?.current_page * meta?.per_page, meta?.total);
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
    search,
    page,
  });

  var url = '/api/list?' + params;

  fetch(url).then(function (response) {
    return response.json();
  }).then(function (res) {
    handleRes(res?.data);
    handleViewMoreBtn(res?.meta);
  }).catch(function (error) {
    console.error("Error: ", error);
  }).finally(() => {
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
}