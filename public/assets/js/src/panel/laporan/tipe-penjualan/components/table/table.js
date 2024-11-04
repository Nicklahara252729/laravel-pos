/**
 * import helper
 */
import { formatCurrency } from "../../../../../../helpers/converter.js";

/**
 * row table
 */
const tipePenjualanTableElement = (listData) => {
  let tableRows = '';
  const { tipe_penjualan, kuantitas, jumlah } = listData;
  tableRows += `<tr>
                    <th>${tipe_penjualan}</th>
                    <td class="text-center">${formatCurrency(kuantitas)}</td>
                    <td class="text-right">Rp ${formatCurrency(jumlah)}</td>
                  </tr>`;
  return tableRows;
};

/**
 * item table
 */
const itemElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'total-kuantitas': `kuantitas`,
    'total-jumlah': 'jumlah',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const keysArray = Object.keys(elementIdtoWidgetKey);
    const index = keysArray.indexOf(id);
    const widgetValue = widgetData.total[widgetKey];
    const widgetValueFormat = index > 0 ? `Rp . ${formatCurrency(widgetValue)}` : widgetValue;
    $(`#${id}`).text(widgetValueFormat);
  });
};

export { tipePenjualanTableElement, itemElement };
