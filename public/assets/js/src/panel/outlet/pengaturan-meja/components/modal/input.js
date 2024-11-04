/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

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
    this.buttonSubmit = $(`#${attributeName()[0]['submitInputButton']}`);
    this.modalTableView = $(`#${attributeName()[0]['modalTableView']}`);
  }

  /**
   * Handles modal behavior for adding a new daftar produk.
   */
  async modalAddHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Meja');
    this.buttonSubmit.text('Tambah Meja');
    this.modal.modal('show');
    $(`${this.modalTableView.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalTableView.selector} .modal-content`).removeClass('dim');
    });
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.titleModal.text('Edit Meja');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
