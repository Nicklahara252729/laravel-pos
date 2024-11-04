/**
 * import repositories
 */
import { updatePajakProdukAPI, getPajakProdukByIdAPI } from '../repositories/repositories.js';

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
 * defind component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data pajak produk handler
 */
const editPajakProdukHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuidTax = $(this).data('uuid');
    const param = {
      url: updatePajakProdukAPI(uuidTax),
      data: await getPajakProdukByIdAPI(uuidTax),
    };
    pajakProdukModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editPajakProdukHandler();
};

export { init };
