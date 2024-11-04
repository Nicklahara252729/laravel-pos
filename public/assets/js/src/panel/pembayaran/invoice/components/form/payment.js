/**
 * import process
 */
import { init as readProcess } from '../../process/read.js';

/**
 * import helper
 */
import { FormManager } from '../../../../../../helpers/FormManager.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class FormPayment extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.detailButtonContainer = $(`.${attributeName()[0]['detailButtonContainer']}`);
    this.submitPaymentInvoiceButton = $(`#${attributeName()[0]['submitPaymentInvoiceButton']}`);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
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
      this.detailButtonContainer.toggle(true);
      this.submitPaymentInvoiceButton.addClass('d-none');
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
    return formData;
  };

  /**
   * set for put data
   * @returns
   */
  getPutData = (total) => {
    const formData = this.getPostData();
    formData.append('total_tagihan', total);
    formData.append('_method', 'PUT');
    return formData;
  };

  /**
   * payment preview
   */
  paymentPreview = (total) => {
    this.getPutData(total);
    const paymentData = this.getFormData();
    const data = {};

    paymentData.forEach((value, key) => {
      data[key] = value;
    });

    return data;
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
}

const formPayment = new FormPayment(
  $(`#${attributeName()[0]['formPayment']}`),
  $(`#${attributeName()[0]['modalPayment']}`),
  $(`#${attributeName()[0]['submitPaymentInvoiceButton']}`)
);
export { formPayment };
