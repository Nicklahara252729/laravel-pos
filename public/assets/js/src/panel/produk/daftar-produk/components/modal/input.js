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
import { kategoriInputEl } from '../item/kategori.js';
import { salesTypeInputEl } from '../item/tipe-penjualan.js';
import { createModifier } from '../item/modifier.js';

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
    this.kategoriInput = $(`#${attributeName()[0]['kategoriInput']}`);
    this.choiceSelect = $(`.${attributeName()[0]['choiceSelect']}`);
    this.salesTypeSwitch = $(`#${attributeName()[0]['salesTypeSwitch']}`);
    this.variantSwitch = $(`#${attributeName()[0]['variantSwitch']}`);
    this.salesTypeInputList = $(`#${attributeName()[0]['salesTypeInputList']}`);
    this.salesTypeInputContainer = $(`#${attributeName()[0]['salesTypeInputContainer']}`);
    this.priceInputContainer = $(`#${attributeName()[0]['priceInputContainer']}`);
    this.stockSwitch = $(`#${attributeName()[0]['stockSwitch']}`);
    this.multiVariantStockInputContainer = $(
      `#${attributeName()[0]['multiVariantStockInputContainer']}`
    );
    this.singleVariantStockInputContainer = $(
      `#${attributeName()[0]['singleVariantStockInputContainer']}`
    );
    this.hppSwitch = $(`#${attributeName()[0]['hppSwitch']}`);
    this.hppInputContainer = $(`#${attributeName()[0]['hppInputContainer']}`);
    this.multiVariantHppInputContainer = $(
      `#${attributeName()[0]['multiVariantHppInputContainer']}`
    );
    this.singleVariantHppInputContainer = $(
      `#${attributeName()[0]['singleVariantHppInputContainer']}`
    );
    this.variantInputContainer = $(`#${attributeName()[0]['variantInputContainer']}`);
    this.priceInputContainer = $(`#${attributeName()[0]['priceInputContainer']}`);
    this.modifierInputContainer = $(`#${attributeName()[0]['modifierInputContainer']}`);
  }

  /**
   * kategori handler
   */
  kategoriHandler = async (data) => {
    const kategoriElement = kategoriInputEl(data);
    this.kategoriInput.empty();
    this.kategoriInput.append(kategoriElement);
    const choiceElements = document.querySelectorAll(this.choiceSelect.selector);
    choiceElements.forEach((element) => {
      new Choices(element);
    });
  };

  /**
   * sales type switch handler
   */
  salesTypeSwitchHandler = (data) => {
    $(`${this.salesTypeSwitch.selector} input[name="sales_type"]`).change(function () {
      const value = this.checked;
      const variantSwitch = $(`${this.variantSwitch.selector} :input`);
      let variantSwitchValue = null;
      variantSwitch.each(function () {
        variantSwitchValue = this.checked;
      });

      if (variantSwitchValue === false) {
        if (value === true) {
          const salesTypeElement = salesTypeInputEl(data);
          this.salesTypeInputList.append(salesTypeElement);
          this.salesTypeInputContainer.show();
          this.priceInputContainer.hide();
        } else {
          this.salesTypeInputList.empty();
          this.salesTypeInputContainer.hide();
          this.priceInputContainer.show();
        }
      }
    });
  };

  /**
   * stock switch handler
   */
  stockSwitchHandler = () => {
    $(`${this.stockSwitch.selector} input[name="stock"]`).change(function (event) {
      const value = event.target.checked;
      const getVariant = localStorage.getItem('alvaDaftarProdukVariant');
      if (getVariant > 0) {
        this.multiVariantStockInputContainer.toggle(value);
      } else {
        this.singleVariantStockInputContainer.toggle(value);
      }

      /**
       * hpp handler
       */
      const hppTitle = $(`${this.hppSwitch.selector} h6`).get(0).classList;
      const hppInput = $(`${this.hppSwitch.selector} :input`);
      const hppLabel = $(`${this.hppSwitch.selector} div label div`);
      const hppSmallText = $(`${this.hppSwitch.selector} small`);

      if (value === true) {
        hppTitle.remove('text-muted');
        hppInput.removeAttr('disabled');
        hppSmallText.get(0).classList.remove('text-danger');
        hppSmallText.get(0).classList.add('text-warning');
        hppSmallText.text(
          'Harga pokok penjualan tidak dapat diubah setelah disimpan. Isi dengan hati-hati'
        );
      } else {
        hppTitle.add('text-muted');
        hppInput.attr('disabled', true);
        hppLabel.remove(
          'peer',
          'peer-focus:ring-4',
          'peer-focus:ring-blue-300',
          'peer-checked:after:translate-x-full',
          'peer-checked:after:border-white',
          'peer-checked:bg-blue-600'
        );
        hppSmallText.get(0).classList.remove('text-warning');
        hppSmallText.get(0).classList.add('text-danger');
        hppSmallText.text(
          'Harga pokok penjualan tidak dapat diaktifkan sebelum lacak stok barang aktif'
        );
        this.hppInputContainer.toggle(false);
      }
    });
  };

  /**
   * hpp switch handler
   */
  hppSwitchHandler = () => {
    $(`${this.hppSwitch.selector} :input`).change(function (event) {
      const value = event.target.checked;
      const isVariant = localStorage.getItem('alvaDaftarProdukVariant');
      const stockSwitch = $(`#${attributeName()[0]['stockSwitch']} span`);
      if (isVariant > 0) {
        value === true
          ? stockSwitch.text(
              'Stok produk tidak dapat diubah setelah disimpan. Isi dengan hati-hati'
            )
          : stockSwitch.text('');
        this.multiVariantHppInputContainer.toggle(value);
      } else {
        this.singleVariantHppInputContainer.toggle(value);
      }
    });
  };

  /**
   * variant switch handler
   */
  variantSwitchHandler = () => {
    $(`#${attributeName()[0]['variantSwitch']} :input`).change(function (event) {
      const value = event.target.checked;
      const priceEvent = value === true ? false : true;
      this.variantInputContainer.toggle(value);
      this.priceInputContainer.toggle(priceEvent);
    });
  };

  /**
   * modifier handler
   */
  modifierHandler = (datas) => {
    const modifier = datas.length;
    if (modifier > 0) {
      const modifierElement = createModifier(datas);
      this.modifierInputContainer.toggle(true);
      $(`${this.modifierInputContainer.selector} div`).append(modifierElement);
    }
  };

  /**
   * Handles modal behavior for adding a new daftar produk.
   */
  async modalAddHandler(param) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.urlSaveProduk);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Produk');
    this.buttonSubmit.text('Simpan');
    this.kategoriHandler(param.dataKategoriProduk);
    this.salesTypeSwitchHandler(param.dataTipePenjualan);
    this.stockSwitchHandler();
    this.hppSwitchHandler();
    this.variantSwitchHandler();
    this.modifierHandler(param.dataModifier);
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
    this.titleModal.text('Edit Produk');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
  }
}

export { ModalInput };
