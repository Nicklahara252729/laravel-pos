/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * Represents a modal input handler for tax produk.
 *
 * @class
 */
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
    this.titleModal = $(`#${attributeName()[0]['modalInput']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.outletContainer = $(`.${attributeName()[0]['assignOutletContainer']}`);
    this.waktuPromoContainer = $(`#${attributeName()[0]['waktuPromoContainer']}`);
    this.salesTypeContainer = $(`.${attributeName()[0]['salesTypeContainer']}`);
    this.itemContainer = $(`.${attributeName()[0]['assignItemContainer']}`);
    this.salesType = $(`#${attributeName()[0]['salesType']}`);
    this.containerCertain = $(`#${attributeName()[0]['containerCertain']}`);
    this.configTime = $(`#${attributeName()[0]['configTime']}`);
  }

  /**
   * sales type handler
   */
  salesTypeHandler = () => {
    $(`${this.salesType.selector} input[name="sales_type"]`).on('click', function () {
      const values = $(this).val();
      if (values === 'certain') {
        this.containerCertain.empty();
        const containerCertain = `<button class="btn btn-primary waves-effect waves-light btn-block" type="button"
        id="assign-tipe-penjualan-button">Kelola Assign Tipe Penjualan</button>`;
        this.containerCertain.append(containerCertain);
      } else {
        this.containerCertain.empty();
      }
    });
  };

  /**
   * konnfigurasi promo handler
   */
  konfigurasiPromoHandler() {
    this.configTime.change((event) => {
      this.waktuPromoContainer.toggle(event.target.checked);
    });
  }

  /**
   * Handles modal behavior for adding a new tax produk.
   */
  modalAddHandler(url) {
    this.outletContainer.toggle(false);
    this.waktuPromoContainer.toggle(false);
    this.salesTypeContainer.toggle(false);
    this.itemContainer.toggle(false);
    this.formManager.setMethod('POST');
    this.formManager.setAction(url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Promo');
    this.buttonSubmit.text('Simpan');
    this.salesTypeHandler();
    this.konfigurasiPromoHandler();
  }

  /**
   * Handles modal behavior for editing an existing tax produk.
   *
   * @param {string} param - The unique identifier of the tax produk to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.data);
    this.titleModal.text('Edit Promo');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
