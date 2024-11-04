/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableRowElement = (rowData) => {
  const { item, qty, satuan } = rowData;
  return `
    <tr class="transaction-row bg-white duration-150 cursor-pointer hover:bg-gray-200 rounded-lg">
        <td class="p-3">${item}</td>
        <td class="p-3">${satuan}</td> 
        <td class="p-3">${formatCurrency(qty)}</td>
    </tr>
    `;
};

export { tableRowElement };
