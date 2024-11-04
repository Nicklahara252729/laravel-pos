/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableElement = (listData) => {
  let tableRows = '';
  const { nama, tax_rate, amount, collected } = listData;
  tableRows += `<tr>
                  <th>${nama}</th>
                  <td class="text-center">${tax_rate}%</td>
                  <td class="text-right">Rp ${formatCurrency(amount)}</td>
                  <td class="text-right">Rp ${formatCurrency(collected)}</td>
                </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const tableFootElement = (rowData) => {
  return `<tr class="text-md font-bold text-primary">
            <th>Total</th>
            <td colspan="3" class="text-right">Rp ${formatCurrency(rowData)}</td>
        </tr>`;
};

export { tableElement, tableFootElement };
