/**
 * import component
 */
import { attributeName } from '../attribute/attribute-name.js';
import { formInput } from '../form/input.js';

/**
 * Represents a modal input handler.
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
    // defined manager
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalInput']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
  }

  /**
   * Handles modal behavior for adding a new tax produk.
   */
  modalAddHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Pajak Produk');
    this.buttonSubmit.text('Simpan');
  }

  /**
   * Handles modal behavior for editing an existing tax produk.
   *
   * @param {string} param - The unique identifier of the tax produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.titleModal.text('Edit Pajak Produk');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
