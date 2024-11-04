/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * Represents a modal input handler for outlet management.
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
    this.titleModal = $(`#${attributeName()[0]['modal']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.modal = $(`#${attributeName()[0]['modal']}`);
  }

  /**
   * Handles modal behavior for adding a new outlet.
   */
  modalAddHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Outlet');
    this.buttonSubmit.text('Simpan');
  }

  /**
   * Handles modal behavior for editing an existing outlet.
   *
   * @param {string} param - The unique identifier of the outlet to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.dataOutlet);
    this.titleModal.text('Edit Outlet');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
