/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement, historyLogElement } from '../item/stop-pemenuhan.js';

/**
 * import component table
 */
import { tableRowElement } from '../table/riwayat-pemenuhan.js';

/**
 * import component form
 */
import { formStopPemenuhan } from '../form/stop-pemenuhan.js';

class ModalStopPemenuhan {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formStopPemenuhan;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalStopPemenuhan']}`);
    this.modalUpdateProsesPesanan = $(`#${attributeName()[0]['modalUpdateProsesPesanan']}`);
    this.table = $(`#${attributeName()[0]['modalStopPemenuhan']} .bahan-dipesan table`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalStopPemenuhanHandler(param) {
    detailElement(param.data);
    historyLogElement(param.riwayat.log);
    const tableElement = param.data.bahan.map((table) => tableRowElement(table)).join('');
    $(`${this.table.selector} tbody`).empty();
    $(`${this.table.selector} tbody`).append(tableElement);
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);

    this.modal.modal('show');
    $(`${this.modalUpdateProsesPesanan.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalUpdateProsesPesanan.selector} .modal-content`).removeClass('dim');
    });
  }
}

export { ModalStopPemenuhan };
