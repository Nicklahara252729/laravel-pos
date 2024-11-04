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

class FormChangePassword extends FormManager {
  constructor(form, modal, submitButton) {
    super(form, modal, submitButton);
    this.newPassword = $(`#${attributeName()[0]['newPassword']}`);
    this.newPasswordAddon = $(`#${attributeName()[0]['newPasswordAddonButton']}`);
    this.newPasswordConfirmation = $(`#${attributeName()[0]['newPasswordConfirmation']}`);
    this.newPasswordConfirmPassword = $(`#${attributeName()[0]['newConfirmPasswordAddonButton']}`);
  }

  /**
   * set default new password visibilty close
   */
  newPasswordVisibility() {
    this.newPassword.attr('type', 'password');
    const eyeIconClass = 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.newPasswordAddon.html(eyeIcon);
  }

  /**
   * set default new confirm password visibility close
   */
  newConfirmPasswordVisibilty() {
    this.newPasswordConfirmation.attr('type', 'password');
    const eyeIconClass = 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.newPasswordConfirmPassword.html(eyeIcon);
  }

  /**
   * reset / clear data form
   */
  emptyForm = () => {
    this.form[0].reset();
    this.newPasswordVisibility();
    this.newConfirmPasswordVisibilty();
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
   * handling id success
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
      // Call the form's submit method
      this.form.submit();
    });

    this.form.off('submit').on('submit', (e) => {
      e.preventDefault();
      this.submitForm(false);
    });
  };
}

const formChangePassword = new FormChangePassword(
  $(`#${attributeName()[0]['formChangePassword']}`),
  $(`#${attributeName()[0]['modalChangePassword']}`),
  $(`#${attributeName()[0]['submitUbahPasswordButton']}`)
);
export { formChangePassword };
