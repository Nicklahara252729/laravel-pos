/**
 * import component table
 */
import { incomeTableElement, incomeFootElement } from '../components/table/income.js';
import { quantityTableElement, quantityFootElement } from '../components/table/quantity.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import repositories
 */
import { getPenjualanProdukAPI } from '../repositories/repositories.js';

/**
 * defined component
 */
const tableIncome = attributeName()[0]['tableIncome'];
const tableQuantity = attributeName()[0]['tableQuantity'];

/**
 * get data
 */
const renderPenjualanProduk = async (type) => {
  /**
   * set type to local storage
   */
  const getType = JSON.parse(localStorage.getItem('tipePenjualanProduk'));
  type = typeof type == 'undefined' ? getType : type;
  localStorage.setItem('tipePenjualanProduk', JSON.stringify(type));

  /**
   * consume api
   */
  const tableIdName = type === 'income' ? tableIncome : tableQuantity;
  $(`#${tableIdName} tbody`).empty();
  $(`#${tableIdName} tfoot`).empty();
  const checkDateRange = getDateRange();
  const dateRange = typeof checkDateRange == 'undefined' ? false : true;
  const url =
    type === 'income' ? urlIncomePenjualanProduk(dateRange) : urlQuantityPenjualanProduk(dateRange);
  const data = await getPenjualanProdukAPI(url);

  /**
   * tabel item
   */
  const dataList = typeof data.list == 'undefined' ? [] : data.list;
  const tableElement = dataList
    .map((tableItems) => {
      return type === 'income' ? incomeTableElement(tableItems) : quantityTableElement(tableItems);
    })
    .join('');
  $(`#${tableIdName}`).append(tableElement);

  /**
   * table foot
   */
  const dataTotal = data.total;
  const incomeTfoot =
    type === 'income' ? incomeFootElement(dataTotal) : quantityFootElement(dataTotal);
  $(`#${tableIdName} tfoot`).append(incomeTfoot);
};

/**
 * initialize
 */
const init = async (type) => {
  await renderPenjualanProduk(type);
};

export { init, renderPenjualanProduk };
