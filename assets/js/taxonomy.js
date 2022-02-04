(function (window) {
  if (document.querySelectorAll('.product-img').length > 0) {
    set_image(document.querySelectorAll('.product-img')[0]);
  }

  const ZOOMFACTOR = '250%';

  function set_image(image) {
    image.classList.add('product-img-zoom');
    image.style.backgroundImage =
      'url(' + image.getAttribute('data-image') + ')';
    image.style.backgroundSize = 'contain';
    image.style.backgroundPosition = 'center';
    image.style.backgroundRepeat = 'no-repeat';
    image.style.cursor = 'zoom-in';
  }

  function init() {
    let Zoom = {};

    Zoom.init = function (config) {
      elID = config.elementID;
      ZOOMFACTOR = config.zoomFactor || '250%';

      let container = elID !== '' ? document.getElementById(elID) : document;
      let focusImgs = container.querySelectorAll('.product-img-zoom');

      Array.from(focusImgs).forEach(function (img) {
        img.addEventListener(
          'mouseenter',
          function (e) {
            this.style.backgroundSize = ZOOMFACTOR; // Not even a lexical 'this' :(
          },
          false
        );

        img.addEventListener(
          'mousemove',
          function (e) {
            let imgDimensions = this.getBoundingClientRect();

            let x = e.clientX - imgDimensions.left;
            let y = e.clientY - imgDimensions.top;

            let percentX = Math.round(100 / (imgDimensions.width / x));
            let percentY = Math.round(100 / (imgDimensions.height / y));

            this.style.backgroundPosition = percentX + '% ' + percentY + '%';
          },
          false
        );

        img.addEventListener(
          'mouseleave',
          function (e) {
            this.style.backgroundPosition = 'center';
            this.style.backgroundSize = 'contain';
          },
          false
        );
      });
    };
    return Zoom;
  }

  if (typeof Zoom === 'undefined') window.Zoom = init();
  else console.log('focus.js has been initialized already.');
})(window);

Zoom.init({
  elementID: '',
  zoomFactor: '200%'
});
const goToContent = (term) => {
  const content = document.querySelector('.product-content');
  const elements = content.getElementsByTagName('h2');
  elements.forEach((element) => {
    const text = element.textContent;
    if (text.indexOf(term) > -1) {
      window.scrollTo(0, element.offsetTop - 120); // 120px from header fixed
    }
  });
};
goToContent();
