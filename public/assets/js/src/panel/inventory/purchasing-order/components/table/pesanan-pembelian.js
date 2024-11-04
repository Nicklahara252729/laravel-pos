/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableRowElement = (rowData) => {
  const { item, satuan, dipenuhi, sisa } = rowData;
  return `
    <tr>
            <td>${item}</td>
            <td>${satuan}</td>
            <td><span class="badge bg-success">${formatCurrency(dipenuhi)}</span></td>
            <td><span class="badge bg-warning">${formatCurrency(sisa)}</span></td>
        </tr>
    `;
};

export { tableRowElement };
