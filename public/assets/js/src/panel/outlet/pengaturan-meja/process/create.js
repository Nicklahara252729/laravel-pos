/**
 * import repositories
 */
import {
  exportLaporanVoidAPI,
  saveGrupMejaAPI,
  aturGrupMejaAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalAturMeja } from '../components/modal/atur-meja.js';

/**
 * defined class
 */
const tambahMejaModa = new ModalInput();
const aturMejaModal = new ModalAturMeja();

/**
 * defined component
 */
const exportButton = $(`#${attributeName()[0]['exportButton']}`);
const addButton = $(`#${attributeName()[0]['addButton']}`);
const viewTableButton = $(`#${attributeName()[0]['viewTableButton']}`);

/**
 * export handler
 */
const exportHandler = () => {
  exportButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportLaporanVoidAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * add input modal handler
 */
const addTambahMejaHandler = () => {
  addButton.on('click', async () => {
    const url = saveGrupMejaAPI();
    tambahMejaModa.modalAddHandler(url);
  });
};

/**
 * atur meja input modal handler
 */
const aturMejaHandler = () => {
  viewTableButton.on('click', async () => {
    const url = aturGrupMejaAPI();
    aturMejaModal.modalAddHandler(url);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportHandler();
  addTambahMejaHandler();
  aturMejaHandler();
};

export { init };
