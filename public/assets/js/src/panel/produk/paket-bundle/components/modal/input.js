/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * Represents a modal input handler for tax produk.
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
    this.itemContainer = $(`.${attributeName()[0]['assignItemContainer']}`);
    this.outletContainer = $(`.${attributeName()[0]['assignOutletContainer']}`);
  }

  /**
   * Handles modal behavior for adding a new tax produk.
   */
  modalAddHandler(url) {
    this.outletContainer.toggle(false);
    this.itemContainer.toggle(false);
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Paket Bundle');
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
    this.titleModal.text('Edit Paket Bundle');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
