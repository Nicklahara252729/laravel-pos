/**
 * import process
 */
import { init as readProcess } from '../../process/read.js';

/**
 * import component form
 */
import { FormManager } from '../../../../../../helpers/FormManager.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class FormInput extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.mobileGroup = $(`.${attributeName()[0]['mobileGroup']}`);
    this.backofficeGroup = $(`.${attributeName()[0]['backofficeGroup']}`);
    this.appPermission = attributeName()[0]['appPermission'];
    this.backofficePermission = attributeName()[0]['backofficePermission'];
    this.laporanPenjualan = attributeName()[0]['laporanPenjualan'];
    this.pembayaran = attributeName()[0]['pembayaran'];
    this.produk = attributeName()[0]['produk'];
    this.bahanDanResep = attributeName()[0]['bahanDanResep'];
    this.inventori = attributeName()[0]['inventori'];
    this.pegawai = attributeName()[0]['pegawai'];
    this.outlet = attributeName()[0]['outlet'];
    this.backofficeLaporanPenjualanGroup = $(
      `.${attributeName()[0]['backofficeLaporanPenjualanGroup']}`
    );
    this.backofficePembayaranGroup = $(`.${attributeName()[0]['backofficePembayaranGroup']}`);
    this.backofficeProdukGroup = $(`.${attributeName()[0]['backofficeProdukGroup']}`);
    this.backofficeBahanDanResepGroup = $(`.${attributeName()[0]['backofficeBahanDanResepGroup']}`);
    this.backofficeInventoriGroup = $(`.${attributeName()[0]['backofficeInventoriGroup']}`);
    this.backofficePegawaiGroup = $(`.${attributeName()[0]['backofficePegawaiGroup']}`);
    this.backofficeOutletGroup = $(`.${attributeName()[0]['backofficeOutletGroup']}`);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
    this.mobileGroup.toggle(false);
    $(`${this.mobileGroup.selector} input[type="checkbox"]`).prop('checked', false);
    this.backofficeGroup.toggle(false);
    $(`${this.backofficeGroup.selector} input[type="checkbox"]`).prop('checked', false);
  };

  /**
   * setting form filled
   * @param {*} data
   */
  fillForm(data) {
    this.emptyForm();
    const excludeFields = [];
    $.each(data, (key, value) => {
      if (!excludeFields.includes(key)) {
        const inputElement = $(`[name="${key}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          if (value === 'yes') {
            const idKey = key.replace(/_/g, '-');
            $(`#${idKey}`).prop('checked', true);

            if (idKey === this.appPermission && value === 'yes') {
              this.mobileGroup.toggle(true);
            }

            if (idKey === this.backofficePermission && value === 'yes') {
              this.backofficeGroup.toggle(true);
            }

            if (idKey === this.laporanPenjualan && value === 'yes') {
              this.backofficeLaporanPenjualanGroup.toggle(true);
            }

            if (idKey === this.pembayaran && value === 'yes') {
              this.backofficePembayaranGroup.toggle(true);
            }

            if (idKey === this.produk && value === 'yes') {
              this.backofficeProdukGroup.toggle(true);
            }

            if (idKey === this.bahanDanResep && value === 'yes') {
              this.backofficeBahanDanResepGroup.toggle(true);
            }

            if (idKey === this.inventori && value === 'yes') {
              this.backofficeInventoriGroup.toggle(true);
            }

            if (idKey === this.pegawai && value === 'yes') {
              this.backofficePegawaiGroup.toggle(true);
            }

            if (idKey === this.outlet && value === 'yes') {
              this.backofficeOutletGroup.toggle(true);
            }
          }
          inputElement.val(value);
        }
      }
    });
  }

  /**
   * handling if success
   * @param {*} response
   */
  handleSuccessResponse = async (response) => {
    swalSuccess(response.message, async () => {
      await readProcess();
      this.modal.modal('hide');
      this.emptyForm();
    });
  };

  /**
   * set for post data
   * @returns
   */
  getPostData = () => {
    const formData = this.getFormData();
    const checkboxes = this.form.find('input[type="checkbox"]');

    // Loop through checkboxes and set their values to 1 if checked, 0 if not checked
    checkboxes.each(function () {
      const checkboxName = $(this).attr('name');
      const checkboxValue = $(this).is(':checked') ? 'yes' : '';
      formData.set(checkboxName, checkboxValue);
    });

    return formData;
  };

  /**
   * set for put data
   */
  getPutData = () => {
    const formData = this.getPostData();
    formData.append('_method', 'PUT');
    return formData;
  };

  /**
   * initialize form
   */
  initForm = () => {
    this.submitButton.off('click').on('click', () => {
      this.form.submit();
    });

    this.form.off('submit').on('submit', (e) => {
      e.preventDefault();
      this.submitForm(false);
    });
  };

  /**
   * app permission handler
   */
  appPermissionHandler() {
    $(`#${this.appPermission}`).change(function () {
      this.mobileGroup.toggle(this.checked);
      $(`${this.mobileGroup.selector} input[type="checkbox"]`).prop('checked', this.checked);
    });
  }

  /**
   * backoffice permission handler
   */
  backofficePermissionHandler() {
    $(`#${this.backofficePermission}`).change(function () {
      this.backofficeGroup.toggle(this.checked);
    });

    $(`#${this.laporanPenjualan}`).change(function () {
      this.backofficeLaporanPenjualanGroup.toggle(this.checked);
      $(`${this.backofficeLaporanPenjualanGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.pembayaran}`).change(function () {
      this.backofficePembayaranGroup.toggle(this.checked);
      $(`${this.backofficePembayaranGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.produk}`).change(function () {
      this.backofficeProdukGroup.toggle(this.checked);
      $(`${this.backofficeProdukGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.bahanDanResep}`).change(function () {
      this.backofficeBahanDanResepGroup.toggle(this.checked);
      $(`${this.backofficeBahanDanResepGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.inventori}`).change(function () {
      this.backofficeInventoriGroup.toggle(this.checked);
      $(`${this.backofficeInventoriGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.pegawai}`).change(function () {
      this.backofficePegawaiGroup.toggle(this.checked);
      $(`${this.backofficePegawaiGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });

    $(`#${this.outlet}`).change(function () {
      this.backofficeOutletGroup.toggle(this.checked);
      $(`${this.backofficeOutletGroup.selector} input[type="checkbox"]`).prop(
        'checked',
        this.checked
      );
    });
  }
}

const formInput = new FormInput(
  $(`#${attributeName()[0]['formInput']}`),
  $(`#${attributeName()[0]['modal']}`),
  $(`#${attributeName()[0]['submitButton']}`)
);
export { formInput };
