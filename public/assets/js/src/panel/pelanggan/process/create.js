/**
 * import repositories
 */
import { importPelangganAPI, exportPelangganAPI } from '../repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalImport } from '../components/modal/import.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const importModal = new ModalImport();

/**
 * defined component
 */
const importButton = $(`#${attributeName()[0]['importButton']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const exportButton = $(`#${attributeName()[0]['exportButton']}`);

/**
 * import handler
 */
const importPelangganHandler = () => {
  importButton.on('click', () => {
    setDropify(`${dropify.selector}`);
    importModal.modalImportHandler(importPelangganAPI());
  });
};

/**
 * export handler
 */
const exportPelangganHandler = () => {
  exportButton.on('click', async () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportPelangganAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  importPelangganHandler();
  exportPelangganHandler();
};

export { init };
