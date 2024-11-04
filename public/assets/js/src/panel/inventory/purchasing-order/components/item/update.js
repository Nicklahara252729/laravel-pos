/**
 * import componet attroi
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * defined component
 */
const modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
const updateLog = $(`#${attributeName()[0]['updateLog']}`);
const updateButtonContainer = $(`#${attributeName()[0]['updateButtonContainer']}`);

/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'update-outlet-name': 'outlet',
    'update-nomor-po': 'nomor_po',
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
  $(`${modalUpdate.selector} .modal-header span`).addClass(`${colorStatus}`);
  $(`${modalUpdate.selector} .modal-header span`).text(data.keterangan);
};

/**
 * render history log
 */
const historyLogElement = (datas) => {
  $(`${modalUpdate.selector} ${updateLog.selector} div`).empty();
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
  $(`${modalUpdate.selector} ${updateLog.selector} div`).append(logEl);
};

/**
 * render list history log
 */
const listHistoryLogElement = (rowData) => {
  const list = rowData
    .map((datas, index) => {
      const hasLink =
        datas.has_link === 1
          ? `(<a href="javascript:void(0)" data-uuidpo="">lihat detail riwayat</a>)`
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
  updateButtonContainer.empty();
  if (datas.kode === 1) {
    button = `<button class="btn btn-outline-dark waves-effect waves-light" id="update-print-button"><i class="mdi mdi-printer"></i> Cetak</button>
              <div class="flex items-center gap-3">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">Tolak <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu" id="reject-button">
                        <a class="dropdown-item" href="javascript:void(0)" data-action="revisi">Tolak dengan revisi</a>
                        <a class="dropdown-item" href="javascript:void(0)" data-action="reject">Tolak sepenuhnya</a>
                    </div>
                </div>
                <button class="btn btn-primary waves-effect waves-light submit-update-button">Setujui</button>
              </div>`;
  } else if (datas.kode === 2) {
    button = `<button class="btn btn-outline-dark waves-effect waves-light" id="update-print-button"><i class="mdi mdi-printer"></i> Cetak</button>
              <div class="flex items-center gap-3">
                <button class="btn btn-soft-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary waves-effect waves-light submit-update-button">Simpan</button>
              </div>`;
  }
  updateButtonContainer.append(button);
};

export { detailElement, badgeStatusElement, historyLogElement, buttonElement };
