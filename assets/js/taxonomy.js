document.addEventListener('DOMContentLoaded', () => {
  // Variáveis
  const cmcMoreProducts = document.getElementById('cmcMoreProducts');
  const cmcSearch = document.getElementById('cmcSearch');
  const cmcOffset = document.getElementById('cmcOffset');
  const cmcPostType = document.getElementById('cmcPostType');
  const cmcTaxonomy = document.getElementById('cmcTaxonomy');
  const cmcTerm = document.getElementById('cmcTerm');
  const loading = document.getElementById('loading');
  const cmcMessage = document.getElementById('cmc-message');

  // Eventos
  cmcPostType.addEventListener('change', () => {
    cmcMoreProducts.addEventListener('click', (event) => {
      event.preventDefault();
      if (cmcSearch.value === 1) {
        loading.style.display = 'block';
        fetch(ajax_object.ajax_url, {
          method: 'POST',
          body: new URLSearchParams({
            action: 'cmc_get_next_products',
            postType: cmcPostType.value,
            taxonomy: cmcTaxonomy.value,
            term: cmcTerm.value,
            offset: cmcOffset.value,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data !== 2) {
              document.querySelector('.list-products').insertAdjacentHTML('beforeend', data);
              cmcOffset.value = parseInt(cmcOffset.value, 10) + 12;
              loading.style.display = 'none';
            } else {
              cmcSearch.value = 2;
              loading.style.display = 'none';
              cmcMoreProducts.style.display = 'none';
              cmcMessage.style.display = 'block';
            }
          })
          .catch((error) => {
            console.log(error);
            loading.style.display = 'none';
            document.querySelector('.list-products')
              .insertAdjacentHTML('beforeend', 'No se han podido cargar los productos');
          });
      }
    });
  });
});
