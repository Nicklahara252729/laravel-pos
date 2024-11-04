/**
 * import repositories
 */
import { updatePromoProdukAPI, getPromoProdukByIdAPI } from '../repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defiend class
 */
const promoProduk = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data promo produk handler
 */
const editPromoProdukHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = { url: updatePromoProdukAPI(uuid), data: await getPromoProdukByIdAPI(uuid) };
    promoProduk.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editPromoProdukHandler();
};

export { init };
