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
import { stockElement } from '../table/stock.js';
import { bahanElement } from '../table/bahan.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalDetail {
  /**
   * Creates a new instance of modal import.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalDetail']}`);
    this.stockTable = $(`#${attributeName()[0]['tableStock']} tbody`);
    this.bahanTable = $(`#${attributeName()[0]['tableBahan']} tbody`);
  }

  /**
   * Handles modal behavior for import ingredient.
   */
  modalDetailHandler(data) {
    detailElement(data);

    const stocks = data.stock;
    const stockEl = stocks.map((table) => stockElement(table)).join('');
    this.stockTable.empty();
    this.stockTable.append(stockEl);

    const ingredients = data.bahan;
    const bahanEl = ingredients.map((table) => bahanElement(table)).join('');
    this.bahanTable.empty();
    this.bahanTable.append(bahanEl);

    this.modal.modal('show');
  }
}

export { ModalDetail };
