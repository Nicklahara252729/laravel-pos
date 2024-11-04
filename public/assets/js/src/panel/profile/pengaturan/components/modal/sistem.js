/**
 * import component form
 */
import { formSistem } from '../form/sistem.js';

class ModalSistem {
  /**
   * Creates a new instance of Modal Sistem.
   *
   * @constructor
   */
  constructor() {
    // defiend manager
    this.formManager = formSistem;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    const data = param.data;
    const dataSistem = {
      application_name: data.sistem[0].description,
      logo: data.sistem[1].description,
    };
    this.formManager.fillForm(dataSistem);
  }
}

export { ModalSistem };
