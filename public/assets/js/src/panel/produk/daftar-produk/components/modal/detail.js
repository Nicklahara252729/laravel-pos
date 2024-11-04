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
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * Handles modal behavior for detail.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalDetailHandler(data) {
    detailElement(data);
    this.modalDetail.modal('show');
  }
}

export { ModalDetail };
