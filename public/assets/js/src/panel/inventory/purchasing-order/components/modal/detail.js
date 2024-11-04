/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import {
  detailElement,
  badgeStatusElement,
  pesananPembelianElement,
  historyLogElement,
  buttonElement,
} from '../item/detail.js';

class ModalDetail {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalDetail']}`);
  }

  /**
   * Handles modal behavior for detail.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalDetailHandler(data) {
    detailElement(data);
    badgeStatusElement(data.status);
    pesananPembelianElement(data);
    historyLogElement(data.log);
    buttonElement(data.status);
    this.modal.modal('show');
  }
}

export { ModalDetail };
