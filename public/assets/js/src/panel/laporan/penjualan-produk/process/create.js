/**
 * import repositories
 */
import {
  exportRingkasanAPI,
  exportJumlahPerjamAPI,
  exportPerjamTerjualAPI,
} from '../repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined component
 */
const exportRingkasanButton = $(`#${attributeName()[0]['exportRingkasanButton']}`);
const exportPerjamTerjualButton = $(`#${attributeName()[0]['exportPerjamTerjualButton']}`);
const exportJumlahPerjamButton = $(`#${attributeName()[0]['exportJumlahPerjamButton']}`);

/**
 * export ringkasan penjualan barang handler
 */
const exportRingkasanHandler = () => {
  exportRingkasanButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportRingkasanAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * export laporan perjam terjual handler
 */
const exportPerjamTerjualHandler = () => {
  exportPerjamTerjualButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportPerjamTerjualAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * export jumlah yang terjual laporan peerjam handler
 */
const exportJumlahPerjamHandler = () => {
  exportJumlahPerjamButton.on('click', () => {
    const uuidOutlet = getDefaultOutletUuid();
    const exportProcess = exportJumlahPerjamAPI(uuidOutlet);
    window.open(exportProcess, '_blank');
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  exportRingkasanHandler();
  exportPerjamTerjualHandler();
  exportJumlahPerjamHandler();
};

export { init };
