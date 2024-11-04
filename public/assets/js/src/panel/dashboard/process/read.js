/**
 * import component widget
 */
import { renderSummary } from '../components/widget/summary.js';

/**
 * import component table
 */
import { renderTable } from '../components/table/item.js';

/**
 * import repositories
 */
import { getDashbaordAPI } from '../repositories/repositories.js';

/**
 * render dashboard
 */
const renderDashboard = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlDashboard(dateRange);
  const data = await getDashbaordAPI(url);
  renderTable(data.table_data);
  renderSummary(data.widget_data);
};

/**
 * initialize
 */
const init = async () => {
  await renderDashboard();
};

export { init };
