/**
 * import helper
 */
import { formatCurrency } from '../../../../../../helpers/converter.js';

/**
 * import componet
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const modalUpdateProsesPesanan = $(`#${attributeName()[0]['modalUpdateProsesPesanan']}`);
const pesananDiterima = $(`#${attributeName()[0]['pesananDiterima']}`);
const updateProsesPesananLog = $(`#${attributeName()[0]['updateProsesPesananLog']}`);

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'update-proses-pesanan-outlet-name': 'outlet',
    'update-proses-pesanan-nomor-po': 'nomor_po',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id} p`).text(widgetValue);
  });
};

/**
 * render bahan yang dipesanan
 */
const bahanDipesanElement = (datas) => {
  $(`${modalUpdateProsesPesanan.selector} ${pesananDiterima.selector} div`).empty();
  const log = datas.map((data, index) => {
    return `
    <p class="m-0">${data.item}</p>
    <div class="flex justify-first mb-2">
            <div class="form-group mr-3">
                <label for="dipenuhi" class="font-normal">Dipenuhi</label>
                <input type="number" name="dipenuhi" class="form-control" placeholder="Bahan dipenuhi" min="0">
            </div>
            <div class="form-group mr-3">
                <label class="font-normal" for="rusak">Rusak <span class="text-muted">(opsional)</span></label>
                <input type="number" name="rusak" min="0" class="form-control" placeholder="Bahan rusak">
            </div>
            <div class="d-grid">
                <span>Sisa</span>
                <button type="button" class="btn btn-warning position-relative p-0 avatar-sm rounded-circle">
                    <span class="avatar-title bg-transparent text-reset">
                        ${data.sisa}
                    </span>
                </button>
            </div>
        </div>
      `;
  });
  const logEl = log.join('');
  $(`${modalUpdateProsesPesanan.selector} ${pesananDiterima.selector} div`).append(logEl);
};

/**
 * render history log
 */
const historyLogElement = (datas) => {
  $(`${modalUpdateProsesPesanan.selector} ${updateProsesPesananLog.selector} div`).empty();
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
  $(`${modalUpdateProsesPesanan.selector} ${updateProsesPesananLog.selector} div`).append(logEl);
};

export { detailElement, historyLogElement, bahanDipesanElement };
