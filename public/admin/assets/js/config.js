"use strict";var urlParams=new URLSearchParams(window.location.search),CONFIG={isNavbarVerticalCollapsed:urlParams.get("isNavbarVerticalCollapsed")||!1,theme:urlParams.get("theme")||"light",isRTL:urlParams.get("isRTL")||!1,isFluid:urlParams.get("isFluid")||!1,navbarStyle:urlParams.get("navbarStyle")||"transparent",navbarPosition:urlParams.get("navbarPosition")||"vertical"};Object.keys(CONFIG).forEach(function(a){(urlParams.get(a)||null===localStorage.getItem(a))&&localStorage.setItem(a,CONFIG[a])}),JSON.parse(localStorage.getItem("isNavbarVerticalCollapsed"))&&document.documentElement.classList.add("navbar-vertical-collapsed"),"dark"===localStorage.getItem("theme")&&document.documentElement.classList.add("dark");