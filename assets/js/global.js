
(function(o){var t={url:!1,callback:!1,target:!1,duration:120,on:"mouseover",touch:!0,onZoomIn:!1,onZoomOut:!1,magnify:1};o.zoom=function(t,n,e,i){var u,c,r,a,m,l,s,f=o(t),h=f.css("position"),d=o(n);return t.style.position=/(absolute|fixed)/.test(h)?h:"relative",t.style.overflow="hidden",e.style.width=e.style.height="",o(e).addClass("zoomImg").css({position:"absolute",top:0,left:0,opacity:0,width:e.width*i,height:e.height*i,border:"none",maxWidth:"none",maxHeight:"none"}).appendTo(t),{init:function(){c=f.outerWidth(),u=f.outerHeight(),n===t?(a=c,r=u):(a=d.outerWidth(),r=d.outerHeight()),m=(e.width-c)/a,l=(e.height-u)/r,s=d.offset()},move:function(o){var t=o.pageX-s.left,n=o.pageY-s.top;n=Math.max(Math.min(n,r),0),t=Math.max(Math.min(t,a),0),e.style.left=t*-m+"px",e.style.top=n*-l+"px"}}},o.fn.zoom=function(n){return this.each(function(){var e=o.extend({},t,n||{}),i=e.target&&o(e.target)[0]||this,u=this,c=o(u),r=document.createElement("img"),a=o(r),m="mousemove.zoom",l=!1,s=!1;if(!e.url){var f=u.querySelector("img");if(f&&(e.url=f.getAttribute("data-src")||f.currentSrc||f.src),!e.url)return}c.one("zoom.destroy",function(o,t){c.off(".zoom"),i.style.position=o,i.style.overflow=t,r.onload=null,a.remove()}.bind(this,i.style.position,i.style.overflow)),r.onload=function(){function t(t){f.init(),f.move(t),a.stop().fadeTo(o.support.opacity?e.duration:0,1,o.isFunction(e.onZoomIn)?e.onZoomIn.call(r):!1)}function n(){a.stop().fadeTo(e.duration,0,o.isFunction(e.onZoomOut)?e.onZoomOut.call(r):!1)}var f=o.zoom(i,u,r,e.magnify);"grab"===e.on?c.on("mousedown.zoom",function(e){1===e.which&&(o(document).one("mouseup.zoom",function(){n(),o(document).off(m,f.move)}),t(e),o(document).on(m,f.move),e.preventDefault())}):"click"===e.on?c.on("click.zoom",function(e){return l?void 0:(l=!0,t(e),o(document).on(m,f.move),o(document).one("click.zoom",function(){n(),l=!1,o(document).off(m,f.move)}),!1)}):"toggle"===e.on?c.on("click.zoom",function(o){l?n():t(o),l=!l}):"mouseover"===e.on&&(f.init(),c.on("mouseenter.zoom",t).on("mouseleave.zoom",n).on(m,f.move)),e.touch&&c.on("touchstart.zoom",function(o){o.preventDefault(),s?(s=!1,n()):(s=!0,t(o.originalEvent.touches[0]||o.originalEvent.changedTouches[0]))}).on("touchmove.zoom",function(o){o.preventDefault(),f.move(o.originalEvent.touches[0]||o.originalEvent.changedTouches[0])}).on("touchend.zoom",function(o){o.preventDefault(),s&&(s=!1,n())}),o.isFunction(e.callback)&&e.callback.call(r)},r.setAttribute("role","presentation"),r.src=e.url})},o.fn.zoom.defaults=t})(window.jQuery);

jQuery('.product-img').zoom();



/* Cookies */

jQuery(document).ready(function($) {

  jQuery('#cmc-cookies').on('click', function(event) {

    event.preventDefault();

    $.ajax({

      method: "POST",

      url: ajax_object.ajax_url,

      data: {'action': 'cmc_accept_cookies'},

      success: function(result) {

      	jQuery('.cookies').css('display', 'none');

      },

      error: function(result) {

      }

    })

  });

});



jQuery(document).ready(function($) {

    $.ajax({

      method: "POST",

      url: ajax_object.ajax_url,

      data: {'action': 'cmc_check_cookies'},

      success: function(result) {

      	if(result != 'accepted')

      		jQuery('.cookies').css('display', 'block');

      },

      error: function(result) {

      }

    })

});


/* Ancla */

jQuery('.product-menu-menu button').click(function(e){
	e.preventDefault();
	var strAncla = jQuery(this).attr('href');

	if(strAncla == 'Conclusiones') {
		jQuery('body,html').stop(true,true).animate({
			scrollTop: jQuery("h2").last().offset().top
		},1000);
	}
	else {
		jQuery('body,html').stop(true,true).animate({
			scrollTop: jQuery("h2:contains('" + strAncla + "')").offset().top
		},1000);
	}
});

/*jQuery('.product-menu-menu a').click(function(e){
  e.preventDefault();
  var strAncla=jQuery(this).attr('href');
  jQuery('body,html').stop(true,true).animate({
    scrollTop: jQuery(strAncla).offset().top
  },1000);
});*/

/* Table Sort */

jQuery.fn.sortElements = (function(){

    var sort = [].sort;

    return function(comparator, getSortable) {

        getSortable = getSortable || function(){return this;};

        var placements = this.map(function(){

            var sortElement = getSortable.call(this),

                parentNode = sortElement.parentNode,

                nextSibling = parentNode.insertBefore(

                    document.createTextNode(''),

                    sortElement.nextSibling

                );

            return function() {

                if (parentNode === this) {

                    throw new Error(

                        "No se ha podido ordenar la columna."

                    );

                }

                parentNode.insertBefore(this, nextSibling);

                parentNode.removeChild(nextSibling);

            };

        });

        return sort.call(this, comparator).each(function(i){

            placements[i].call(getSortable.call(this));

        });

    };

})();



var table = jQuery('.comparative-box table');

jQuery('.orderly')

    .wrapInner('<span title="sort this column"/>')

    .each(function(){

        var th = jQuery(this),

            thIndex = th.index(),

            inverse = false;



        th.click(function(){

            table.find('td').filter(function(){

                return jQuery(this).index() === thIndex;

            }).sortElements(function(a, b){

                if( jQuery.text([a]) == jQuery.text([b]) )

                    return 0;

                return jQuery.text([a]) > jQuery.text([b]) ?

                    inverse ? -1 : 1

                    : inverse ? 1 : -1;

            }, function(){

                return this.parentNode; 

            });

            inverse = !inverse;

        });

    });



/* Carousel */

var carouselPosition = 0;

var carouselProductWidth = jQuery('.carousel .carousel-product').outerWidth();

var carouselDataWidth = (carouselProductWidth * jQuery('.carousel .carousel-product').length) + (jQuery('.carousel .carousel-product').length * 8);

jQuery(document).ready(function($) {

  jQuery('.carousel-data').width(carouselDataWidth + 'px');

  //console.log(carouselDataWidth + 'px');



  jQuery('.carousel .carousel-next').click(function(){

    if(carouselPosition + carouselDataWidth >= jQuery('.carousel').outerWidth())

    	carouselPosition -= carouselProductWidth;

    jQuery('.carousel-data').css({'transform':'translateX(' + carouselPosition + 'px)'});

	//console.log(carouselPosition + ' ' + carouselDataWidth + ' ' + jQuery('.carousel').outerWidth());

  });



  jQuery('.carousel .carousel-prev').click(function(){

    if(carouselPosition + carouselProductWidth <= 0)

    	carouselPosition += carouselProductWidth;

    jQuery('.carousel-data').css({'transform':'translateX(' + carouselPosition + 'px)'});

	//console.log(carouselPosition);

  });

});



jQuery(window).on('resize', function(){

	carouselPosition = 0;

	carouselProductWidth = jQuery('.carousel .carousel-product').outerWidth();

	carouselDataWidth = (carouselProductWidth * jQuery('.carousel .carousel-product').length) + (jQuery('.carousel .carousel-product').length * 8);

});