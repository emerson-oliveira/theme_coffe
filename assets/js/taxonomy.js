(function (window) {
  function setImage(image) {
    image.classList.add('product-img-zoom');
    image.style.backgroundImage = `url(${image.getAttribute('data-image')})`;
    image.style.backgroundSize = 'contain';
    image.style.backgroundPosition = 'center';
    image.style.backgroundRepeat = 'no-repeat';
    image.style.cursor = 'zoom-in';
  }

  if (document.querySelectorAll('.product-img').length > 0) {
    setImage(document.querySelectorAll('.product-img')[0]);
  }

  let ZOOMFACTOR = '250%';

  function init() {
    const Zoom = {};

    Zoom.init = function (config) {
      const elID = config.elementID;
      ZOOMFACTOR = config.zoomFactor || '250%';

      const container = elID !== '' ? document.getElementById(elID) : document;
      const focusImgs = container.querySelectorAll('.product-img-zoom');

      Array.from(focusImgs).forEach((img) => {
        img.addEventListener(
          'mouseenter',
          function () {
            this.style.backgroundSize = ZOOMFACTOR; // Not even a lexical 'this' :(
          },
          false,
        );

        img.addEventListener(
          'mousemove',
          function (e) {
            const imgDimensions = this.getBoundingClientRect();

            const x = e.clientX - imgDimensions.left;
            const y = e.clientY - imgDimensions.top;

            const percentX = Math.round(100 / (imgDimensions.width / x));
            const percentY = Math.round(100 / (imgDimensions.height / y));

            this.style.backgroundPosition = `${percentX}% ${percentY}%`;
          },
          false,
        );

        img.addEventListener(
          'mouseleave',
          function () {
            this.style.backgroundPosition = 'center';
            this.style.backgroundSize = 'contain';
          },
          false,
        );
      });
    };
    return Zoom;
  }

  if (typeof Zoom === 'undefined') window.Zoom = init();
  else console.log('focus.js has been initialized already.');
}(window));

Zoom.init({
  elementID: '',
  zoomFactor: '200%',
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
