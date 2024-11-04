/**
 * import process
 */
import { init as readProcess } from '../../process/read.js';

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
    this.passwordInput = $(`#${attributeName()[0]['passwordInput']}`);
    this.passwordAddon = $(`#${attributeName()[0]['passwordAddonButton']}`);
    this.pin = $(`#${attributeName()[0]['pinInput']}`);
    this.pinAddon = $(`#${attributeName()[0]['pinAddonButton']}`);
    this.dropifyClear = $(`.${attributeName()[0]['dropifyClear']}`);
    this.dropifyWrapper = $(`.${attributeName()[0]['dropifyWrapper']}`);
    this.profileContainer = $(`#${attributeName()[0]['profileContainer']}`);
  }

  /**
   * set default password visibilty close
   */
  passwordVisibility() {
    this.passwordInput.attr('type', 'password');
    const eyeIconClass = 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.passwordAddon.html(eyeIcon);
  }

  /**
   * set default pin visibility close
   */
  pinVisibilty() {
    this.pin.attr('type', 'password');
    const eyeIconClass = 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.pinAddon.html(eyeIcon);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
    this.dropifyClear.click();
    this.passwordVisibility();
    this.pinVisibilty();
  };

  /**
   * setting dropify image
   * @param {*} inputName
   * @param {*} image
   */
  setDropifyimage = (inputName, image) => {
    $(`[name=${inputName}] , ${this.dropifyWrapper.selector}`).remove();

    const html = `<input type="file" id="profile_photo_path" name="profile_photo_path" class="dropify" data-max-file-size="2M" data-default-file='${image}' />`;
    this.profileContainer.append(html);
    setDropify(`[name=${inputName}]`);
  };

  /**
   * setting form filled
   * @param {*} data
   */
  fillForm(data) {
    this.emptyForm();
    const excludeFields = ['profile_photo_path'];
    $.each(data, (key, value) => {
      if (!excludeFields.includes(key)) {
        const inputElement = $(`[name="${key}"]`);

        // Check if the input element exists and set its value
        if (inputElement.length) {
          inputElement.val(value);
        }
      }

      if (key == 'profile_photo_path') {
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
   * @returns
   */
  getPutData = () => {
    const formData = this.getPostData();
    formData.delete('password');
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
