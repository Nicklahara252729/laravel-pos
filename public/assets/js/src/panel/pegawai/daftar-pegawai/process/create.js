/**
 * import repositories
 */
import {
  saveDaftarPegawaiAPI,
  importDaftarPegawaiAPI,
  exportDaftarPegawaiAPI,
} from '../repositories/repositories.js';
import { getHakAksesAPI } from '../../../hak-akses/repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalImport } from '../components/modal/import.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const daftarPegawaiModal = new ModalInput();
const importModal = new ModalImport();

/**
 * defined component
 */
const addButton = $(`#${attributeName()[0]['addButton']}`);
const passwordContainer = $(`#${attributeName()[0]['passwordContainer']}`);
const dropify = $(`.${attributeName()[0]['dropify']}`);
const passwordAddonButton = $(`#${attributeName()[0]['passwordAddonButton']}`);
const pinAddonButton = $(`#${attributeName()[0]['pinAddonButton']}`);
const importButton = $(`#${attributeName()[0]['importButton']}`);
const exportButton = $(`#${attributeName()[0]['exportButton']}`);

/**
 * Event listener for opening the create modal to add a new employee.
 *
 * @event click
 * @listens #open-modal
 */
const addEmployeeHandler = () => {
  addButton.on('click', () => {
    passwordContainer.show();
    setDropify(dropify.selector);
    const param = { url: saveDaftarPegawaiAPI(), urlHakAkses: getHakAksesAPI() };
    daftarPegawaiModal.modalAddHandler(param);
  });
};

/**
 * toogle visibility password handler
 */
const toogleVisibilityPasswordHandler = () => {
  passwordAddonButton.on('click', () => {
    daftarPegawaiModal.togglePasswordVisibility();
  });
};

/**
 * toogle pin password handler
 */
const toogleVisibilityPinHandler = () => {
  pinAddonButton.on('click', () => {
    daftarPegawaiModal.togglePinVisibility();
  });
};

/**
 * import data daftar pegawai handler
 */
const importEmployeeHandler = () => {
  importButton.on('click', () => {
    setDropify(dropify.selector);
    importModal.modalImportHandler(importDaftarPegawaiAPI());
  });
};

/**
 * export handler
 */
const exportEmployeeHandler = () => {
  exportButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportDaftarPegawaiAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  addEmployeeHandler();
  toogleVisibilityPasswordHandler();
  toogleVisibilityPinHandler();
  importEmployeeHandler();
  exportEmployeeHandler();
};

export { init };
