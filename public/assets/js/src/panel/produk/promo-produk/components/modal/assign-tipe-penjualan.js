/**
 * import component
 */
import { attributeName } from '../attribute/attribute-name.js';
import { tipePenjualanItemEl, listingTipePenjualan } from '../item/assign-tipe-penjualan.js';

class ModalTipePenjualan {
  /**
   * Creates a new instance of modal assign item.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalAssignTipePenjualan']}`);
    this.container = $(`.${attributeName()[0]['salesTypeContainer']}`);
    this.salesTypeEl = $(`#${attributeName()[0]['tipePenjualanAssignList']}`);
    this.searchTipePenjualanList = $(`#${attributeName()[0]['searchTipePenjualanList']}`);
    this.submitAssignTipePenjualanButton = $(
      `#${attributeName()[0]['submitAssignTipePenjualanButton']}`
    );
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render product list
   */
  async renderSalesTypeList(items) {
    this.salesTypeEl.empty();
    const salesTypeItems = items.map((item) => {
      return tipePenjualanItemEl(item);
    });

    if (salesTypeItems.length > 0) {
      this.salesTypeEl.append(salesTypeItems.join(''));
    } else {
      this.salesTypeEl.append(
        '<p class="text-gray-500 text-center">Tidak dapat menemukan tipe penjualan</p>'
      );
    }
  }

  /**
   * filter sales type list
   */
  filterSalesTypeList = () => {
    this.searchTipePenjualanList.on('keyup', () => {
      const searchValue = this.searchTipePenjualanList.val().toLowerCase();
      let productsFound = false;

      $(`${this.salesTypeEl.selector} li`).filter((index, listItem) => {
        const label = $(listItem).find('label').text().toLowerCase();
        const shouldHide = !label.includes(searchValue);
        if (!shouldHide) {
          productsFound = true;
        }
        $(listItem).toggleClass('hidden', shouldHide);
      });

      if (!productsFound) {
        this.searchTipePenjualanList.append(
          '<li class="blank-state"><p class="text-gray-500 text-center">Tidak dapat menemukan tipe penjualan.</p></li>'
        );
      } else {
        $(`${this.searchTipePenjualanList.selector} li.blank-state`).remove();
      }
    });
  };

  /**
   * create option object
   */
  createSalesTypeObject = () => {
    let salesTypeObj = [];

    // Iterate through the sections
    $(`${this.salesTypeEl.selector} li input[name="uuid_sales_type[]"]`).change(function () {
      const salesType = $(this).data('sales_type');
      // Get input values within the section
      if (this.checked) {
        // Add the sales type if it is checked and not already in the array
        if (!salesTypeObj.some((o) => o.salesType === salesType)) {
          salesTypeObj.push({ salesType: salesType });
        }
      } else {
        // Remove the sales type if it is unchecked
        salesTypeObj = salesTypeObj.filter((o) => o.salesType !== salesType);
      }
    });

    return salesTypeObj;
  };

  /**
   * outlet insert into main modal
   */
  outletList = (salesTypeObj) => {
    this.modal.on('click', this.submitAssignTipePenjualanButton.selector, () => {
      this.container.toggle(true);
      listingTipePenjualan(salesTypeObj);
      this.modal.modal('hide');
    });
  };

  /**
   * open modal handler
   */
  async openModalHandler(param) {
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });
    await this.renderSalesTypeList(param.dataSalesType);
    this.filterSalesTypeList();
    const salesTypeObj = this.createSalesTypeObject();
    this.outletList(salesTypeObj);
  }
}

export { ModalTipePenjualan };
