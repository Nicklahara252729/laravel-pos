/**
 * import repositories
 */
import { updateHakAksesAPI, getHakAksesByIdAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import compoentn modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * defined class
 */
const hakAksesModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data handler
 */
const editHakAkseHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuidAccess = $(this).data('uuid');
    const param = {
      url: updateHakAksesAPI(uuidAccess),
      data: await getHakAksesByIdAPI(uuidAccess),
    };
    hakAksesModal.modalEditHandler(param);
  });
};

/**
 * initialize event listener
 */
const init = () => {
  editHakAkseHandler();
};

export { init };
