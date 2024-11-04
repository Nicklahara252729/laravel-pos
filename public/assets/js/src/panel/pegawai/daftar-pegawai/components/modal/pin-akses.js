/**
 * import component form
 */
import { formPinAkses } from '../form/pin-akse.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalPinAkses {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formPinAkses;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalPinAkses']}`);
  }

  /**
   * Handles modal behavior for editing.
   */
  async modalPinAksesHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.modal.modal('show');
  }
}

export { ModalPinAkses };
