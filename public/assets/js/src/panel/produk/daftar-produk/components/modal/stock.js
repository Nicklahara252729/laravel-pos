/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { renderStockTable } from '../table/stock.js';

class ModalStock {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defiend component
    this.modal = $(`#${attributeName()[0]['modalStock']}`);
    this.table = $(`#${attributeName()[0]['tableStock']}`);
    this.formStock = $(`#${attributeName()[0]['formStock']}`);
    this.submitVariantStockButton = $(`#${attributeName()[0]['submitVariantStockButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * create stock object
   */
  createStockObject = () => {
    const stockObj = [];

    // Iterate through the sections
    $(`${this.formStock.selector} section`).each(function () {
      const section = $(this);

      // Get input values within the section
      const name = section.find('h6').text();
      const currentStock = section.find('input[name="current_stock[]"]').val();
      const minimalStock = section.find('input[name="minimal_stock[]"]').val();

      // Create an object for the variant
      const variant = {
        name: name,
        current_stock: currentStock,
        minimal_stock: minimalStock,
      };

      // Push the variant object to the stock obj array
      stockObj.push(variant);
    });

    return stockObj;
  };

  /**
   * stock insert into main modal
   */
  stockTableList = () => {
    this.modal.on('click', this.submitVariantStockButton.selector, () => {
      this.table.toggle(true);
      const stockObj = this.createStockObject();
      renderStockTable(stockObj);
      this.modal.modal('hide');
    });
  };

  /**
   * Handles modal behavior for variant.
   */
  addModalHandler() {
    /**
     * modal opened
     */
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });

    /**
     * callback method
     */
    this.stockTableList();
  }
}

export { ModalStock };
