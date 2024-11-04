/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import comonent item
 */
import { detailElement } from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance of atur meja modal.
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
  modalDetailProdukGratifikasi(data) {
    this.modalDetail.modal('show');
    detailElement(data);
  }
}

export { ModalDetail };
