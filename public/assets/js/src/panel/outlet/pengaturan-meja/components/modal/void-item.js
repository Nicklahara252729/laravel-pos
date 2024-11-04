/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component widget
 */
import { widgetTotalElement } from '../widget/void-item.js';

/**
 * import component table
 */
import { voidTableElement } from '../table/void-item.js';

class ModalVoidItem {
  /**
   * Creates a new instance of modalVoidItem.
   *
   * @constructor
   */
  constructor() {
    this.modal = $(`#${attributeName()[0]['modalVoidItem']}`);
    this.table = $(`#${attributeName()[0]['tableVoid']} tbody`);
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalOpenHandler(data) {
    this.modal.modal('show');
    const dataWidget = {
      product_cancel: data.product_cancel,
      total_price: data.total_price,
    };
    widgetTotalElement(dataWidget);
    const rowData = data.rows;
    this.table.empty();
    const tableElement = rowData.map((table) => voidTableElement(table)).join('');
    this.table.append(tableElement);
  }
}

export { ModalVoidItem };
