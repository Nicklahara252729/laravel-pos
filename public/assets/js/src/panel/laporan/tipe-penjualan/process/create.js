/**
 * import repositories
 */
import { exportTipePenjualanAPI } from '../repositories/repositories.js';

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
const exportRingkasanLaporanHandler = () => {
  exportButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportTipePenjualanAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportRingkasanLaporanHandler();
};

export { init };
