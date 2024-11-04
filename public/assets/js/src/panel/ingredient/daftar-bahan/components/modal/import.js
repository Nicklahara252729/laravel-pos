/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formImport } from '../form/import.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalImport {
  /**
   * Creates a new instance of modal import.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formImport;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalImport']}`);
    this.modalOption = $(`#${attributeName()[0]['modalOpsiImport']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitImportButton']}`);
  }

  /**
   * Handles modal behavior for import option ingredient.
   */
  modalOpsiHandler() {
    this.modalOption.modal('show');
  }

  /**
   * Handles modal behavior for import ingredient.
   */
  modalImportHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.modal.modal('show');
    $(`${this.modalOpsiImport.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalOpsiImport.selector} .modal-content`).removeClass('dim');
    });
  }
}

export { ModalImport };
