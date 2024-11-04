/**
 * import repositories
 */
import { saveDataGratuityAPI } from '../repositories/repositories.js';

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
const gratuityModal = new ModalInput();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);

/**
 * modal add gratuity handler
 */
const addGratuityHandler = () => {
  addButton.on('click', () => {
    gratuityModal.modalAddHandler(saveDataGratuityAPI());
  });
};

/**
 * initialize
 */
const init = () => {
  addGratuityHandler();
};

export { init };
