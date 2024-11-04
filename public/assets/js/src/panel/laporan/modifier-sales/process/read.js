/**
 * import component table
 */
import { modifierSalesTableElement, modifierSalesFootElement } from '../components/table/table.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getModifierSalesAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * get data
 */
const renderModifierSales = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlModifierSales(dateRange);
  $(`${table.selector} tbody`).empty();
  $(`${table.selector} tfoot`).empty();
  const data = await getModifierSalesAPI(url);

  /**
   * table row
   */
  const dataList = typeof data.list == 'undefined' ? [] : data.list;
  const dataArray = Object.entries(dataList);
  const tableElement = dataArray
    .map(([modifierSales, modifierSalesItems]) => {
      return modifierSalesTableElement({ [modifierSales]: modifierSalesItems });
    })
    .join('');
  $(`${table.selector}`).append(tableElement);

  /**
   * table foot item
   */
  const dataTotal = data.total;
  const tableFoot = modifierSalesFootElement(dataTotal);
  $(`${table.selector} tfoot`).append(tableFoot);
};

/**
 * initialize
 */
const init = async () => {
  await renderModifierSales();
};

export { init };
