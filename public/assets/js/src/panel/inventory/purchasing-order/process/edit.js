/**
 * import repositories
 */
import { updateProsesPesananAPI, getPOByIdAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { bahanHandler, updateProsesPesananHandler } from '../components/widget/modal.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAlasanPemenuhan } from '../components/modal/alasan-pemenuhan.js';

/**
 * defined class
 */
const inputModal = new ModalInput();
const alasanPemenuhanModal = new ModalAlasanPemenuhan();

/**
 * defined component
 */
const modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
const detailSuntingButton = $(`#${attributeName()[0]['detailSuntingButton']}`);
const modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
const bahanButton = $(`#${attributeName()[0]['bahanButton']}`);
const modalUpdateProsesPesanan = $(`#${attributeName()[0]['modalUpdateProsesPesanan']}`);
const submitProsesPesananButton = $(`#${attributeName()[0]['submitProsesPesananButton']}`);

/**
 * edit PO handler
 */
const editPOHandler = () => {
  modalDetail.on('click', detailSuntingButton.selector, async function () {
    const uuid = localStorage.getItem('uuidPO');
    const data = await getPOByIdAPI(uuid);
    const param = { data: data };
    inputModal.modalEditHandler(param);
  });
};

/**
 * show bahan from update data
 */
const updateBahanHandler = () => {
  modalUpdate.on('click', bahanButton.selector, function (event) {
    const action = $(this).data('action');
    const uuid = localStorage.getItem('uuidPO');
    action === 'tambah bahan' ? bahanHandler('update') : updateProsesPesananHandler(uuid);
  });
};

/**
 * alasan pemenuhan modal handler
 */
const alasanPemenuhanHandler = () => {
  modalUpdateProsesPesanan.on('click', submitProsesPesananButton.selector, async () => {
    const uuid = localStorage.getItem('uuidPO');
    const param = {
      url: updateProsesPesananAPI(uuid),
      data: await getPOByIdAPI(uuid),
    };
    alasanPemenuhanModal.modalAlasanPemenuhanHandler(param);
  });
};

/**
 * initialize
 */
const init = () => {
  editPOHandler();
  updateBahanHandler();
  alasanPemenuhanHandler();
};

export { init };
