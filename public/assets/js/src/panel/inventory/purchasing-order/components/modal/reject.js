/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formReject } from '../form/reject.js';

class ModalReject {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formReject;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalReject']}`);
    this.modalTitle = $(`#${attributeName()[0]['modalReject']} .modal-header h5`);
    this.submitButton = $(`#${attributeName()[0]['submitRejectButton']}`);
    this.description = $(`#${attributeName()[0]['formReject']} p`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalRejectHandler(param) {
    this.modal.modal('show');
    $(`${this.modalUpdate} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalUpdate} .modal-content`).removeClass('dim');
    });
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);

    const modalTitle = param.type === 'revisi' ? `Tolak dengan Catatan Revisi` : `Tolak Sepenuhnya`;
    const buttonText = param.type === 'revisi' ? `Tolak dengan Revisi` : `Tolak Sepenuhnya`;
    const description =
      param.type === 'revisi'
        ? `Pesanan Pembelian ini akan dikirim ke Tab Ditolak untuk direvisi oleh pemohon. Silakan tulis catatan revisi untuk membimbing mereka.`
        : `Purchase Order ini akan ditolak dan tidak dapat dibatalkan.`;
    this.modalTitle.text(modalTitle);
    this.submitButton.text(buttonText);
    this.description.text(description);
  }
}

export { ModalReject };
