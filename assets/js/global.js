/* Cookies */
jQuery(document).ready(($) => {
  jQuery('#cmc-cookies').on('click', (event) => {
    event.preventDefault();

    $.ajax({

      method: 'POST',

      url: ajax_object.ajax_url,

      data: { action: 'cmc_accept_cookies' },

      success(result) {
      	jQuery('.cookies').css('display', 'none');
      },

      error(result) {

      },

    });
  });
});

jQuery(document).ready(($) => {
  $.ajax({

    method: 'POST',

    url: ajax_object.ajax_url,

    data: { action: 'cmc_check_cookies' },

    success(result) {
      	if (result != 'accepted') { jQuery('.cookies').css('display', 'block'); }
    },

    error(result) {

    },

  });
});

/* Ancla */

jQuery('.product-menu-menu button').click(function (e) {
  e.preventDefault();
  const strAncla = jQuery(this).attr('href');

  if (strAncla == 'Conclusiones') {
    jQuery('body,html').stop(true, true).animate({
      scrollTop: jQuery('h2').last().offset().top,
    }, 1000);
  } else {
    jQuery('body,html').stop(true, true).animate({
      scrollTop: jQuery(`h2:contains('${strAncla}')`).offset().top,
    }, 1000);
  }
});

/* jQuery('.product-menu-menu a').click(function(e){
  e.preventDefault();
  var strAncla=jQuery(this).attr('href');
  jQuery('body,html').stop(true,true).animate({
    scrollTop: jQuery(strAncla).offset().top
  },1000);
}); */

/* Table Sort */

jQuery.fn.sortElements = (function () {
  const { sort } = [];

  return function (comparator, getSortable) {
    getSortable = getSortable || function () { return this; };

    const placements = this.map(function () {
      const sortElement = getSortable.call(this);

      const { parentNode } = sortElement;

      const nextSibling = parentNode.insertBefore(

        document.createTextNode(''),

        sortElement.nextSibling,

      );

      return function () {
        if (parentNode === this) {
          throw new Error(

            'No se ha podido ordenar la columna.',

          );
        }

        parentNode.insertBefore(this, nextSibling);

        parentNode.removeChild(nextSibling);
      };
    });

    return sort.call(this, comparator).each(function (i) {
      placements[i].call(getSortable.call(this));
    });
  };
}());

const table = jQuery('.comparative-box table');

jQuery('.orderly')

  .wrapInner('<span title="sort this column"/>')

  .each(function () {
    const th = jQuery(this);

    const thIndex = th.index();

    let inverse = false;

    th.click(() => {
      table.find('td').filter(function () {
        return jQuery(this).index() === thIndex;
      }).sortElements((a, b) => {
        if (jQuery.text([a]) == jQuery.text([b])) return 0;

        return jQuery.text([a]) > jQuery.text([b])

          ? inverse ? -1 : 1

          : inverse ? 1 : -1;
      }, function () {
        return this.parentNode;
      });

      inverse = !inverse;
    });
  });

/* Carousel */

let carouselPosition = 0;

let carouselProductWidth = jQuery('.carousel .carousel-product').outerWidth();

let carouselDataWidth = (carouselProductWidth * jQuery('.carousel .carousel-product').length) + (jQuery('.carousel .carousel-product').length * 8);

jQuery(document).ready(($) => {
  jQuery('.carousel-data').width(`${carouselDataWidth}px`);

  // console.log(carouselDataWidth + 'px');

  jQuery('.carousel .carousel-next').click(() => {
    if (carouselPosition + carouselDataWidth >= jQuery('.carousel').outerWidth()) { carouselPosition -= carouselProductWidth; }

    jQuery('.carousel-data').css({ transform: `translateX(${carouselPosition}px)` });

    // console.log(carouselPosition + ' ' + carouselDataWidth + ' ' + jQuery('.carousel').outerWidth());
  });

  jQuery('.carousel .carousel-prev').click(() => {
    if (carouselPosition + carouselProductWidth <= 0) { carouselPosition += carouselProductWidth; }

    jQuery('.carousel-data').css({ transform: `translateX(${carouselPosition}px)` });

    // console.log(carouselPosition);
  });
});

jQuery(window).on('resize', () => {
  carouselPosition = 0;

  carouselProductWidth = jQuery('.carousel .carousel-product').outerWidth();

  carouselDataWidth = (carouselProductWidth * jQuery('.carousel .carousel-product').length) + (jQuery('.carousel .carousel-product').length * 8);
});
