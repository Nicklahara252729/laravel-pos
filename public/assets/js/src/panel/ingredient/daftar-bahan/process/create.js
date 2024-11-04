/**
 * impor repositories
 */
import {
  saveDaftarBahanAPI,
  exportDaftarBahanAPI,
  importChangeDaftarBahanAPI,
  importReplaceDaftarBahanAPI,
  getDaftarBahanAPI,
} from '../repositories/repositories.js';

/**
 * import compnent attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalImport } from '../components/modal/import.js';
import { ModalResep } from '../components/modal/resep.js';
import { ModalBahan } from '../components/modal/bahan.js';

/**
 * defined class
 */
const modalInput = new ModalInput();
const importModal = new ModalImport();
const resepModal = new ModalResep();
const bahanModal = new ModalBahan();

/**
 * defined component
 */
const bahanButton = $(`#${attributeName()[0]['bahanButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const resepContainer = $(`#${attributeName()[0]['resepContainer']}`);
const importExportButton = $(`#${attributeName()[0]['importExportButton']}`);
const modalOpsiImport = $(`#${attributeName()[0]['modalOpsiImport']}`);
const opsiImportContainer = $(`#${attributeName()[0]['opsiImportContainer']}`);
const resepButton = $(`#${attributeName()[0]['resepButton']}`);
const resepBahanButton = $(`#${attributeName()[0]['resepBahanButton']}`);

/**
 * modal add daftar bahan handler
 */
const addDaftarBahanHandler = () => {
  bahanButton.on('click', 'a', function (event) {
    const action = $(this).data('action');
    setDropify(dropify.selector);
    const title = action === 'half raw' ? `Tambah bahan setengah jadi` : 'Tambah bahan mentah';
    const param = {
      title: title,
      url: saveDaftarBahanAPI(),
    };
    $(`${resepContainer.selector} table tbody`).empty();
    $(`${resepContainer.selector} table`).toggle(false);
    if (action === 'raw') {
      $(`${resepContainer.selector}`).toggle(false);
    } else {
      $(`${resepContainer.selector}`).toggle(true);
    }
    modalInput.modalAddHandler(param);
  });
};

/**
 * import export handler
 */
const importExportHandler = () => {
  importExportButton.on('click', `a`, function (event) {
    const action = $(this).data('action');
    if (action === 'export') {
      const uuidOutlet = getDefaultOutletUuid();
      const exportProcess = exportDaftarBahanAPI(uuidOutlet);
      window.open(exportProcess, '_blank');
    } else {
      importModal.modalOpsiHandler();
    }
  });
};

/**
 * import modal handler
 */
const importHandler = () => {
  modalOpsiImport.on('click', opsiImportContainer.selector, function (event) {
    const action = $(this).data('action');
    setDropify(dropify.selector);
    const url = action === 'replace' ? importReplaceDaftarBahanAPI() : importChangeDaftarBahanAPI();
    if (action === 'change') {
      const confirmMessage = textImportChangeConfirmation();
      swalConfirmation(
        {
          message: confirmMessage,
          title: 'import change',
        },
        () => {
          importModal.modalImportHandler(url);
        }
      );
    } else {
      importModal.modalImportHandler(url);
    }
  });
};

/**
 * resep handler
 */
const resepHandler = () => {
  resepButton.on('click', function (event) {
    resepModal.modalResepHandler();
  });
};

/**
 * resep bahan handler
 */
const resepBahanHandler = () => {
  resepBahanButton.on('click', async () => {
    const data = await getDaftarBahanAPI(urlDaftarBahan(1));
    bahanModal.modalBahanHandler(data);
  });
};

/**
 * initialize
 */
const init = () => {
  addDaftarBahanHandler();
  importExportHandler();
  importHandler();
  resepHandler();
  resepBahanHandler();
};

export { init };
