/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const tableElement = (listData) => {
  let tableRows = '';
  const { produk, nominal } = listData;
  tableRows += `<tr>
                  <td>Minuman</td>
                  <td class="text-center">${produk.terjual}</td>
                  <td class="text-center">${produk.dikembalikan}</td>
                  <td class="text-right">Rp. ${formatCurrency(nominal.penjualan_kotor)}</td>
                  <td class="text-right">Rp. ${formatCurrency(nominal.diskon)}</td>
                  <td class="text-right">Rp. ${formatCurrency(nominal.dikembalikan)}</td>
                  <td class="text-right">Rp. ${formatCurrency(nominal.net)}</td>
                  <td class="text-right">Rp. ${formatCurrency(nominal.cogs)}</td>
                </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const tableFootElement = (rowData) => {
  const { produk, nominal } = rowData;
  return `<tr class="text-md font-bold text-primary">
            <td>Total</td>
            <td class="text-center">${produk.terjual}</td>
            <td class="text-center">${produk.dikembalikan}</td>
            <td class="text-right">Rp. ${formatCurrency(nominal.penjualan_kotor)}</td>
            <td class="text-right">Rp. ${formatCurrency(nominal.diskon)}</td>
            <td class="text-right">Rp. ${formatCurrency(nominal.dikembalikan)}</td>
            <td class="text-right">Rp. ${formatCurrency(nominal.net)}</td>
            <td class="text-right">Rp. ${formatCurrency(nominal.cogs)}</td>
        </tr>`;
};

export { tableElement, tableFootElement };
