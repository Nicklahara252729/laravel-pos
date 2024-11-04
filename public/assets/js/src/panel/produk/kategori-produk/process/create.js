/**
 * impor repositories
 */
import { saveKategoriProdukAPI, saveAssignItemAPI } from '../repositories/repositories.js';
import { getDaftarProdukByKategoriAPI } from '../../daftar-produk/repositories/repositories.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAssignItem } from '../components/modal/assign-item.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const kategoriModal = new ModalInput();
const assignItemModal = new ModalAssignItem();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const table = $(`#${attributeName()[0]['table']}`);
const assignItemButton = $(`.${attributeName()[0]['assignItemButton']}`);

/**
 * modal add category handler
 */
const addKategoriProdukHandler = () => {
  addButton.on('click', () => {
    kategoriModal.modalAddHandler(saveKategoriProdukAPI());
  });
};

/**
 * render item assign handler
 */
const itemAssignHandler = () => {
  table.on('click', assignItemButton.selector, async function () {
    const uuid = $(this).data('uuid');
    const param = {
      url: saveAssignItemAPI(uuid),
      produkList: await getDaftarProdukByKategoriAPI(uuid),
    };
    assignItemModal.openModalHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  addKategoriProdukHandler();
  itemAssignHandler();
};

export { init };
