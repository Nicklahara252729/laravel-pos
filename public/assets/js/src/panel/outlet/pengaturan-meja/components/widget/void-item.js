/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined componet
 */
const modalVoidItem = $(`#${attributeName()[0]['modalVoidItem']}`);

/**
 * row item
 */
const widgetTotalElement = (datas) => {
  $(`${modalVoidItem.selector} .total-harga h5`).text(`Rp ${formatCurrency(datas.total_price)}`);
  $(`${modalVoidItem.selector} .product-cancel h5`).text(formatCurrency(datas.product_cancel));
};

export { widgetTotalElement };
