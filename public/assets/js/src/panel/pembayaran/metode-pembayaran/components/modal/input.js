/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * import component item
 */
import { paymentListElement } from '../item/payment-list.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalInput {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defiend manager
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalTitle']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.paymentElement = $(`.${attributeName()[0]['paymentList']}`);
  }

  /**
   * render payment list element
   */
  async renderPaymentList(paymentData) {
    const paymentItem = paymentData.map((row) => paymentListElement(row)).join('');
    this.paymentElement.empty();
    this.paymentElement.append(paymentItem);
  }

  /**
   * Handles modal behavior for adding a new kategori produk.
   */
  async modalAddHandler(param) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Konfigurasi');
    this.buttonSubmit.text('Simpan');
    this.renderPaymentList(param.paymentList);
    this.formManager.paymentListToogleHandler();
  }

  /**
   * Handles modal behavior for editing an existing kategori produk.
   *
   * @param {string} param - The unique identifier of the kategori produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.renderPaymentList(param.paymentList);
    this.formManager.paymentListToogleHandler();
    this.titleModal.text('Edit Konfigurasi');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
