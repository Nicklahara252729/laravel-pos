/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import utils
 */
import { renderReceipt } from '../../../../../utilities/receipt-util.js';

class ModalReceipt {
  /**
   * Creates a new instance of atur meja modal.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalReceipt']}`);
  }

  /**
   * open receipt modal
   */
  openReceiptModa(data) {
    $(`${this.modal.selector} .modal-body`).empty();
    this.modal.modal('show');
    $(`${this.modal.selector} .modal-body`).append(renderReceipt(data));
  }
}

export { ModalReceipt };
