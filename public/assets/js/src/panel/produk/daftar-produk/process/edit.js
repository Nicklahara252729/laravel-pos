/**
 * import repositories
 */
import { updateDaftarProdukAPI, getDaftarProdukByIdAPI } from '../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * defined class
 */
const daftarProdukModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * Event listener for opening the create modal to edit product.
 *
 * @event click
 * @listens #open-modal
 */
const editDaftarProdukHandler = () => {
  table.on('click', editButton.selector, async function () {
    setDropify();
    const uuidItem = $(this).data('uuid');
    const param = {
      url: updateDaftarProdukAPI(uuidItem),
      data: await getDaftarProdukByIdAPI(uuidItem),
    };
    daftarProdukModal.modalEditHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  editDaftarProdukHandler();
};

export { init };
