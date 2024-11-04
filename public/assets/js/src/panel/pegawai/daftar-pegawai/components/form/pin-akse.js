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

class FormPinAkses extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
  }

  emptyForm = () => {
    this.form[0].reset();
  };

  fillForm(data) {
    this.emptyForm();
    const excludeFields = [];
    $.each(data, (key, value) => {
      if (!excludeFields.includes(key)) {
        const inputElement = $(`[name="${key}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          if (value === 'yes') {
            $(`#${key}`).prop('checked', true);
          }
          inputElement.val(value);
        }
      }
    });
  }

  handleSuccessResponse = async (response) => {
    swalSuccess(response.message, async () => {
      await readProcess();
      this.modal.modal('hide');
      this.emptyForm();
    });
  };

  getPostData = () => {
    const formData = this.getFormData();
    return formData;
  };

  getPutData = () => {
    const formData = this.getPostData();
    formData.append('_method', 'PUT');
    return formData;
  };

  initForm = () => {
    this.submitButton.off('click').on('click', () => {
      // Call the form's submit method
      this.form.submit();
    });

    this.form.off('submit').on('submit', (e) => {
      e.preventDefault();
      this.submitForm(false);
    });
  };
}

const formPinAkses = new FormPinAkses(
  $(`#${attributeName()[0]['formPinAccess']}`),
  $(`#${attributeName()[0]['modalPinAkses']}`),
  $(`#${attributeName()[0]['submitPinAksesButton']}`)
);
export { formPinAkses };
