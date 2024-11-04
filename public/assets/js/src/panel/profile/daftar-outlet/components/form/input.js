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
 * import component widget
 */
import { setDropify } from '../widget/dropify.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class FormInput extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.regionManager = new RegionMain();
    this.dropifyClear = $(`.${attributeName()[0]['dropifyClear']}`);
    this.dropifyWrapper = $(`.${attributeName()[0]['dropifyWrapper']}`);
    this.logoContainer = $(`#${attributeName()[0]['logoContainer']}`);
  }

  emptyForm = () => {
    this.form[0].reset();
    this.dropifyClear.click();
  };

  setDropifyimage = (inputName, image) => {
    $(`[name=${inputName}] , ${this.dropifyWrapper.selector}`).remove();

    const html = `<input type="file" id="imageInput" name="logo" class="dropify" data-max-file-size="2M" data-default-file='${image}' />`;
    this.logoContainer.append(html);
    setDropify(`[name=${inputName}]`);
  };

  fillForm(data) {
    this.emptyForm();
    const excludeFields = ['logo'];
    $.each(data, (key, value) => {
      if (!excludeFields.includes(key)) {
        const inputElement = $(`[name="${key}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          inputElement.val(value);
        }
      }

      if (key == 'logo') {
        const image = value;
        const inputName = key;
        this.setDropifyimage(inputName, image);
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

const formInput = new FormInput(
  $(`#${attributeName()[0]['formDaftarOutlet']}`),
  $(`#${attributeName()[0]['modal']}`),
  $(`#${attributeName()[0]['submitButton']}`)
);
export { formInput };
