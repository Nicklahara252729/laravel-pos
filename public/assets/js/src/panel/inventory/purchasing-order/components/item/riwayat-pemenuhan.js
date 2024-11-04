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
const modalRiwayatPemenuhan = $(`#${attributeName()[0]['modalRiwayatPemenuhan']}`);
const riwayatLog = $(`#${attributeName()[0]['riwayatLog']}`);

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'riwayat-outlet-name': 'outlet',
    'riwayat-nomor-po': 'nomor_po',
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
  $(`${modalRiwayatPemenuhan.selector} #riwayat-log div`).empty();
  const log = datas.map((data, index) => {
    return `
    <section>
                            <div class="flex justify-between">
                                <label class="p-0 m-0">${data.date}</label>
                            </div>
                            <div class="d-grid">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Dipenuhi</td>
                                            <td>Rusak</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>${formatCurrency(data.dipenuhi)}</td>
                                            <td>${formatCurrency(data.rusak)}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
      `;
  });
  const logEl = log.join('');
  $(`${modalRiwayatPemenuhan.selector} #riwayat-log div`).append(logEl);
};

export { detailElement, historyLogElement };
