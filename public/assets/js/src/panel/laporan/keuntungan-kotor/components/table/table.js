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
    'penjualan-bersih-persen': 'penjualan_bersih_persen',
    hpp: 'hpp',
    'hpp-persen': 'hpp_persen',
    'keuntungan-kotor': 'keuntungan_kotor',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text;
    if (id == 'penjualan-bersih-persen' || id == 'hpp-persen') {
      text = `${widgetValue}%`;
    } else {
      text = `Rp. ${formatCurrency(widgetValue)}`;
    }
    $(`#${id}`).text(text);
  });
};

export { renderItem };
