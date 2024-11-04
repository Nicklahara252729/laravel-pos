/**
 * import component table
 */
import { tableElement, tableFootElement } from '../components/table/table.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getPenjualanKategoriAPI } from '../repositories/repositories.js';

/**
 * defiend component
 */
const tableIdName = attributeName()[0]['table'];

/**
 * get data
 */
const renderPenjualanKategori = async () => {
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url = urlPenjualanKategori(dateRange);
  $(`#${tableIdName} tbody`).empty();
  $(`#${tableIdName} tfoot`).empty();
  const data = await getPenjualanKategoriAPI(url);

  /**
   * tabel item
   */
  const dataList = typeof data.list == 'undefined' ? [] : data.list;
  const table = dataList
    .map((tableItems) => {
      return tableElement(tableItems);
    })
    .join('');
  $(`#${tableIdName}`).append(table);

  /**
   * table foot
   */
  const dataTotal = data.total;
  const tableFoot = tableFootElement(dataTotal);
  $(`#${tableIdName} tfoot`).append(tableFoot);
};

/**
 * initialize
 */
const init = async () => {
  await renderPenjualanKategori();
};

export { init };
