/*global $,owl,Placeholdem,WOW,smoothScroll,wrap_pop,niceScroll,alert*/
$(document).ready(function () {
    "use strict";

    // For active wow.js
    new WOW().init();

    // Trigger placeholdem.js
    Placeholdem(document.querySelectorAll('[placeholder]'));

    // Scroll Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $(".toTop").css("right", "20px");
        } else {
            $(".toTop").css("right", "-60px");
        }
    });

    $(".toTop").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    //customize the header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 387) {
            $('.navigation-menu').addClass('sticky');
        } else {
            $('.navigation-menu').removeClass('sticky');
        }
    });

    // for loading screen
    $(window).load(function () {
        $("body").css('overflow-y', 'auto');
        $('.wrap').slideUp(1000);
    });

    //for show advanced search
    $('.show-advanced').on("click", function () {
        $('.form-advanced').stop();
        $('.form-advanced').slideToggle(200);
    });


    //for Login area
    $('.show-login').on("click", function () {
        $('.login-area,.signup-area').stop();
        $('.login-area,.signup-area').slideToggle(400);

    });

    $('#ko').click(function () {
        if ($('.price-free').prop("checked") === true) {
            $('.price-from,.price-to').prop('disabled', true).css("background", "#c4c4c4");
        } else if ($('.price-free').prop("checked") === false) {
            $('.price-from,.price-to').removeAttr('disabled');
        }
    });


    //for categories area
    $('.show-cat').on("click", function () {
        $('.hidden-cat').stop();
        $('.hidden-cat').slideToggle(400);
    });

    //for user-search
    $('.show-user_search').on("click", function () {
        $('.user-search').stop();
        $('.user-search').slideToggle(400);
    });

    //for show-cv
    $('.show-cv').on("click", function () {
        $('.cv-container').stop();
        $('.cv-container').slideToggle(400);
    });

    //for Add certificate
    $('.add-cert').on("click", function () {
        $('.course-cert').stop();
        $('.course-cert').slideToggle(400);
    });

    //for Add Lecture
    $('.add-course').on("click", function () {
        $('.add_lecture').stop();
        $('.add_lecture').slideToggle(400);
    });

    //for Add Lecture
    $('.add-interest a').on("click", function () {
        $('.interest-cont').stop();
        $('.interest-cont').slideToggle(400);
    });

    //for user-edit
    $('#show-edit').on("click", function () {
        $('.Edit').stop();
        $('.Edit').slideToggle(400);
        if ($('#show-edit h5').hasClass('fa-spin')) {
            $('#show-edit h5').removeClass('fa-spin');
        } else {
            $('#show-edit h5').addClass('fa-spin');
        }
    });

    // show edit user 
    var panel = $('.left_tap-box'),
        panel1 = $('.right_tap-box');
    $('.toggle-slidenav').click(function (event) {
        if (panel.hasClass('col-md-12')) {
            panel1.animate({
                right: "0px"
            }, 100, function () {
                panel.removeClass('col-md-12').addClass('col-md-9');
                $('.toggle-slidenav i').removeClass('fa-bars').addClass('fa-close');
                $('.card').removeClass('col-md-4').addClass('col-md-6');

            });
        } else {
            panel1.animate({
                right: "-329px"
            }, 100, function () {
                panel.addClass('col-md-12').removeClass('col-md-9');
                $('.toggle-slidenav i').removeClass('fa-close').addClass('fa-bars');
                $('.card').removeClass('col-md-6').addClass('col-md-4');
            });
        }
        event.stopPropagation();

    });

    // customer-slider
    $(".cust-slider").owlCarousel({
        navigation: false,
        slideSpeed: 500,
        singleItem: true,
        responsive: true,
        autoPlay: true,
        mouseDrag: true,
        pagination: true
    });

    // testominal-slider
    $(".testo-slider").owlCarousel({
        navigation: false,
        slideSpeed: 500,
        singleItem: true,
        responsive: true,
        autoPlay: false,
        mouseDrag: true,
        pagination: true
    });

    //for tooltip
    $('[data-toggle="tooltip"]').tooltip();


    // Message for all
    $(".sent-all").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#msg-all").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });


    //Add alert to all students
    $(".add-alert-form").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#alert-all").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });

    $(".know-teacher").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#instructor").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });

    $(".show-privacy").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#teacher-modal").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });

    $(".show-credit").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#payment").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });

    $(".forget").click(function () {
        $(".panel-pop").animate({
            "top": "-100%"
        }, 10).hide();
        $("#forget").show().animate({
            "top": "10%"
        }, 500);
        $("body").prepend("<div class='big-overlay'></div>");
        wrap_pop();
        return false;
    });

    function wrap_pop() {
        $(".big-overlay").click(function () {
            $(".panel-pop").animate({
                "top": "-100%"
            }, 500).hide(function () {
                $(this).animate({
                    "top": "-100%"
                }, 500);
            });
            $(this).remove();
        });
    }

    // Hide Allert
    //$('.error-detect').delay(5000).slideUp(500);


    // show Textinput to edit user setting
    $('.edit-personal').on("click", function () {
        var span_data = $('.home_data-item span');
        span_data.fadeOut();
        $('.all-set input,.home_data-item select').fadeIn();
        $('.all-pass input').fadeOut();
        $('.left-caption').css("opacity", "1");
        $('.imgcontent').css("display", "block");
        $('.confirm-set').fadeIn();
        $('.cancel-personal').css("display", "block");
        $(this).css("display", "none");
    });

    // show Textinput to edit user setting
    $('.cancel-personal').on("click", function () {
        var span_data = $('.home-content .home_data-item span');
        span_data.fadeIn();
        $('.all-set input,.all-pass input,.home_data-item select').fadeOut();
        $('.left-caption').css("opacity", "0");
        $('.imgcontent').css("display", "none");
        $('.confirm-set').fadeOut();
        $(this).css("display", "none");
        $('.edit-personal').css("display", "block");
    });

    // For Nicescrool library
    $(".st-menu ul").niceScroll({
        cursorcolor: '#6a6a6a',
        cursorborderradius: '0px',
        autohidemode: false,
        cursorborder: '0bx',
        scrollspeed: 80
    });

    $('#up-video').click(function () {
        if ($(this).prop("checked") === true) {
            $('.videoUploaded').stop();
            $('.videoUploaded').slideDown();
            $('.linked').fadeOut();
        } else if ($(this).prop("checked") === false) {
            $('.videoUploaded').stop();
            $('.videoUploaded').slideUp();
            $('.linked').fadeIn();
        }
    });

    //activate tooltip on tabs item 
    $('[data-toggle="tab"]').tooltip({
        trigger: 'hover',
        placement: 'top',
        animate: true,
        delay: 50,
        container: 'body'
    });


    //hide left slide nav
    $('.close-nav').on('click', function () {
        $('.st-container').removeClass('st-menu-open');
    });


    // For transforming via url to tabs items
    var hash = window.location.hash.split('#')[1];
    $('.nav-tabs li a[href="#' + hash + '"]').tab('show');

    $('.add-fav').on('click', function () {
        $(this).css('background', '#fff');
        $('.add-fav i').css({
            color: '#EA210C',
            transform: 'scale(1.4)',
            opacity: '1'
        });
    });

    $('.add-fav-dis').on('click', function () {
        $(this).css('background', '#EA210C');
        $('.add-fav-dis i').css({
            color: '#fff',
            transform: 'scale(1)',
            opacity: '1'
        });
    });

});





// Rating Section 


(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });

});


setTimeout(function() {
    $('#flash-message').fadeOut('fast');
}, 5000); // <-- time in milliseconds