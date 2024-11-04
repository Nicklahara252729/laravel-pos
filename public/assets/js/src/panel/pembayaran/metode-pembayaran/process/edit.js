/**
 * import repositories
 */
import { updateMetodePembayaranAPI, getMetodePembayaranAPI } from '../repositories/repositories.js';

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
const metodePembayaranModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * edit data handler
 */
const editMetodePembayaranHandler = () => {
  table.on('click', `.${attributeName()[0]['editButton']}`, async function () {
    const uuid = $(this).data('uuid');
    const param = {
      url: updateMetodePembayaranAPI(uuid),
      data: await getMetodePembayaranByIdAPI(uuid),
      paymentList : await getMetodePembayaranAPI()
    };
    metodePembayaranModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editMetodePembayaranHandler();
};

export { init };
