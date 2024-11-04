/**
 * import process
 */
import { init as readProcess } from '../../process/read.js';

/**
 * import handler
 */
import { RegionMain } from '../../../../../../handler/region/RegionMain.js';

/**
 * import helper
 */
import { FormManager } from '../../../../../../helpers/FormManager.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class FormInfoBisnis extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.regionManager = new RegionMain();
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
          inputElement.val(value);
        }
      }
    });

    const { id_province, id_city, id_district } = data;
    this.regionManager.setDefaultValue(id_province, id_city, id_district);
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

const formInfoBisnis = new FormInfoBisnis(
  $(`#${attributeName()[0]['formInfoBisnis']}`),
  $(`#${attributeName()[0]['modalInfoBisnis']}`),
  $(`#${attributeName()[0]['submitInfoBisnisButton']}`)
);
export { formInfoBisnis };
