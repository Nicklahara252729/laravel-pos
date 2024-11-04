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
const modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
const detailPesananPembelian = $(`.${attributeName()[0]['detailPesananPembelian']}`);
const detailLog = $(`#${attributeName()[0]['detailLog']}`);
const detailButtonContainer = $(`#${attributeName()[0]['detailButtonContainer']}`);

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-outlet-name': 'outlet',
    'detail-nomor-po': 'nomor_po',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id} p`).text(widgetValue);
  });
};

/**
 * render badge status
 */
const badgeStatusElement = (data) => {
  let colorStatus = ``;
  if (data.kode === 1) {
    colorStatus = `btn-secondary`;
  } else if (data.kode === 2) {
    colorStatus = `btn-warning`;
  } else if (data.kode === 3) {
    colorStatus = `btn-success`;
  } else if (data.kode === 4 || data.kode === 5) {
    colorStatus = `btn-danger`;
  }
  $(`${modalDetail.selector} .modal-header span`).addClass(`${colorStatus}`);
  $(`${modalDetail.selector} .modal-header span`).text(data.keterangan);
};

/**
 * render pesanan pembelian
 */
const pesananPembelianElement = (datas) => {
  $(`${modalDetail.selector} ${detailPesananPembelian.selector}`).empty();

  const bahan = datas.bahan.map((data, index) => {
    return `
            <section>
                <div class="flex justify-between">
                    <label>Bahan ${index + 1}</label>
                </div>
                <div class="flex justify-between">
                    <div class="form-group mb-2">
                        <span for="name">Nama bahan</span>
                        <input type="text" readonly class="form-control"
                            placeholder="Masukkan nama bahan" value="${data.item}">
                    </div>
                    <div class="form-group mb-2">
                        <span for="name">Jumlah</span>
                        <input type="number" min="0" class="form-control"
                            placeholder="Masukkan jumlah" readonly value="${data.qty}">
                    </div>
                    <div class="form-group mb-2">
                        <span for="name">Satuan unit</span>
                        <input type="text" readonly class="form-control"
                            placeholder="Masukkan satuan" value="${data.satuan}">
                    </div>
                    <div class="form-group mb-2">
                        <span for="name">Biaya</span>
                        <input type="number" min="0" class="form-control biaya-input"
                            placeholder="Masukkan Biaya" readonly value="${data.biaya}">
                    </div>
                </div>
            </section>
      `;
  });
  const bahanEl = bahan.join('');

  const totalEl = () => {
    return `<div class="flex justify-between mb-2">
                    <label class="mt-2">Total</label>
                    <label>Rp ${formatCurrency(datas.total)}</label>
                </div>`;
  };
  $(`${modalDetail.selector} ${detailPesananPembelian.selector}`).append(bahanEl);
  $(`${modalDetail.selector} ${detailPesananPembelian.selector}`).append(totalEl);
};

/**
 * render history log
 */
const historyLogElement = (datas) => {
  $(`${modalDetail.selector} ${detailLog.selector} div`).empty();
  const log = datas.map((data, index) => {
    const listData = listHistoryLogElement(data.rows);
    return `
            <section>
              <div class="flex justify-between">
                <label>${data.date}</label>
              </div>
                <ul class="list-unstyled ps-0 mb-0">
                ${listData}                  
                </ul>
            </section>
      `;
  });
  const logEl = log.join('');
  $(`${modalDetail.selector} ${detailLog.selector} div`).append(logEl);
};

/**
 * render list history log
 */
const listHistoryLogElement = (rowData) => {
  const list = rowData
    .map((datas, index) => {
      const hasLink =
        datas.has_link === 1
          ? `(<a href="javascript:void(0)" data-uuid="${datas.name}">lihat detail riwayat</a>)`
          : ``;
      if (datas.note === null) {
        return `<li>
                  <div class="mb-1 text-truncate">
                    <table>
                      <td><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i></td>
                      <td width="60">${datas.time}</td>
                      <td><strong>${datas.name}</strong> ${datas.description} ${hasLink}</td>
                    </table>
                  </div>
                </li>`;
      } else {
        return `<li>
                    <div class="mb-1 text-truncate">
                      <table>
                        <tr>
                          <td><i class="mdi mdi-circle-medium align-middle text-primary me-1"></i></td>
                          <td width="60">${datas.time}</td>
                          <td><strong>${datas.name}</strong> ${datas.description} </td>
                        </tr>
                        <tr class="text-muted">
                          <td colspan="2"></td>
                          <td>${datas.note}</td>
                        </tr>
                      </table>
                    </div>
                  </li>`;
      }
    })
    .join('');
  return list;
};

/**
 * render button
 */
const buttonElement = (datas) => {
  let button = ``;
  detailButtonContainer.empty();
  if (datas.kode === 3 || datas.kode === 4) {
    button = `<button class="btn btn-outline-dark waves-effect waves-light" id="detail-print-button"><i class="mdi mdi-printer"></i> Cetak</button>
              <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Tutup</button>`;
  } else {
    button = `<button class="btn btn-outline-dark waves-effect waves-light" id="detail-print-button"><i class="mdi mdi-printer"></i> Cetak</button>
              <div class="flex items-center gap-3">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light" id="detail-sunting-button">Sunting PO</button>
              </div>`;
  }
  detailButtonContainer.append(button);
};

export {
  detailElement,
  badgeStatusElement,
  pesananPembelianElement,
  historyLogElement,
  buttonElement,
};
