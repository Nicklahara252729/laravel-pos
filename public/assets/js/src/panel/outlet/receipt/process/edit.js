/**
 * import repositories
 */
import { updateReceiptAPI } from '../repositories/repositories.js';

/**
 * import component form
 */
import { formInput } from '../components/form/input.js';

class Edit {
  /**
   * Creates a new instance of edit.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formInput;
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async editHandler() {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(updateReceiptAPI());
  }
}

export { Edit };
