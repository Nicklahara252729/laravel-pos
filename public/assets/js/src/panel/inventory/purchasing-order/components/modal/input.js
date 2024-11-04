/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formAdd } from '../form/add.js';

/**
 * import component item
 */
import { createBahanInput } from '../item/bahan.js';
import {
  detailElement,
  badgeStatusElement,
  historyLogElement,
  buttonElement,
} from '../item/update.js';

/**
 * import component table
 */
import { tableRowElement } from '../table/pesanan-pembelian.js';

class ModalInput {
  /**
   * Creates a new instance of modal.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formAddManager = formAdd;

    // defined component
    this.modalAdd = $(`#${attributeName()[0]['modalAdd']}`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitInputButton']}`);
    this.updateBahanContainer = $(`#${attributeName()[0]['updateBahanContainer']}`);
    this.modalDetail = $(`#${attributeName()[0]['modalDetail']}`);
    this.modalUpdate = $(`#${attributeName()[0]['modalUpdate']}`);
    this.addBahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
    this.table = $(`#${attributeName()[0]['modalUpdate']} #update-bahan-container table`);
    this.deleteOptionButton = $(`.${attributeName()[0]['deleteOptionButton']}`);
    this.bahanButton = $(`#${attributeName()[0]['bahanButton']}`);
  }

  /**
   * remove option section
   */
  removeOptionSection(modal) {
    const modalActive = modal === 'add' ? this.modalAdd : this.modalUpdate;
    modalActive.on('click', this.deleteOptionButton.selector, function () {
      var section = $(this).closest('section');
      section.remove();
    });
  }

  /**
   * create bahan element
   */
  createBahanElement(bahanObj) {
    this.updateBahanContainer.toggle(true);
    const bahanInput = createBahanInput(bahanObj);
    this.updateBahanContainer.empty();
    this.updateBahanContainer.append(bahanInput);
  }

  /**
   * Handles modal behavior for adding a new daftar produk.
   */
  async modalAddHandler(param) {
    this.addBahanContainer.empty();
    this.addBahanContainer.toggle(false);
    this.formAddManager.setMethod('POST');
    this.formAddManager.setAction(param.url);
    this.formAddManager.emptyForm();
    $(`${this.modalAdd.selector} input[id="nama_outlet"]`).val(param.outletName);
    this.buttonSubmit.text('Simpan PO');
    this.removeOptionSection('add');
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar produk to be edited.
   */
  async modalEditHandler(param) {
    this.modalDetail.modal('hide');
    detailElement(param.data);
    badgeStatusElement(param.data.status);
    historyLogElement(param.data.log);
    buttonElement(param.data.status);
    if (param.data.status.kode === 1) {
      this.createBahanElement(param.data.bahan);
      $(`${this.modalUpdate.selector} ${this.bahanButton.selector}`).text('Tambah Bahan');
      $(`${this.modalUpdate.selector} ${this.bahanButton.selector}`).attr(
        'data-action',
        'tambah bahan'
      );
    } else {
      const tableElement = param.data.pesanan.map((table) => tableRowElement(table)).join('');
      $(`${this.table.selector} tbody`).empty();
      $(`${this.table.selector} tbody`).append(tableElement);
      $(`${this.modalUpdate.selector} ${this.bahanButton.selector}`).text('Update Proses Pesanan');
      $(`${this.modalUpdate.selector} ${this.bahanButton.selector}`).attr(
        'data-action',
        'update proses pesanan'
      );
    }
    this.removeOptionSection('edit');
    this.modalUpdate.modal('show');
  }
}

export { ModalInput };
