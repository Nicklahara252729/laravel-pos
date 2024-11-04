/**
 * import component table
 */
import { metodePembayaranTableElement, itemElement } from '../components/table/table.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getMetodePembayaranAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * get data
 */
const renderMetodePembayaran = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlMetodePembayaran(dateRange);
  $(`#${attributeName()[0]['table']} tbody`).empty();
  const data = await getMetodePembayaranAPI(url);

  /**
   * table row
   */
  const dataList = typeof data.list == 'undefined' ? [] : data.list;
  const dataArray = Object.entries(dataList);
  const tableElement = dataArray
    .map(([metodePembayaran, metodePembayaranItems]) => {
      if (Array.isArray(metodePembayaranItems)) {
        return metodePembayaranTableElement({ [metodePembayaran]: metodePembayaranItems });
      }
      return '';
    })
    .join('');
  table.append(tableElement);

  /**
   * table item
   */
  itemElement(data);
};

/**
 * initialize
 */
const init = async () => {
  await renderMetodePembayaran();
};

export { init };
