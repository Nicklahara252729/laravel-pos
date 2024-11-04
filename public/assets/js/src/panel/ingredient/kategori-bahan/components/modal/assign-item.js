/**
 * import repositories
 */
import { getDaftarProdukByKategoriAPI } from '../../../../produk/daftar-produk/repositories/repositories.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formAssignItem } from '../form/assign-item.js';

/**
 * import compoent item
 */
import { productItemEl } from '../item/assign-item.js';

class ModalAssignItem {
  /**
   * Creates a new instance of modal assign item.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formAssignItem;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalAssignItem']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitAssignItemButton']}`);
    this.productList = $(`#${attributeName()[0]['productList']}`);
    this.searchProductList = $(`#${attributeName()[0]['searchProductList']}`);
  }

  /**
   * render product list
   */
  async renderProductList(uuidKategori) {
    const items = await getDaftarProdukByKategoriAPI(uuidKategori);

    this.productList.empty();
    const productItems = items.map((item) => {
      return productItemEl(item);
    });
    
    if (productItems.length > 0) {
      this.productList.append(productItems.join(''));
    } else {
      this.productList.append(
        '<p class="text-gray-500 text-center">Tidak dapat menemukan produk</p>'
      );
    }
  }

  /**
   * filter product list
   */
  filterProductList = () => {
    this.searchProductList.on('keyup', () => {
      this.searchProductList.val().toLowerCase();
      let productsFound = false;

      $(`${this.productList.selector} li`).filter((index, listItem) => {
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
   * open modal handler
   */
  async openModalHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.modal.modal('show');
    await this.renderProductList(param.uuid);
    this.filterProductList();
    // const dataDaftarPegawai = await getDaftarPegawaiByIdAPI(param.uuidUser);
    // this.formManager.fillForm(dataDaftarPegawai);
    // this.roleSelected = dataDaftarPegawai.uuid_access;
  }
}

export { ModalAssignItem };
