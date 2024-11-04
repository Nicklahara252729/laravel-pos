/**
 * import component table
 */
import { renderItem } from '../components/table/table.js';

/**
 * import repositories
 */
import { getRingkasanLaporanAPI } from '../repositories/repositories.js';

/**
 * get data
 */
const renderRingkasanLaporan = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlRingkasanLaporan(dateRange);
  const data = await getRingkasanLaporanAPI(url);
  renderItem(data);
};

/**
 * initialize
 */
const init = async () => {
  await renderRingkasanLaporan();
};

export { init };
