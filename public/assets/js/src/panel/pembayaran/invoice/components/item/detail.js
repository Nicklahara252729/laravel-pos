/**
 * import helper
 */
import { formatCurrency, capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 * detail element
 * @param {*} widgetData
 */
const detailEl = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-status': 'status',
    'detail-tanggal': 'tanggal',
    'detail-tempo': 'tempo',
    'detail-invoice': 'no_invoice',
    'detail-customer': 'customer',
    'detail-diskon': 'diskon',
    'detail-subtotal': 'subtotal',
    'detail-gratuity': 'gratuity',
    'detail-tax': 'tax',
    'detail-total': 'total',
    'detail-catatan': 'catatan',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = '';

    if (widgetKey === 'status') {
      let statusColor = '';
      if (
        widgetData.status.kode === 1 ||
        widgetData.status.kode === 2 ||
        widgetData.status.kode === 5
      ) {
        statusColor = `text-danger`;
      } else if (widgetData.status.kode === 3) {
        statusColor = `text-success`;
      } else {
        statusColor = `text-warning`;
      }
      text = capitalizeFirstLetter(widgetData.status.keterangan);
      $(`#${id}`).attr('class', statusColor);
    } else {
      if (
        widgetKey === 'diskon' ||
        widgetKey === 'subtotal' ||
        widgetKey === 'gratuity' ||
        widgetKey === 'tax' ||
        widgetKey === 'total'
      ) {
        text = `Rp. ${formatCurrency(widgetData[widgetKey])}`;
      } else if (widgetKey === 'customer') {
        text = capitalizeFirstLetter(widgetValue);
      } else if (widgetKey === 'catatan') {
        text = widgetValue === null ? `Tidak ada catatan` : widgetValue;
      } else {
        text = widgetValue;
      }
    }
    $(`#${id}`).text(text);
  });
};
export { detailEl };
