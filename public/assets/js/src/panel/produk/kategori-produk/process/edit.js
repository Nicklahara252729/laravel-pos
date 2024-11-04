/**
 * import repositories
 */
import { updateKategoriProdukAPI, getKategoriProdukByIdAPI } from '../repositories/repositories.js';

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
const kategoriModal = new ModalInput();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);

/**
 * edit data handler
 */
const editKategoriProdukHandler = () => {
  table.on('click', editButton.selector, async function () {
    const uuidKategori = $(this).data('uuid');
    const param = {
      url: updateKategoriProdukAPI(uuidKategori),
      data: await getKategoriProdukByIdAPI(uuidKategori),
    };
    kategoriModal.modalEditHandler(param);
  });
};

/**
 * initalize
 */
const init = async () => {
  editKategoriProdukHandler();
};

export { init };
