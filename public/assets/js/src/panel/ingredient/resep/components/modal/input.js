/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * import component item
 */
import { produkInputEl } from '../item/produk.js';
import { variantInputEl } from '../item/variant.js';
import { createBahanInput } from '../item/bahan.js';

class ModalInput {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalInput']} h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitInputButton']}`);
    this.bahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
    this.produkInput = $(`#${attributeName()[0]['produkInput']}`);
    this.variantInput = $(`#${attributeName()[0]['variantInput']}`);
    this.deleteOptionButton = $(`.${attributeName()[0]['deleteOptionButton']}`);
  }

  /**
   * produk handler
   */
  produkHandler = async (data) => {
    const produkElement = produkInputEl(data);
    this.produkInput.empty();
    this.produkInput.append(`<option selected>Pilih produk</option>`);
    this.produkInput.append(produkElement);
    const choiceElements = document.querySelectorAll(`${this.produkInput.selector}`);
    choiceElements.forEach((element) => {
      new Choices(element);
    });
    const that = this;
    this.produkInput.change(function () {
      const selectedVariant = $(this).val();
      const filteredResults = data.filter((item) => item.uuid_item === selectedVariant);
      const dataVariant = filteredResults[0].variants;
      that.variantHandler(dataVariant);
    });
  };

  /**
   * variant handler
   */
  variantHandler(data) {
    const variantElement = variantInputEl(data);
    this.variantInput.empty();
    this.variantInput.append(variantElement);
    const choiceElements = document.querySelectorAll(`${this.variantInput.selector}`);
    choiceElements.forEach((element) => {
      new Choices(element);
    });
  }

  /**
   * remove option section
   */
  removeOptionSection() {
    this.modal.on('click', this.deleteOptionButton.selector, function () {
      var section = $(this).closest('section');
      section.remove();
    });
  }

  /**
   * create bahan element
   */
  createBahanElement(bahanObj) {
    this.bahanContainer.toggle(true);
    const bahanInput = createBahanInput(bahanObj);
    this.bahanContainer.empty();
    this.bahanContainer.append(bahanInput);
  }

  /**
   * Handles modal behavior for adding a new daftar produk.
   */
  async modalAddHandler(param) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.urlSave);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Resep');
    this.buttonSubmit.text('Tambah Resep');
    this.produkHandler(param.dataProduk);
    this.removeOptionSection();
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.titleModal.text('Edit Resep');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
    this.createBahanElement(param.data.resep);
  }
}

export { ModalInput };
