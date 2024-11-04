/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component item
 */
import { productItemEl, listingItem } from '../item/assign-item.js';

class ModalAssignItem {
  /**
   * Creates a new instance of modal assign item.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalAssignItem']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitAssignItemButton']}`);
    this.container = $(`.${attributeName()[0]['assignItemContainer']}`);
    this.productEl = $(`#${attributeName()[0]['productList']}`);
    this.searchProductList = $(`#${attributeName()[0]['searchProductList']}`);
    this.deleteItemButton = $(`.${attributeName()[0]['deleteItemButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * render product list
   */
  async renderProductList(items) {
    this.productEl.empty();
    const productItems = items.map((item) => {
      return productItemEl(item);
    });
    if (productItems.length > 0) {
      this.productEl.append(productItems.join(''));
    } else {
      this.productEl.append(
        '<p class="text-gray-500 text-center">Tidak dapat menemukan produk</p>'
      );
    }
  }

  /**
   * filter product list
   */
  filterProductList = () => {
    this.searchProductList.on('keyup', () => {
      const searchValue = this.searchProductList.val().toLowerCase();
      let productsFound = false;

      $(`${this.productEl.selector} li`).filter((index, listItem) => {
        const label = $(listItem).find('label').text().toLowerCase();
        const shouldHide = !label.includes(searchValue);
        if (!shouldHide) {
          productsFound = true;
        }
        $(listItem).toggleClass('hidden', shouldHide);
      });

      if (!productsFound) {
        this.searchProductList.append(
          '<li class="blank-state"><p class="text-gray-500 text-center">Tidak dapat menemukan produk.</p></li>'
        );
      } else {
        $(`${this.searchProductList.selector} li.blank-state`).remove();
      }
    });
  };

  /**
   * create option object
   */
  createOptionsObject = () => {
    let itemObj = [];

    // Iterate through the sections
    $(`${this.productEl.selector} li input[name="uuid_item[]"]`).change(function () {
      const item = $(this).data('item');
      const itemValue = $(this).val();

      // Get input values within the section
      if (this.checked) {
        // Add the item if it is checked and not already in the array
        if (!itemObj.some((o) => o.item === item)) {
          itemObj.push({ item: item, uuid_item: itemValue });
        }
      } else {
        // Remove the item if it is unchecked
        itemObj = itemObj.filter((o) => o.item !== item);
      }
    });

    return itemObj;
  };

  /**
   * item insert into main modal
   */
  itemList = (itemObj) => {
    this.modal.on('click', this.buttonSubmit.selector, () => {
      this.container.toggle(true);
      listingItem(itemObj);
      this.modal.modal('hide');
    });
  };

  /**
   * remove option section
   */
  removeItemSection() {
    this.container.on('click', this.deleteItemButton.selector, function () {
      var section = $(this).closest('section');
      section.remove();
    });
  }

  /**
   * open modal handler
   */
  async openModalHandler(param) {
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });
    await this.renderProductList();
    this.filterProductList();
    const itemObj = this.createOptionsObject(param.dataProduk);
    this.itemList(itemObj);
    this.removeItemSection();
  }
}

export { ModalAssignItem };
