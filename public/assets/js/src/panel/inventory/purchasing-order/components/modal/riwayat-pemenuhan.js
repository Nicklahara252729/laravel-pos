/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement, historyLogElement } from '../item/riwayat-pemenuhan.js';

/**
 * import component table
 */
import { tableRowElement } from '../table/riwayat-pemenuhan.js';

class ModalRiwayatPemenuhan {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalRiwayatPemenuhan']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
    this.table = $(`#${attributeName()[0]['modalRiwayatPemenuhan']} .bahan-dipesan table`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalRiwayatPemenuhanHandler(param) {
    /**
     * modal opened
     */
    const modal = param.modal === 'detail' ? this.modalDetail : this.modalUpdate;
    this.modal.modal('show');
    $(`${modal.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${modal.selector} .modal-content`).removeClass('dim');
    });

    /**
     * callback method
     */
    detailElement(param.data);
    historyLogElement(param.data.log);
    const tableElement = param.data.bahan.map((table) => tableRowElement(table)).join('');
    $(`${this.table.selector} tbody`).empty();
    $(`${this.table.selector} tbody`).append(tableElement);
  }
}

export { ModalRiwayatPemenuhan };
