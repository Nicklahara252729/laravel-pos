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
const tableBody = $(`#${attributeName()[0]['tableHpp']} tbody`);

/**
 * create hpp form table
 */
const renderHppTable = (datas) => {
  tableBody.empty();
  if (datas && datas.length > 0) {
    datas.forEach(function (stock) {
      const avgPrice = formatCurrency(stock.average_price);

      const rowHtml = `
            <tr>
              <td>${stock.name}</td>
              <td class="text-right">${avgPrice}</td>
            </tr>
          `;
      tableBody.append(rowHtml);
    });
  }
};

export { renderHppTable };
