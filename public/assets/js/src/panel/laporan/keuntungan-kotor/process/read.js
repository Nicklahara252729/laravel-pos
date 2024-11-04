/**
 * import component table
 */
import { renderItem } from '../components/table/table.js';

/**
 * import repositories
 */
import { getKeutunganKotorAPI } from '../repositories/repositories.js';

/**
 * get data
 */
const renderKeuntunganKotor = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlKeuntunganKotor(dateRange);
  const data = await getKeutunganKotorAPI(url);
  renderItem(data);
};

/**
 * initialize
 */
const init = async () => {
  await renderKeuntunganKotor();
};

export { init };
