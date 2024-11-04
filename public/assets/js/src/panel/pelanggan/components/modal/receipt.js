/**
 * import utils
 */
import { renderReceipt } from '../../../../../utilities/receipt-util.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalReceipt {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalReceipt = $(`#${attributeName()[0]['modalReceipt']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * open transaction modal
   */
  modalOpenHandler(data) {
    this.modalReceipt.modal('show');
    $(`${this.modalReceipt.selector} .modal-body`).append(renderReceipt(data));
    $(`${this.modalDetail.selector} .modal-content`).addClass('dim');
  }
}

export { ModalReceipt };
