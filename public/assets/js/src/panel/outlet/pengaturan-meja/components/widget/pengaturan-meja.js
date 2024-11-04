/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * widget total riwayat transaksi
 */
const widgetTotalElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    reservasi: 'reservasi',
    'transaksi-selesai': 'done',
    'transaksi-dibatalkan': 'cancel',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(formatCurrency(widgetValue));
  });
};

export { widgetTotalElement };
