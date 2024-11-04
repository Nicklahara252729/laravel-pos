/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * row table
 */
const metodePembayaranTableElement = (listData) => {
  let tableRows = '';

  Object.keys(listData).forEach((kategori) => {
    const kategoriItems = listData[kategori];

    if (kategoriItems.length > 0) {
      tableRows += `<tr>
                      <th class="text-muted border-none" colspan="3">${kategori.toUpperCase()}</th>
                    </tr>`;

      kategoriItems.forEach((rowData) => {
        const { metode_pembayaran, transaksi, nominal } = rowData;

        tableRows += `<tr>
                        <th>${metode_pembayaran}</th>
                        <td class="text-center">${transaksi}</td>
                        <td class="text-right">Rp ${formatCurrency(nominal)}</td>
                      </tr>`;
      });
    }
  });
  return tableRows;
};

/**
 * render item
 */
const itemElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'transaksi-cash': `transaksi`,
    'nominal-cash': 'nominal',
    'transaksi-total': `transaksi`,
    'nominal-total': 'nominal',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const keysArray = Object.keys(elementIdtoWidgetKey);
    const index = keysArray.indexOf(id);
    const widgetValue = index > 1 ? widgetData.total[widgetKey] : widgetData.cash[widgetKey];
    const widgetValueFormat = index === 1 || index === 3 ? `Rp . ${formatCurrency(widgetValue)}` : widgetValue;
    $(`#${id}`).text(widgetValueFormat);
  });
};

export { metodePembayaranTableElement, itemElement };
