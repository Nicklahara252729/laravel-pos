/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { detailElement, itemElement } from '../item/detail.js'

/**
 * Represents a modal input handler.
 *
 * @class
 */
class ModalDetail {
  /**
   * Creates a new instance.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.produkItem = $(`#${attributeName()[0]['produkItem']}`);
  }

  /**
   * open detail modal
   */
  modalDetailKategoriProduk(data) {
    const item = typeof data == 'undefined' ? [] : data.item;
    this.modalDetail.modal('show');
    detailElement(data);
    this.produkItem.empty();
    const itemHandler = item.map((items) => itemElement(items)).join('');
    this.produkItem.append(itemHandler);
  }
}

export { ModalDetail };
