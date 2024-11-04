/**
 * import component form
 */
import { formResendReceipt } from '../form/resend.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalResendReceipt {
  /**
   * Creates a new instance of modalResendReceipt.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formResendReceipt;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalResendReceipt']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitResendReceiptButton']}`);
    this.modalReceipt = $(`#${attributeName()[0]['modalReceipt']}`);
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalResendReceiptHandler(url) {
    this.modal.modal('show');
    $(`${this.modalReceipt.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalReceipt.selector} .modal-content`).removeClass('dim');
    });
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
  }
}

export { ModalResendReceipt };
