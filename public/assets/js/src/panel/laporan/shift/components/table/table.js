/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableElement = (listData) => {
  let tableRows = '';
  const { nama, mulai, selesai, total_diharapkan, total_aktual, selisih } = listData;
  tableRows += `<tr>
                <th>${nama}</th>
                <td class="text-center">${mulai}</td>
                <td class="text-center">${selesai}</td>
                <td class="text-right">Rp ${formatCurrency(total_diharapkan)}</td>
                <td class="text-right">Rp ${formatCurrency(total_aktual)}</td>
                <td class="text-right">Rp ${formatCurrency(selisih)}</td>
                </tr>`;
  return tableRows;
};

export { tableElement };
