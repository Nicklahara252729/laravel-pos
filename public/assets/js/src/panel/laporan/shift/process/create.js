/**
 * import repositories
 */
import { exportShiftAPI } from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined compoentn
 */
const divExport = $(`#${attributeName()[0]['divExport']}`);
const exportButton = $(`#${attributeName()[0]['exportButton']}`);

/**
 * export handler
 */
const exportRingkasanLaporanHandler = () => {
  divExport.on('click', exportButton.selector, function (event) {
    const jenisExport = $(this).data('export');
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportShiftAPI(uuidOutlet, jenisExport);
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
