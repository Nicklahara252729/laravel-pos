/**
 * import component form
 */
import { formNpwp } from '../form/npwp.js';

class ModalNpwp {
  /**
   * Creates a new instance of Modal Npwp.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formNpwp;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalNpwpHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    const data = param.data;
    const dataNpwp = data.npwp;
    this.formManager.fillForm(dataNpwp);
  }
}

export { ModalNpwp };
