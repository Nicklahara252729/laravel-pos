/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import componet attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const modalStopPemenuhan = $(`#${attributeName()[0]['modalStopPemenuhan']}`);
const stopPemenuhanLog = $(`#${attributeName()[0]['stopPemenuhanLog']}`);

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'stop-pemenuhan-outlet-name': 'outlet',
    'stop-pemenuhan-nomor-po': 'nomor_po',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id} p`).text(widgetValue);
  });
};

/**
 * render history log
 */
const historyLogElement = (datas) => {
  $(`${modalStopPemenuhan.selector} ${stopPemenuhanLog.selector} div`).empty();
  const log = datas.map((data, index) => {
    return `
    <section class="flex justify-first">
        <div class="mr-3">
            <label>Pesanan Diterima</label>
            <p>${formatCurrency(data.dipenuhi)}</p>
        </div>
        <div class="mr-3">
            <label>Pesanan Dibatalkan</label>
            <p>${formatCurrency(data.sisa)}</p>
        </div>
    </section>
      `;
  });
  const logEl = log.join('');
  $(`${modalStopPemenuhan.selector} ${stopPemenuhanLog.selector} div`).append(logEl);
};

export { detailElement, historyLogElement };
