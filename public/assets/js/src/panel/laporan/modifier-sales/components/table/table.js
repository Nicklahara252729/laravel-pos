/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const modifierSalesTableElement = (listData) => {
  let tableRows = '';

  Object.keys(listData).forEach((modifireSales) => {
    const modifireSalesItems = listData[modifireSales];
    const modifierSalesItemList = modifireSalesItems.list;
    const { jumlah_terjual, penjualan_kotor, diskon, pengembalian, penjualan_bersih } =
      modifireSalesItems.total;

    tableRows += `<tr>
                      <th class="text-muted border-none">${modifireSales}</th>
                      <td class="text-muted border-none text-center">${jumlah_terjual}</td>
                      <td class="text-muted border-none text-right">Rp ${formatCurrency(penjualan_kotor)}</td>
                      <td class="text-muted border-none text-right">Rp ${formatCurrency(diskon)}</td>
                      <td class="text-muted border-none text-right">Rp ${formatCurrency(pengembalian)}</td>
                      <td class="text-muted border-none text-right">Rp ${formatCurrency(penjualan_bersih)}</td>
                    </tr>`;

    modifierSalesItemList.forEach((rowData) => {
      const { nama, jumlah_terjual, penjualan_kotor, diskon, pengembalian, penjualan_bersih } =
        rowData;

      tableRows += `<tr>
                        <th>${nama}</th>
                        <td class="text-center">${jumlah_terjual}</td>
                        <td class="text-right">Rp ${formatCurrency(penjualan_kotor)}</td>
                        <td class="text-right">Rp ${formatCurrency(diskon)}</td>
                        <td class="text-right">Rp ${formatCurrency(pengembalian)}</td>
                        <td class="text-right">Rp ${formatCurrency(penjualan_bersih)}</td>
                      </tr>`;
    });
  });
  return tableRows;
};

/**
 * row table foot
 */
const modifierSalesFootElement = (rowData) => {
  const { jumlah_terjual, penjualan_kotor, diskon, pengembalian, penjualan_bersih } = rowData;
  return `<tr class="text-md font-bold text-primary">
            <th>Total</th>
            <td class="text-center">${jumlah_terjual}</td>
            <td class="text-right">Rp ${formatCurrency(penjualan_kotor)}</td>
            <td class="text-right">Rp ${formatCurrency(diskon)}</td>
            <td class="text-right">Rp ${formatCurrency(pengembalian)}</td>
            <td class="text-right">Rp ${formatCurrency(penjualan_bersih)}</td>
          </tr>`;
};

export { modifierSalesTableElement, modifierSalesFootElement };
