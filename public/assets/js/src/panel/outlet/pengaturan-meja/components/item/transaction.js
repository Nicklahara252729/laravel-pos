/**
 * import helper
 */
import { formatCurrency, capitalizeFirstLetter } from '../../../../../../helpers/converter.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const transaksiPaymentMethod = $(`#${attributeName()[0]['transaksiPaymentMethod']}`);
const transaksiBiayaReservasi = $(`#${attributeName()[0]['transaksiBiayaReservasi']}`);
const transaksiDikembalikan = $(`#${attributeName()[0]['transaksiDikembalikan']}`);

/**
 * transaksi element
 * @param {*} widgetData
 */
const doneTransaction = (widgetData) => {
  const elementIdtoWidgetKey = {
    'transaksi-status': 'status',
    'transaksi-struck': 'no_struck',
    'transaksi-meja': 'meja',
    'transaksi-jumlah-kursi': 'jumlah_kursi',
    'transaksi-diskon': 'diskon',
    'transaksi-subtotal': 'subtotal',
    'transaksi-gratuity': 'gratuity',
    'transaksi-tax': 'tax',
    'transaksi-total': 'total',
    'transaksi-charge': 'charge',
    'transaksi-catatan': 'catatan',
    'transaksi-tanggal-reservasi': 'tanggal_reservasi',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = '';

    if (widgetKey === 'status') {
      let statusColor = '';
      if (widgetData.status === 'dibatalkan') {
        statusColor = `text-danger`;
      } else if (widgetData.status === 'selesai') {
        statusColor = `text-success`;
      } else {
        statusColor = `text-warning`;
      }
      text = capitalizeFirstLetter(widgetData.status);
      $(`#${id}`).attr('class', statusColor);
    } else {
      if (
        widgetKey === 'diskon' ||
        widgetKey === 'subtotal' ||
        widgetKey === 'gratuity' ||
        widgetKey === 'tax' ||
        widgetKey === 'total' ||
        widgetKey === 'charge'
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

/**
 * payment method
 */
const paymentMethod = (widgetData) => {
  $(`${transaksiPaymentMethod.selector} div`).text(widgetData.method);
  $(`${transaksiPaymentMethod.selector} span`).text(`Rp ${formatCurrency(widgetData.payment)}`);
};

/**
 * cancel reservation
 */
const cancelReservation = (widgetData) => {
  $(`${transaksiBiayaReservasi.selector} span`).text(`Rp ${formatCurrency(widgetData.reservasi)}`);
  $(`${transaksiDikembalikan.selector} span`).text(`Rp ${formatCurrency(widgetData.refund)}`);
};
export { doneTransaction, paymentMethod, cancelReservation };
