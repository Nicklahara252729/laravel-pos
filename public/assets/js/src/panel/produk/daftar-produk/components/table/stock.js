/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const tableBody = $(`#${attributeName()[0]['tableStock']} tbody`);

/**
 * create stock form table
 */
const renderStockTable = (datas) => {
  tableBody.empty();
  if (datas && datas.length > 0) {
    datas.forEach(function (stock) {
      const currentStock = formatCurrency(stock.current_stock);
      const minimalStock = formatCurrency(stock.minimal_stock);

      const rowHtml = `
            <tr>
              <td>${stock.name}</td>
              <td class="text-right">${currentStock}</td>
              <td class="text-right">${minimalStock}</td>
            </tr>
          `;
      tableBody.append(rowHtml);
    });
  }
};

export { renderStockTable };
