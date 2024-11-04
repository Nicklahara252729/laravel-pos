/**
 * import repositories
 */
import { updateDataGratuityAPI, getGratuityByIdAPI } from '../repositories/repositories.js';

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
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data gratuity handler
 */
const editGratuityHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuidGratuity = $(this).data('uuid');
    const param = {
      url: updateDataGratuityAPI(uuidGratuity),
      data: await getGratuityByIdAPI(uuidGratuity),
    };
    gratuityModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editGratuityHandler();
};

export { init };
