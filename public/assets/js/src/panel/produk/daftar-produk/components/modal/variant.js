/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { createVariantInput, createVariantSalesTypeInput } from '../item/variant.js';
import { createStockInput } from '../item/stock.js';
import { createHppInput } from '../item/hpp.js';

/**
 * import component table
 */
import { renderVariantTable } from '../table/variant.js';
import { renderSalesTypeTable } from '../table/sales-type.js';

class ModalVariant {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalVariant']}`);
    this.list = $(`#${attributeName()[0]['formVariant']} div`);
    this.salesTypeSwitch = $(`#${attributeName()[0]['salesTypeSwitch']}`);
    this.formVariant = $(`#${attributeName()[0]['formVariant']}`);
    this.addVariantButton = $(`#${attributeName()[0]['addVariantButton']}`);
    this.deleteVariantItemButton = $(`.${attributeName()[0]['deleteVariantItemButton']}`);
    this.submitVariantButton = $(`#${attributeName()[0]['submitVariantButton']}`);
    this.tableSalesType = $(`#${attributeName()[0]['tableSalesType']}`);
    this.tableVariant = $(`#${attributeName()[0]['tableVariant']}`);
    this.formStock = $(`#${attributeName()[0]['formStock']}`);
    this.formHpp = $(`#${attributeName()[0]['formHpp']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * sales type input
   * @param {*} param
   * @returns
   */
  salesTypeInput = () => {
    const salesTypeValue = $(`${this.salesTypeSwitch.selector} :input`);
    let salesTypeSwitchValue = null;
    salesTypeValue.each(function () {
      salesTypeSwitchValue = this.checked;
    });
    return salesTypeSwitchValue;
  };

  /**
   * variant input
   */
  variantInput = (param) => {
    const variantInput = this.salesTypeInput()
      ? createVariantSalesTypeInput(param.salesType)
      : createVariantInput(param.name, param.price, param.index);
    return variantInput;
  };

  /**
   * render section input
   */
  renderSectionsInput = (varianObj, dataTipePenjualan) => {
    // Create sections based on variants object
    const sections = varianObj.map((variant, index) =>
      this.variantInput({
        salesType: dataTipePenjualan,
        name: variant.name,
        price: variant.price,
        index: index,
      })
    );

    // Append sections to the variant input list
    this.list.append(sections);
  };

  /**
   * create variant object
   */
  createVariantObject = (dataTipePenjualan) => {
    const varianObj = [];
    const that = this; // Capture the class context

    // Iterate through the sections
    $(`${this.formVariant.selector} div section`).each(function () {
      const section = $(this);
      const variantName = section.find('input[name="variant_name[]"]').val();
      let variant = {};

      if (that.salesTypeInput()) {
        // Get input values within the section
        let price = {};
        let salesType = {};
        dataTipePenjualan.forEach(function (item, index) {
          salesType[index] = item.sales_type_name;
          price[index] = section.find(`input[id="sales-type-input-${index}"]`).val();
        });

        // Create an object for the variant
        variant = {
          name: variantName,
          salesType: salesType,
          price: price,
        };
      } else {
        // Get input values within the section
        const variantPrice = section.find('input[name="variant_price[]"]').val();

        // Create an object for the variant
        variant = {
          name: variantName,
          price: variantPrice,
        };
      }

      // Push the variant object to the varianObj array
      varianObj.push(variant);
    });
    return varianObj;
  };

  /**
   * add new variant section
   */
  addVariantSection(dataTipePenjualan) {
    this.addVariantButton.on('click', (event) => {
      event.preventDefault();
      const varianObj = this.createVariantObject(dataTipePenjualan);
      this.list.append(this.renderSectionsInput(varianObj, dataTipePenjualan));
    });
  }

  /**
   * remove variant section
   */
  removeVariantSection() {
    this.modal.on('click', this.deleteVariantItemButton.selector, function () {
      var section = $(this).closest('section');
      section.remove();
    });
  }

  /**
   * variant insert into main modal
   */
  variantTableList = (dataTipePenjualan) => {
    this.modal.on('click', this.submitVariantButton.selector, () => {
      const table = this.salesTypeInput() ? this.tableSalesType : this.tableVariant;
      table.toggle(true);
      const varianObj = this.createVariantObject(dataTipePenjualan);

      this.salesTypeInput() ? renderSalesTypeTable(varianObj) : renderVariantTable(varianObj);
      const stocks = createStockInput(varianObj);
      this.formStock.empty();
      this.formStock.append(stocks);

      const hpp = createHppInput(varianObj);
      this.formHpp.empty();
      this.formHpp.append(hpp);

      this.modal.modal('hide');
      localStorage.setItem('alvaDaftarProdukVariant', varianObj.length);
    });
  };

  /**
   * Handles modal behavior for variant.
   */
  addModalHandler(dataTipePenjualan) {
    /**
     * modal opened
     */
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });

    /**
     * render variant list
     */
    const variantInput = this.variantInput({ salesType: dataTipePenjualan });
    this.list.empty();
    this.list.append(variantInput);

    /**
     * callback method
     */
    this.addVariantSection(dataTipePenjualan);
    this.removeVariantSection();
    this.variantTableList(dataTipePenjualan);
  }
}

export { ModalVariant };
