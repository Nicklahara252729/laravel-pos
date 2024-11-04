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

/**
 * import widget
 */
import { setDropify } from '../widget/dropify.js';

class FormInput extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.dropifyClear = $(`.${attributeName()[0]['dropifyClear']}`);
    this.dropifyWrapper = $(`.${attributeName()[0]['dropifyWrapper']}`);
    this.photoContainer = $(`#${attributeName()[0]['photoContainer']}`);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
    this.dropifyClear.click();
  };

  /**
   * setting dropify image
   * @param {*} inputName
   * @param {*} image
   */
  setDropifyimage = (inputName, image) => {
    $(`[name=${inputName}] , ${this.dropifyWrapper.selector}`).remove();

    const html = `<input type="file" id="photo" name="photo" class="dropify" data-max-file-size="2M" data-default-file='${image}' />`;
    this.photoContainer.append(html);
    setDropify(`[name=${inputName}]`);
  };

  /**
   * setting form filled
   * @param {*} data
   */
  fillForm(data) {
    this.emptyForm();
    const excludeFields = ['photo'];
    $.each(data, (key, value) => {
      if (!excludeFields.includes(key)) {
        const inputElement = $(`[name="${key}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          inputElement.val(value);
        }
      }

      if (key == 'photo') {
        const image = value;
        const inputName = key;
        this.setDropifyimage(inputName, image);
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
  $(`#${attributeName()[0]['submitInputButton']}`)
);
export { formInput };
