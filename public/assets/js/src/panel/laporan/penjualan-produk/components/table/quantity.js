/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const quantityTableElement = (listData) => {
  let tableRows = '';
  const { nama, sku, kategori, produk_terjual, produk_kembali, terjual, pengembalian } = listData;
  tableRows += `<tr>
                  <td>${nama}</td>
                  <td>${sku}</td>
                  <td>${kategori}</td>
                  <td>${formatCurrency(produk_terjual.alacarte)}</td>
                  <td>${formatCurrency(produk_terjual.bundel)}</td>
                  <td>${formatCurrency(produk_kembali.alacarte)}</td>
                  <td>${formatCurrency(produk_kembali.bundel)}</td>
                  <td>${formatCurrency(terjual)}</td>
                  <td>${formatCurrency(pengembalian)}</td>       
                </tr>`;
  return tableRows;
};

/**
 * row table foot
 */
const quantityFootElement = (rowData) => {
  const { produk_terjual, produk_kembali, terjual, pengembalian } = rowData;
  return `<tr class="text-md font-bold text-primary">
            <td colspan="3">Total</td>
            <td>${formatCurrency(produk_terjual.alacarte)}</td>
            <td>${formatCurrency(produk_terjual.bundel)}</td>
            <td>${formatCurrency(produk_kembali.alacarte)}</td>
            <td>${formatCurrency(produk_kembali.bundel)}</td>
            <td>${formatCurrency(terjual)}</td>
            <td>${formatCurrency(pengembalian)}</td>
          </tr>`;
};

export { quantityTableElement, quantityFootElement };
