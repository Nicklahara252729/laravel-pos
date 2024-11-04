/**
 * import process
 */
import { init as readProcess, showAdditionalOptionsBasedOnInputs } from '../../process/read.js';

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
    this.taxGratuityType1 = $(`#${attributeName()[0]['taxGratuityType1']}`);
    this.taxGratuityType2 = $(`#${attributeName()[0]['taxGratuityType2']}`);
    this.roundingType1 = $(`#${attributeName()[0]['roundingType1']}`);
    this.roundingType2 = $(`#${attributeName()[0]['roundingType2']}`);
    this.roundingActivation = attributeName()[0]['roundingActivation'];
    this.stockLimit = attributeName()[0]['stockLimit'];
  }

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
          const idKey = key.replace(/_/g, '-');
          if (value === 'yes') {
            $(`#${idKey}`).prop('checked', true);
          }

          if (value === 'add') {
            this.taxGratuityType1.prop('checked', true);
          } else if (value === 'include') {
            this.taxGratuityType2.prop('checked', true);
          }

          if (value === 2) {
            this.roundingType1.prop('checked', true);
          } else if (value === 3) {
            this.roundingType2.prop('checked', true);
          }

          if (value === 'yes' && (idKey === this.roundingActivation || idKey === this.stockLimit)) {
            showAdditionalOptionsBasedOnInputs();
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
      console.log('oke');
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
  '',
  $(`#${attributeName()[0]['submitButton']}`)
);
export { formInput };
