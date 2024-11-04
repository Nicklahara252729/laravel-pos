/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { bahanElement } from '../table/bahan.js';

/**
 * Represents a modal input handler for kategori produk.
 *
 * @class
 */
class ModalResep {
  /**
   * Creates a new instance of modal import.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalResep']}`);
    this.bahanContainer = $(`#${attributeName()[0]['bahanContainer']}`);
    this.bahanTable = $(`#${attributeName()[0]['resepContainer']} table`);
    this.submitResepButton = $(`#${attributeName()[0]['submitResepButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * create hpp object
   */
  createResepObject = () => {
    const resepObj = [];
    $(`${this.bahanContainer.selector} section`).each(function () {
      const section = $(this);
      const bahan = section.find('input[name="nama_bahan[]"]').val();
      const jumlah = section.find('input[name="jumlah[]"]').val();
      const satuan = section.find('input[name="satuan[]"]').val();
      const hpp = section.find('input[name="hpp[]"]').val();
      const resep = {
        bahan: bahan,
        jumlah: jumlah,
        satuan: satuan,
        hpp: hpp,
      };
      resepObj.push(resep);
    });

    return resepObj;
  };

  /**
   * resep insert into main modal
   */
  resepTableList = () => {
    this.modal.on('click', this.submitResepButton.selector, () => {
      this.bahanTable.toggle(true);
      const resepObj = this.createResepObject();
      const ingredients = resepObj;
      const bahanEl = ingredients.map((table) => bahanElement(table)).join('');
      $(`${this.bahanTable.selector} tbody`).empty();
      $(`${this.bahanTable.selector} tbody`).append(bahanEl);
      this.modal.modal('hide');
    });
  };

  /**
   * Handles modal behavior for import ingredient.
   */
  modalResepHandler() {
    this.bahanContainer.empty();
    this.modal.modal('show');
    $(`${this.modalInput.selector} .modal-content`).addClass('dim');
    this.modal.on('hide.bs.modal', () => {
      $(`${this.modalInput.selector} .modal-content`).removeClass('dim');
    });
    this.resepTableList();
  }
}

export { ModalResep };
