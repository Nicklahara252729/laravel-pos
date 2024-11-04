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
    // defiend manager
    this.formManager = formInput;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.akun);
  }
}

export { ModalInput };
