/**
 * import repositories
 */
import {
  exportPOAPI,
  importPOAPI,
  savePOAPI,
  riwayatPOByIdAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';
import { bahanHandler, riwayatPemenuhanHandler } from '../components/widget/modal.js';

/**
 * import component modal
 */
import { ModalImport } from '../components/modal/import.js';
import { ModalInput } from '../components/modal/input.js';

/**
 * defined class
 */
const importModal = new ModalImport();
const poModal = new ModalInput();

/**
 * defined component
 */
const importExportButton = $(`#${attributeName()[0]['importExportButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const addButton = $(`#${attributeName()[0]['addButton']}`);
const modalAdd = $(`#${attributeName()[0]['modalAdd']}`);
const bahanButton = $(`#${attributeName()[0]['bahanButton']}`);
const modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
const detailLog = $(`#${attributeName()[0]['detailLog']} ul li a`);
const updateLog = $(`#${attributeName()[0]['updateLog']} ul li a`);

/**
 * import export handler
 */
const importExportResepHandler = () => {
  importExportButton.on('click', `a`, function (event) {
    const action = $(this).data('action');
    if (action === 'export') {
      const uuidOutlet = getDefaultOutletUuid();
      const exportProcess = exportPOAPI(uuidOutlet);
      window.open(exportProcess, '_blank');
    } else {
      setDropify(dropify.selector);
      importModal.modalImportHandler(importPOAPI());
    }
  });
};

/**
 * add PO modal handler
 */
const addPoHandler = () => {
  addButton.on('click', async () => {
    const param = { url: savePOAPI(), outletName: getDefaultOutletName() };
    poModal.modalAddHandler(param);
  });
};

/**
 * show bahan from add data
 */
const addBahanHandler = () => {
  modalAdd.on('click', bahanButton.selector, () => {
    bahanHandler('add');
  });
};

/**
 * show riwayat pemenuhan from detail
 */
const riwayatPemenuhanFromDetail = () => {
  modalDetail.on('click', detailLog.selector, async function (event) {
    const uuid = $(this).data('uuid');
    const param = { data: await riwayatPOByIdAPI(uuid), modal: 'detail' };
    riwayatPemenuhanHandler(param);
  });
};

/**
 * show riwayat pemenuhan from edit
 */
const riwayatPemenuhanFromEdit = () => {
  $(`#${attributeName()[0]['modalUpdate']}`).on(
    'click',
    updateLog.selector,
    async function (event) {
      const uuid = $(this).data('uuid');
      const param = { data: await riwayatPOByIdAPI(uuid), modal: 'update' };
      riwayatPemenuhanHandler(param);
    }
  );
};

/**
 * Initializes event listener
 */
const init = () => {
  importExportResepHandler();
  addPoHandler();
  addBahanHandler();
  riwayatPemenuhanFromDetail();
  riwayatPemenuhanFromEdit();
};

export { init };
