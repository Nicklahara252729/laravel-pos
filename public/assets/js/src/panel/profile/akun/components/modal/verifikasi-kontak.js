/**
 * import component form
 */
import { formverifikasiKontak } from "../form/verifikasi-kontak.js";

class ModalVerifikasiKontak {
  /**
   * Creates a new instance of ModalVerifikasiKontak.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formverifikasiKontak;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalVerifikasiHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
  }
}

export { ModalVerifikasiKontak };
