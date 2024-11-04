/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import repositories
 */
import { saveTipePenjualaAPI } from '../repositories/repositories.js';

/**
 * defined class
 */
const tipePenjualanModal = new ModalInput();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);

/**
 * modal add tipe penjualan handler
 */
const addTipePenjualanHandler = () => {
  addButton.on('click', () => {
    tipePenjualanModal.modalAddHandler(saveTipePenjualaAPI());
  });
};

/**
 * initialize
 */
const init = () => {
  addTipePenjualanHandler();
};

export { init };
