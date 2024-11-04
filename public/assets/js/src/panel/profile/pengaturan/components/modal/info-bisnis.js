/**
 * import component form
 */
import { formInfoBisnis } from '../form/info-bisnis.js';

class ModalInfoBisnis {
  /**
   * Creates a new instance of Modal Info Bisnis.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.formManager = formInfoBisnis;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalInfoBisnisHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    const data = param.data;
    const dataInfoBisnis = data.info_bisnis;
    this.formManager.fillForm(dataInfoBisnis);
  }
}

export { ModalInfoBisnis };
