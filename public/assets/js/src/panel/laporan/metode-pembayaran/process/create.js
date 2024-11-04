/**
 * import repositories
 */
import { exportMetodePembayaranAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined component
 */
const exportButton = $(`#${attributeName()[0]['exportButton']}`);

/**
 * export handler
 */
const exportMetodePembayaranHandler = () => {
  exportButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportMetodePembayaranAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportMetodePembayaranHandler();
};

export { init };
