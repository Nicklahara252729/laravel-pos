/**
 * import repositories
 */
import { savePajakProdukAPI } from '../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const pajakProdukModal = new ModalInput();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);

/**
 * modal add pajak produk handler
 */
const addPajakProdukHandler = () => {
  addButton.on('click', () => {
    pajakProdukModal.modalAddHandler(savePajakProdukAPI());
  });
};

/**
 * initialize
 */
const init = () => {
  addPajakProdukHandler();
};

export { init };
