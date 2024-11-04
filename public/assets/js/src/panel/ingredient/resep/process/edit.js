/**
 * import repositories
 */
import { updateResepAPI, getResepByIdAPI } from '../repositories/repositories.js';

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
const bahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
const tableProduk = $(`#${attributeName()[0]['tableProduk']}`);
const tableBahanSetengahJadi = $(`#${attributeName()[0]['tableBahanSetengahJadi']}`);
const editButton = $(`#${attributeName()[0]['editButton']}`);

/**
 * editing process
 */
const editProcessHandler = async (uuid) => {
  bahanContainer.toggle(false);
  bahanContainer.empty();
  const data = await getResepByIdAPI(uuid);
  const param = { url: updateResepAPI(uuid), data: data };
  inputModal.modalEditHandler(param);
};

/**
 * edit resep produk
 */
const editResepProdukHandler = () => {
  tableProduk.on('click', editButton.selector, function () {
    const uuid = $(this).data('uuid');
    editProcessHandler(uuid);
  });
};

/**
 * edit half raw handler
 */
const editResepHalfRawHandler = () => {
  tableBahanSetengahJadi.on('click', editButton.selector, function () {
    const uuid = $(this).data('uuid');
    editProcessHandler(uuid);
  });
};

/**
 * initialize
 */
const init = () => {
  editResepProdukHandler();
  editResepHalfRawHandler();
};

export { init };
