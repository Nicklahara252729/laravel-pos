/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableElement = (listData) => {
  let tableRows = '';
  const { nama, besar_diskon, jumlah, diskon_kotor, diskon_refund, diskon_bersih } = listData;
  tableRows += `<tr>
                  <td>${nama}</td>
                  <td class="text-center">${besar_diskon}%</td>
                  <td class="text-right">Rp. ${formatCurrency(jumlah)}</td>
                  <td class="text-right">Rp. ${formatCurrency(diskon_kotor)}</td>
                  <td class="text-right">Rp. ${formatCurrency(diskon_refund)}</td>
                  <td class="text-right">Rp. ${formatCurrency(diskon_bersih)}</td>
                </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const tableFootElement = (rowData) => {
  const { besar_diskon, jumlah, diskon_kotor, diskon_refund, diskon_bersih } = rowData;
  return `<tr class="text-md font-bold text-primary">
            <td>Total</td>
            <td class="text-center">${besar_diskon}%</td>
            <td class="text-right">Rp. ${formatCurrency(jumlah)}</td>
            <td class="text-right">Rp. ${formatCurrency(diskon_kotor)}</td>
            <td class="text-right">Rp. ${formatCurrency(diskon_refund)}</td>
            <td class="text-right">Rp. ${formatCurrency(diskon_bersih)}</td>
        </tr>`;
};

export { tableElement, tableFootElement };
