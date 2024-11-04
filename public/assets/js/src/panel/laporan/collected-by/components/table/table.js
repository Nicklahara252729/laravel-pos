/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableElement = (listData) => {
  let tableRows = '';
  const { nama, judul, jumlah_transaksi, total_collected } = listData;
  tableRows += `<tr>
                  <th>${nama}</th>
                  <td class="text-center">${judul}</td>
                  <td class="text-right">${jumlah_transaksi}</td>
                  <td class="text-right">Rp ${formatCurrency(total_collected)}</td>
                </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const tableFootElement = (rowData) => {
  const { jumlah_transaksi, total_collected } = rowData;
  return `<tr class="text-md font-bold text-primary">
            <th>Total</th>
            <td colspan="2" class="text-right">${jumlah_transaksi}</td>
            <td class="text-right">Rp ${formatCurrency(total_collected)}</td>
        </tr>`;
};

export { tableElement, tableFootElement };
