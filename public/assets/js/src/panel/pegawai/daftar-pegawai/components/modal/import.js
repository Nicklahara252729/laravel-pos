/**
 * import component form
 */
import { formImport } from '../form/import.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalImport {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formImport;

    // defined compoent
    this.modal = $(`#${attributeName()[0]['modalImport']}`);
  }

  /**
   * Handles modal behavior for import.
   */
  modalImportHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.modal.modal('show');
  }
}

export { ModalImport };
