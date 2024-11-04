/**
 * import repositories
 */
import { exportPajakAPI } from '../repositories/repositories.js';

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
const exportPajakHandler = () => {
  exportButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportPajakAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportPajakHandler();
};

export { init };
