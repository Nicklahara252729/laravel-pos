/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * Represents a modal input handler for hak akses.
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
    // defined manage
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modal']}`);
    this.titleModal = $(`#${attributeName()[0]['modal']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
  }

  /**
   * Handles modal behavior for adding a new hak akses.
   */
  modalAddHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Hak Akses');
    this.buttonSubmit.text('Simpan');
    this.formManager.appPermissionHandler();
    this.formManager.backofficePermissionHandler();
  }

  /**
   * Handles modal behavior for editing an existing hak akses.
   *
   * @param {string} param - The unique identifier of the hak akses to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.formManager.appPermissionHandler();
    this.formManager.backofficePermissionHandler();
    this.titleModal.text('Edit Hak Akses');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
