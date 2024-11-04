/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement } from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * open detail modal
   */
  modalDetailPajakProduk(data) {
    this.modalDetail.modal('show');
    detailElement(data);
  }
}

export { ModalDetail };
