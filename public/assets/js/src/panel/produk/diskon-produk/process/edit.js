/**
 * import repositories
 */
import { updateDiskonProdukAPI, getDiskonProdukByIdAPI } from '../repositories/repositories.js';

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
const inputModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * Event listener for opening the create modal to edit employee.
 *
 * @event click
 * @listens #open-modal
 */
const editTipePenjualanHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = { url: updateDiskonProdukAPI(uuid), data: await getDiskonProdukByIdAPI(uuid) };
    inputModal.modalEditHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  editTipePenjualanHandler();
};

export { init };
