/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { saveDiskonProdukAPI } from '../repositories/repositories.js';

/**
 * defined class
 */
const diskonProduk = new ModalInput();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);

/**
 * modal add diskon produk handler
 */
const addDiskonProdukHandler = () => {
  addButton.on('click', () => {
    diskonProduk.modalAddHandler(saveDiskonProdukAPI());
  });
};

/**
 * initialize
 */
const init = () => {
  addDiskonProdukHandler();
};

export { init };
