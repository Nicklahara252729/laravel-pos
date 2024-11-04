/**
 * import repositories
 */
import { exportResepAPI, importResepAPI, saveResepAPI } from '../repositories/repositories.js';
import { getDaftarProdukAPI } from '../../../produk/daftar-produk/repositories/repositories.js';
import { getDaftarBahanAPI } from '../../daftar-bahan/repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalImport } from '../components/modal/import.js';
import { ModalInput } from '../components/modal/input.js';
import { ModalBahan } from '../components/modal/bahan.js';

/**
 * defined class
 */
const importModal = new ModalImport();
const resepModal = new ModalInput();
const bahanModal = new ModalBahan();

/**
 * defined component
 */
const importExportButton = $(`#${attributeName()[0]['importExportButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const addButton = $(`#${attributeName()[0]['addButton']}`);
const bahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
const bahanButton = $(`#${attributeName()[0]['bahanButton']}`);

/**
 * import export handler
 */
const importExportResepHandler = () => {
  importExportButton.on('click', `a`, function (event) {
    const action = $(this).data('action');
    if (action === 'export') {
      const uuidOutlet = getDefaultOutletUuid();
      const exportProcess = exportResepAPI(uuidOutlet);
      window.open(exportProcess, '_blank');
    } else {
      setDropify(dropify.selector);
      importModal.modalImportHandler(importResepAPI());
    }
  });
};

/**
 * add resep modal handler
 */
const addResepHandler = () => {
  addButton.on('click', async () => {
    bahanContainer.toggle(false);
    bahanContainer.empty();

    const param = {
      dataProduk: await getDaftarProdukAPI(urlDaftarProduk(1)),
      dataVariant: await getDaftarProdukAPI(urlDaftarProduk(1)),
      urlSave: saveResepAPI(),
    };
    resepModal.modalAddHandler(param);
  });
};

/**
 * bahan modal handler
 */
const bahanHandler = () => {
  bahanButton.on('click', async () => {
    const data = await getDaftarBahanAPI(urlDaftarBahan(1));
    bahanModal.modalBahanHandler(data);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  importExportResepHandler();
  addResepHandler();
  bahanHandler();
};

export { init };
