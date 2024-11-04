/**
 * import component table
 */
import { tipePenjualanTableElement, itemElement } from '../components/table/table.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repoistories
 */
import { getTipePenjualanAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);

/**
 * render tipe penjualan
 */
const renderTipePenjualan = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlTipePenjualan(dateRange);
  $(`${table.selector} tbody`).empty();
  const data = await getTipePenjualanAPI(url);

  /**
   * table row render
   */
  const dataList = typeof data.list == 'undefined' ? [] : data.list;
  const tableElement = dataList
    .map((tipePenjualanItems) => {
      return tipePenjualanTableElement(tipePenjualanItems);
    })
    .join('');
  $(`${table.selector}`).append(tableElement);

  /**
   * table item render
   */
  itemElement(data);
};

/**
 * initialize
 */
const init = async () => {
  await renderTipePenjualan();
};

export { init };
