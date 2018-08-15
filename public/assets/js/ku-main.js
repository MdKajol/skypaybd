$(document).ready(function(){
   $('.kslick').slick({
      dots: false,
      autoplay: true,
      autoplaySpeed: 1000,
      arrows : false,
      fade: true,
      cssEase: 'linear'
   });
});

$(document).ready(function(){
   $('.we-acc-slick').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows : false,
      autoplay: true,
      autoplaySpeed: 500
   });






   if(window.location.hash !== "") {
      var link = $(".olympia-nav ul li a[href='"+ window.location.hash +"']");
      var link2 = $(".slicknav_menu ul li a[href='"+ window.location.hash +"']");
      $(".olympia-nav ul li a, .slicknav_menu ul li a").removeClass("nav-active");
      link.addClass("nav-active");
      link2.addClass("nav-active");
   }

   // mobile menu
   $('#olympia-menu').slicknav({
      label: "",
      prependTo:'.olympia-nav'
   });

   // active link
   $(".olympia-nav ul li a").click(function(){
      $(".olympia-nav ul li a").removeClass("nav-active");
      $(this).addClass("nav-active");
   });

});




/*!
 * scrollup v2.4.1
 * Url: http://markgoodyear.com/labs/scrollup/
 * Copyright (c) Mark Goodyear — @markgdyr — http://markgoodyear.com
 * License: MIT
 */
!function (l, o, e) { "use strict"; l.fn.scrollUp = function (o) { l.data(e.body, "scrollUp") || (l.data(e.body, "scrollUp", !0), l.fn.scrollUp.init(o)) }, l.fn.scrollUp.init = function (r) { var s, t, c, i, n, a, d, p = l.fn.scrollUp.settings = l.extend({}, l.fn.scrollUp.defaults, r), f = !1; switch (d = p.scrollTrigger ? l(p.scrollTrigger) : l("<a/>", { id: p.scrollName, href: "#top" }), p.scrollTitle && d.attr("title", p.scrollTitle), d.appendTo("body"), p.scrollImg || p.scrollTrigger || d.html(p.scrollText), d.css({ display: "none", position: "fixed", zIndex: p.zIndex }), p.activeOverlay && l("<div/>", { id: p.scrollName + "-active" }).css({ position: "absolute", top: p.scrollDistance + "px", width: "100%", borderTop: "1px dotted" + p.activeOverlay, zIndex: p.zIndex }).appendTo("body"), p.animation) { case "fade": s = "fadeIn", t = "fadeOut", c = p.animationSpeed; break; case "slide": s = "slideDown", t = "slideUp", c = p.animationSpeed; break; default: s = "show", t = "hide", c = 0 }i = "top" === p.scrollFrom ? p.scrollDistance : l(e).height() - l(o).height() - p.scrollDistance, n = l(o).scroll(function () { l(o).scrollTop() > i ? f || (d[s](c), f = !0) : f && (d[t](c), f = !1) }), p.scrollTarget ? "number" == typeof p.scrollTarget ? a = p.scrollTarget : "string" == typeof p.scrollTarget && (a = Math.floor(l(p.scrollTarget).offset().top)) : a = 0, d.click(function (o) { o.preventDefault(), l("html, body").animate({ scrollTop: a }, p.scrollSpeed, p.easingType) }) }, l.fn.scrollUp.defaults = { scrollName: "scrollUp", scrollDistance: 300, scrollFrom: "top", scrollSpeed: 300, easingType: "linear", animation: "fade", animationSpeed: 200, scrollTrigger: !1, scrollTarget: !1, scrollText: "Scroll to top", scrollTitle: !1, scrollImg: !1, activeOverlay: !1, zIndex: 2147483647 }, l.fn.scrollUp.destroy = function (r) { l.removeData(e.body, "scrollUp"), l("#" + l.fn.scrollUp.settings.scrollName).remove(), l("#" + l.fn.scrollUp.settings.scrollName + "-active").remove(), l.fn.jquery.split(".")[1] >= 7 ? l(o).off("scroll", r) : l(o).unbind("scroll", r) }, l.scrollUp = l.fn.scrollUp }(jQuery, window, document);

$.scrollUp({
   scrollName: 'scrollUp', // Element ID
   topDistance: '300', // Distance from top before showing element (px)
   topSpeed: 300, // Speed back to top (ms)
   animation: 'fade', // Fade, slide, none
   animationInSpeed: 200, // Animation in speed (ms)
   animationOutSpeed: 200, // Animation out speed (ms)
   scrollText: '<i class="icofont icofont-bubble-up"></i>', // Text for element
   activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});


// user controll toggle
$("#admin-pro-hide a").on('click',function(e){
   e.preventDefault();
   var state = $("#admin-pro").attr("ku-toggle");
   if(state == "show") {
      $("#admin-pro").hide("slow");
      $("#admin-pro").attr("ku-toggle", "hide");
      $(this).removeClass("active");
   } else if(state == "hide") {
      $("#admin-pro").show("slow");
      $("#admin-pro").attr("ku-toggle", "show");
      $(this).addClass("active");
   }
});

// left menu toggle
$("#left-menu-hide a").on('click',function(e){
   e.preventDefault();
   var state = $("#left-menu").attr("ku-toggle");
   if(state == "show") {
      $("#left-menu").hide("slow");
      $("#left-menu").attr("ku-toggle", "hide");
      // $(".dashboard-content-area, .dashboard-footer").removeClass("menu-left-gap");
      if($(window).width() <= 768) {
         $(".menu-left-gap").css("marginLeft", "0px");
      } else {
         $(".menu-left-gap").css("marginLeft", "20px");
      }
      $(this).removeClass("active");
   } else if(state == "hide") {
      $("#left-menu").show("slow");
      $("#left-menu").attr("ku-toggle", "show");
      // $(".dashboard-content-area, .dashboard-footer").addClass("menu-left-gap");
      if($(window).width() <= 768) {
         $(".menu-left-gap").css("marginLeft", "100%");
      } else {
         $(".menu-left-gap").css("marginLeft", "270px");
      }

      $(this).addClass("active");
   }
});

$(document).ready(function(){
   if($(window).width() <= 768) {
      $("#left-menu").attr("ku-toggle", "hide");
      $("#left-menu").css("display", "none");
      $(".menu-left-gap").css("marginLeft", "0px");
      $("#left-menu-hide a").removeClass("active");
   }
});


// payment method details
$("select#paymentMethod").on("change", function () {
   var selectedPaymentMethod = $(this).val();

   switch (selectedPaymentMethod) {
      case "bkash" :
         // show bkash option
         $(".paymentDetails").hide();
         $(".paymentDetails input, .paymentDetails textarea").attr("disabled", "disabled");
         $(".bkashDetails").show();
         $(".bkashDetails input, .bkashDetails textarea").removeAttr("disabled", "disabled");
         break;
      case "rocket" :
         // show nexus pay details
         $(".paymentDetails").hide();
         $(".paymentDetails input, .paymentDetails textarea").attr("disabled", "disabled");
         $(".nexusPayDetails").show();
         $(".nexusPayDetails input, .nexusPayDetails textarea").removeAttr("disabled", "disabled");
         break;
      case "bank" :
         // show nexus pay details
         $(".paymentDetails").hide();
         $(".paymentDetails input, .paymentDetails textarea").attr("disabled", "disabled");
         $(".bankPayDetails").show();
         $(".bankPayDetails input, .bankPayDetails textarea").removeAttr("disabled", "disabled");
         break;
      default :
         // hide payment details
         $(".paymentDetails").hide();
         $(".paymentDetails input, .paymentDetails textarea").attr("disabled", "disabled");
         break;
   }

});

// receive method details
$("select#receivedMethod").on("change", function () {
   var selectedReceivedMethod = $(this).val();
   switch (selectedReceivedMethod) {
      case "paypal" :
         // show paypal option
         $(".receiveDetails").hide();
         $(".receiveDetails input, .receiveDetails textarea").attr("disabled", "disabled");

         $(".receiveDetails.paypal").show();
         $(".receiveDetails.paypal input, .receiveDetails.paypal textarea").removeAttr("disabled", "disabled");
         break;
      case "payoneer" :
         // show payoneer pay details
         $(".receiveDetails").hide();
         $(".receiveDetails input, .receiveDetails textarea").attr("disabled", "disabled");

         $(".receiveDetails.payoneer").show();
         $(".receiveDetails.payoneer input, .receiveDetails.payoneer textarea").removeAttr("disabled", "disabled");
         break;
      case "neteller" :
         // show neteller pay details
         $(".receiveDetails").hide();
         $(".receiveDetails input, .receiveDetails textarea").attr("disabled", "disabled");

         $(".receiveDetails.neteller").show();
         $(".receiveDetails.neteller input, .receiveDetails.neteller textarea").removeAttr("disabled", "disabled");
         break;
      case "skrill" :
         console.log("skrill");
         // show nexus pay details
         $(".receiveDetails").hide();
         $(".receiveDetails input, .receiveDetails textarea").attr("disabled", "disabled");

         $(".receiveDetails.skrill").show();
         $(".receiveDetails.skrill input, .receiveDetails.skrill textarea").removeAttr("disabled", "disabled");
      break;
      default :
         // hide receive details
         $(".receiveDetails").hide();
         $(".receiveDetails input, .receiveDetails textarea").attr("disabled", "disabled");
         break;
   }
});

// exchange pay method details
$("select#exchangeMethod").on("change", function () {
   var selectedReceivedMethod = $(this).val();
   switch (selectedReceivedMethod) {
      case "paypal" :
         // show paypal option
         $(".exchangeDetails").hide();
         $(".exchangeDetails input, .exchangeDetails textarea").attr("disabled", "disabled");

         $(".exchangeDetails.paypal").show();
         $(".exchangeDetails.paypal input, .exchangeDetails.paypal textarea").removeAttr("disabled", "disabled");
         break;
      case "payoneer" :
         // show payoneer pay details
         $(".exchangeDetails").hide();
         $(".exchangeDetails input, .exchangeDetails textarea").attr("disabled", "disabled");

         $(".exchangeDetails.payoneer").show();
         $(".exchangeDetails.payoneer input, .exchangeDetails.payoneer textarea").removeAttr("disabled", "disabled");
         break;
      case "neteller" :
         // show neteller pay details
         $(".exchangeDetails").hide();
         $(".exchangeDetails input, .exchangeDetails textarea").attr("disabled", "disabled");

         $(".exchangeDetails.neteller").show();
         $(".exchangeDetails.neteller input, .exchangeDetails.neteller textarea").removeAttr("disabled", "disabled");
         break;
      case "skrill" :
         console.log("skrill");
         // show nexus pay details
         $(".exchangeDetails").hide();
         $(".exchangeDetails input, .exchangeDetails textarea").attr("disabled", "disabled");

         $(".exchangeDetails.skrill").show();
         $(".exchangeDetails.skrill input, .exchangeDetails.skrill textarea").removeAttr("disabled", "disabled");
         break;
      default :
         // hide receive details
         $(".exchangeDetails").hide();
         $(".exchangeDetails input, .exchangeDetails textarea").attr("disabled", "disabled");
         break;
   }
});



function convert_dollar_to_taka(dollar, opt) {
   if(opt == "buy") {
      if(!isNaN(dollar)) {
         return parseFloat((dollar * 102));
      } else {
         console.log("not a number")
      }
   } else if(opt == "sell") {
      if(!isNaN(dollar)) {
         return parseFloat((dollar * 85));
      } else {
         console.log("not a number")
      }
   } else {
      if(!isNaN(dollar)) {
         return parseFloat((dollar * 0.9));
      } else {
         console.log("not a number")
      }
   }

}
$("#buyDollar").on("keyup", function(){
   var dollar = $(this).val();
   var taka = convert_dollar_to_taka(dollar, "buy");
   $("#dollarInTaka").val(taka);
});
$("#sellDollar").on("keyup", function(){
   var dollar = $(this).val();
   var taka = convert_dollar_to_taka(dollar, "sell");
   $("#dollarInTaka").val(taka);
});
$("#exchangeDollar").on("keyup", function(){
   var dollar = $(this).val();
   var taka = convert_dollar_to_taka(dollar, "exchange");
   $("#dollarInTaka").val(taka);
});

// smoth scroll
var scroll = new SmoothScroll('.olympia-nav ul li a[href*="#"]', {
   speed: 2000,
   easing: 'easeInOutCubic',
   updateURL: true, // Update the URL on scroll
   popstate: true,
   offset: 100
});





