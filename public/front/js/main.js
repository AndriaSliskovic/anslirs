
"use strict";
function centerModal() {
    $(this).css("display", "block");
    var dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - dialog.height()) / 2;
    dialog.css("margin-top", offset);
}
/**********Document Ready Function*********/
$(document).ready(function (){

    /************** Modal Center *************/
    $(".modal").on("show.bs.modal", centerModal);
    /************** Sidebar *************/
    $(".menuclick").on("click",function(){
        $(".sidebar").addClass("open");
        $(".overlay").addClass("open");
        $("body").css({"overflow-y":"hidden"});
    });
    /************** Overlay *************/
    $(".overlay").on("click",function(){
        $(".sidebar").removeClass("open");
        $(".overlay").removeClass("open");
        $("body").css({"overflow-y":"auto"});
    });
    /************** Menu Close *************/
    $(".close").on("click",function(){
        $(".sidebar").removeClass("open");
        $(".overlay").removeClass("open");
        $("body").css({"overflow-y":"auto"});
    });
    /************** Search *************/
    $(".fa-search").on("click",function(){
        $(".tsearch").show();
    });
    $(".icofont-close-line").on("click",function(){
        $(".tsearch").hide();
    });
    /************** psearch *************/
     $(".psearch").on("click",function(){
        $(".search").toggleClass("opensearch");
        $("body").css({"overflow-y":"hidden"});
     });
    /************** sclose *************/
     $(".sclose").on("click",function(){
        $(".search").removeClass("opensearch");
        $("body").css({"overflow-y":"auto"});
     });
     /************** Menu *************/
     $(".baricon").on("click",function(){
        $(this).next("ul").slideToggle(500);
    });
    /************** Submenu *************/
    $(".marrow").on("click",function(){
        $(".marrow").not(this).next(".submenu").slideUp();
        $(this).next(".submenu").stop(true, true).slideToggle(400);
        return false;
    });
    /************** Submenu *************/
    $(".sinmenu").on("click",function(){
        $(".sinmenu").not(this).next("ul").slideUp();
        $(this).next("ul").stop(true, true).slideToggle(400);
        return false;
    });
    /************** Scroll Up *************/
    $(".scrollup").on("click",function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    /************** Slider *************/
    $(".mainslide").owlCarousel({
        margin:0,
        nav:true,
        dots:true,
        loop:true,
        mouseDrag:false,
        autoplay:true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    /************** Instagram Slide *************/
    $(".instaslide").owlCarousel({
        margin:1,
        nav:false,
        dots:false,
        loop:true,
        mouseDrag:true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    });
	/************** Articles Slide *************/
    $(".artslide").owlCarousel({
        margin:20,
        nav:false,
        dots:false,
        loop:true,
        mouseDrag:true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    /************** Home3 Slide *************/
    $(".home_tslide").owlCarousel({
        margin:1,
        nav:true,
        dots:false,
        loop:true,
        mouseDrag:false,
        autoplay:true,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});
/************** Scroll Up *************/
$(window).on("scroll", function(){
  if ($(this).scrollTop() > 800) {
    $(".scrollup").fadeIn();
  } else {
    $(".scrollup").fadeOut();
  }
}); 
/**********Tooltip*********/
$(function () {
  $("[data-toggle='tooltip']").tooltip()
});

$(".count").each(function () {
   $(this).prop('Counter',0).animate({
       Counter: $(this).text()
   }, {
       duration: 3000,
       easing: 'swing',
       step: function (now) {
           $(this).text(Math.ceil(now));
       }
   });
});
/********** Loader *********/
function loader() {
     setTimeout(showPage, 2000);
}
function showPage() {
  document.getElementById("load").style.display = "none";
  document.getElementById("loader").style.display = "none";
  document.getElementById("main_div").style.display = "block";
}
/********** /Loader *********/







