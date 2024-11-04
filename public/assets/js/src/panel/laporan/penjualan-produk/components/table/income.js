/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const incomeTableElement = (listData) => {
  let tableRows = '';
  const { nama, sku, kategori, produk_terjual, produk_kembali, penjualan_kotor } = listData;
  tableRows += `<tr>
                    <td>${nama}</td>
                    <td>${sku}</td>
                    <td>${kategori}</td>
                    <td class="text-center">${formatCurrency(produk_terjual)}</td>
                    <td class="text-center">${formatCurrency(produk_kembali)}</td>
                    <td class="text-right">Rp. ${formatCurrency(penjualan_kotor)}</td>
                  </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const incomeFootElement = (rowData) => {
  const { produk_terjual, produk_kembali, penjualan_kotor } = rowData;
  return `<tr class="text-md font-bold text-primary">
          <td colspan="3">Total</td>
          <td class="text-center">${formatCurrency(produk_terjual)}</td>
          <td class="text-center">${formatCurrency(produk_kembali)}</td>
          <td class="text-right">Rp. ${formatCurrency(penjualan_kotor)}</td>
        </tr>`;
};

export { incomeTableElement, incomeFootElement };
