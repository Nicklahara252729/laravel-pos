/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import {
  detailElement,
  historyLogElement,
  bahanDipesanElement,
} from '../item/update-proses-pesanan.js';

/**
 * import component tableƒ
 */
import { tableRowElement } from '../table/riwayat-pemenuhan.js';

class ModalUpdateProsesPesanan {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalUpdateProsesPesanan']}`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
    this.table = $(`#${attributeName()[0]['modalUpdateProsesPesanan']} .bahan-dipesan table`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalUpdateProsesPesananHandler(param) {
    detailElement(param.data);
    historyLogElement(param.riwayat.log);
    bahanDipesanElement(param.data.pesanan);
    const tableElement = param.data.bahan.map((table) => tableRowElement(table)).join('');
    $(`${this.table.selector} tbody`).empty();
    $(`${this.table.selector} tbody`).append(tableElement);

    this.modal.modal('show');
    $(`${this.modalUpdate.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalUpdate.selector} .modal-content`).removeClass('dim');
    });
  }
}

export { ModalUpdateProsesPesanan };
