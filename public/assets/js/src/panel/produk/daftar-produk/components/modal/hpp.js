/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component table
 */
import { renderHppTable } from '../table/hpp.js';

class ModalHpp {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined component
    this.modal = $(`#${attributeName()[0]['modalHpp']}`);
    this.table = $(`#${attributeName()[0]['tableHpp']}`);
    this.formHpp = $(`#${attributeName()[0]['formHpp']}`);
    this.submitHppButton = $(`#${attributeName()[0]['submitHppButton']}`);
    this.modalInput = $(`#${attributeName()[0]['modalInput']}`);
  }

  /**
   * create hpp object
   */
  createHppObject = () => {
    const hppObj = [];

    // Iterate through the sections
    $(`${this.formHpp.selector} section`).each(function () {
      const section = $(this);

      // Get input values within the section
      const name = section.find('h6').text();
      const avgPrice = section.find('input[name="average_price[]"]').val();

      // Create an object for the variant
      const variant = {
        name: name,
        average_price: avgPrice,
      };

      // Push the variant object to the hpp obj array
      hppObj.push(variant);
    });

    return hppObj;
  };

  /**
   * hpp insert into main modal
   */
  hppTableList = () => {
    this.modal.on('click', this.submitHppButton.selector, () => {
      this.table.toggle(true);
      const hppObj = this.createHppObject();
      renderHppTable(hppObj);
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
    this.hppTableList();
  }
}

export { ModalHpp };
