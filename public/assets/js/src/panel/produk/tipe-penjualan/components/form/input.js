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

class FormInput extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.isActive = $(`#${attributeName()[0]['isActive']}`);
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
        const keyElement = key === 'gratuity' ? 'uuid_gratuity[]' : key;
        const inputElement = $(`[name="${keyElement}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          if (value === 'active') {
            this.isActive.prop('checked', true);
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
   * sales status handler
   */
  salesStatusHandler = () => {
    const isActive = this.isActive.prop('checked');
    const status = isActive ? 'active' : 'inactive';
    return status;
  };

  /**
   * set for post data
   * @returns
   */
  getPostData = () => {
    const formData = this.getFormData();
    const salesStatus = this.salesStatusHandler();
    formData.delete('sales_status');
    formData.append('sales_status', salesStatus);
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
}

const formInput = new FormInput(
  $(`#${attributeName()[0]['formInput']}`),
  $(`#${attributeName()[0]['modalInput']}`),
  $(`#${attributeName()[0]['submitButton']}`)
);
export { formInput };
