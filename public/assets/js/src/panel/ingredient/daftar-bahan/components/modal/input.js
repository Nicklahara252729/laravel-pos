/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * Represents a modal input handler for daftar bahan.
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
    this.titleModal = $(`#${attributeName()[0]['modalInput']} h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitInputButton']}`);
    this.stockSwitch = $(`#${attributeName()[0]['stockSwitch']} :input`);
    this.hppSwitch = $(`#${attributeName()[0]['hppSwitch']} :input`);
    this.hppContainer = $(`#${attributeName()[0]['hppInputContainer']}`);
    this.switchContainer = $(`#${attributeName()[0]['stockInputContainer']}`);
    this.kategoriInput = $(`#${attributeName()[0]['kategoriInput']}`);
    this.choiceSelect = $(`.${attributeName()[0]['choiceSelect']}`);
  }

  /**
   * satuan pengukuran handler
   */
  satuanHandler = async (data) => {
    this.kategoriInput.empty();
    const choiceElements = document.querySelectorAll(this.choiceSelect.selector);
    choiceElements.forEach((element) => {
      new Choices(element);
    });
  };

  /**
   * hpp switch handler
   */
  hppSwitchHandler = () => {
    const that = this;
    this.hppSwitch.change(function (event) {
      const isSwitch = localStorage.getItem('alvaDaftarBahanSwitch');
      const value = event.target.checked;
      that.hppContainer.toggle(value);
      if (isSwitch === 'false' || isSwitch === 'null') {
        $(`${that.hppContainer.selector} :input`).attr('disabled', true);
      } else {
        $(`${that.hppContainer.selector} :input`).attr('disabled', false);
      }
    });
  };

  /**
   * stock switch handler
   */
  stockSwitchHandler = () => {
    const that = this;
    this.stockSwitch.change(function (event) {
      const value = event.target.checked;
      localStorage.setItem('alvaDaftarBahanSwitch', value);
      that.switchContainer.toggle(value);
      if (value === true) {
        $(`${that.hppContainer.selector} :input`).attr('disabled', false);
      } else {
        $(`${that.hppContainer.selector} :input`).attr('disabled', true);
      }
    });
  };

  /**
   * Handles modal behavior for adding a new daftar bahan.
   */
  async modalAddHandler(param) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.url);
    this.formManager.emptyForm();
    this.titleModal.text(param.title);
    this.buttonSubmit.text('Tambah bahan');
    this.modal.modal('show');
    this.satuanHandler();
    this.hppSwitchHandler();
    this.stockSwitchHandler();
    localStorage.setItem('alvaDaftarBahanSwitch', false);
  }

  /**
   * Handles modal behavior for editing an existing daftar bahan.
   *
   * @param {string} param - The unique identifier of the daftar bahan to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    this.formManager.fillForm(param.getDaftarBahan);
    this.titleModal.text(param.title);
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
