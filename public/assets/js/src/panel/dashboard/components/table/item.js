/**
 * import helper
 */
import { formatCurrency } from '../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']} tbody`);

/**
 * render table
 */
const renderTable = (tableData) => {
  const tableRows = tableData
    .map((item) => {
      const { number, product_name, category, sold_quantity, price } = item;
      return `
        <tr>
          <td>${number}</td>
          <td>${product_name}</td>
          <td>${category}</td>
          <td>${formatCurrency(sold_quantity)}</td>
          <td>Rp. ${formatCurrency(price)}</td>
        </tr>
      `;
    })
    .join('');

  table.empty();
  table.append(tableRows);
};

export { renderTable };
