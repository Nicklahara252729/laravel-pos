/**
 * import component item
 */
import { gratuityInputItemElement } from '../item/gratuity-item.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

class ModalInput {
  /**
   * Creates a new instance of modal input.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalInput']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.gratuityList = $(`#${attributeName()[0]['gratuityList']}`);
  }

  /**
   * render gratuity
   */
  async renderGratuitites(getGratuities, uuidData = null) {
    const gratuityItems = gratuityInputItemElement(getGratuities, uuidData);
    this.gratuityList.empty();
    this.gratuityList.append(gratuityItems);
  }

  /**
   * Handles modal behavior for adding a new tipe penjualan produk.
   */
  async modalAddHandler(url) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Tipe Penjualan');
    this.buttonSubmit.text('Simpan');
    await this.renderGratuitites();
  }

  /**
   * Handles modal behavior for editing an existing kategori produk.
   *
   * @param {string} param - The unique identifier of the kategori produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    const tipePenjualan = param.data;
    this.formManager.fillForm(tipePenjualan);
    this.titleModal.text('Edit Tipe Penjualan');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
    const gratuity = tipePenjualan.gratuity;
    await this.renderGratuitites(gratuity);
  }
}

export { ModalInput };
