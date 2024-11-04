/**
 * import component table
 */
import { tableElement } from '../components/table/table.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getShiftAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const tableIdName = attributeName()[0]['table'];

/**
 * get data
 */
const renderShift = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlShift(dateRange);
  $(`#${tableIdName} tbody`).empty();
  const data = await getShiftAPI(url);

  /**
   * tabel item
   */
  const dataList = typeof data == 'undefined' ? [] : data;
  const table = dataList
    .map((tableItems) => {
      return tableElement(tableItems);
    })
    .join('');
  $(`#${tableIdName}`).append(table);
};

/**
 * initialize
 */
const init = async () => {
  await renderShift();
};

export { init };
