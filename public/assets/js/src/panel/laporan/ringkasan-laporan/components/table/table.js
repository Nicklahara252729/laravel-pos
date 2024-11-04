/**
 * import helper
 */
import { formatCurrency } from "../../../../../../helpers/converter.js";

/**
 * render item
 */
const renderItem = (widgetData) => {
  const elementIdtoWidgetKey = {
    'penjualan-kotor': 'penjualan_kotor',
    diskon: 'diskon',
    refund: 'refund',
    'penjualan-bersih': 'penjualan_bersih',
    gratuity: 'gratuity',
    pajak: 'pajak',
    pembulatan: 'pembulatan',
    'total-penjualan': 'total_penjualan',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(`Rp. ${formatCurrency(widgetValue)}`);
  });
};

export { renderItem };
