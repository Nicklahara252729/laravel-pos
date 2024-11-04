/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement } from '../item/detail.js';

/**
 * import component table
 */
import { renderVariantTable } from '../table/variant.js';
import { renderResepTable } from '../table/resep.js';

class ModalDetail {
  constructor() {
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * Handles modal behavior for detail.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalDetailHandler(data) {
    detailElement(data);
    renderVariantTable(data.varian);
    renderResepTable(data.resep);
    this.modalDetail.modal('show');
  }
}

export { ModalDetail };
