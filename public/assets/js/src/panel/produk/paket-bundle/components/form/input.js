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
 * import component widget
 */
import { setDropify } from '../widget/dropify.js';

class FormInput extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.dropifyClear = $(`.${attributeName()[0]['dropifyClear']}`);
    this.dropifyWrapper = $(`.${attributeName()[0]['dropifyWrapper']}`);
    this.bundlePackageContainer = $(`#${attributeName()[0]['bundlePackageContainer']}`);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
    this.dropifyClear.click();
  };

  setDropifyimage = (inputName, image) => {
    $(`[name=${inputName}] , ${this.dropifyWrapper.selector}`).remove();

    const html = `<input type="file" id="imageInput" name="bundle_package_image" class="dropify" data-max-file-size="2M" data-default-file='${image}' />`;
    this.bundlePackageContainer.append(html);
    setDropify(`[name=${inputName}]`);
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
        /**
         * set value for bundle data
         */
        if (key === 'bundle') {
          $.each(data[key], (keys, values) => {
            if (keys === 'bundle_package_image') {
              const image = values;
              const inputName = keys;
              this.setDropifyimage(inputName, image);
            } else {
              if (values === 'active') {
                $(`#${keys}`).prop('checked', true);
              }
              const inputElement = $(`[name="${keys}"]`);

              // Check if the input element exists and set its value
              if (inputElement.length) {
                inputElement.val(values);
              }
            }
          });
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
