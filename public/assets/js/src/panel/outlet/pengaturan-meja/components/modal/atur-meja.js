/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formAturMeja } from '../form/atur-meja.js';

class ModalAturMeja {
  /**
   * Creates a new instance of atur meja modal.
   *
   * @constructor
   */
  constructor() {
    // defined maanger
    this.formManager = formAturMeja;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalTableView']}`);
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalAddHandler(url) {
    this.modal.modal('show');
    this.formManager.setMethod('PUT');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
  }
}

export { ModalAturMeja };
