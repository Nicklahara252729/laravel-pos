/**
 * import component form
 */
import { formChangePassword } from '../form/change-password.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalChangePassword {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formChangePassword;

    // defind component
    this.modal = $(`#${attributeName()[0]['modalChangePassword']}`);
    this.newPassword = $(`#${attributeName()[0]['newPassword']}`);
    this.passwordAddon = $(`#${attributeName()[0]['newPasswordAddonButton']}`);
    this.newPasswordConfirmation = $(`#${attributeName()[0]['newPasswordConfirmation']}`);
    this.newConfirmPasswordAddon = $(`#${attributeName()[0]['newConfirmPasswordAddonButton']}`);
    this.samePassAlert = $(`#${attributeName()[0]['samePasswordAlert']}`);
    this.updateButton = $(`#${attributeName()[0]['submitChangePasswordButton']}`);
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} url - The unique identifier of the daftar pegawai to be edited.
   */
  async modalChangePasswordHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.emptyForm();
    this.formManager.setAction(param.url);
    this.modal.modal('show');
  }

  /**
   * toggle new password visibility
   */
  toggleNewPasswordVisibility() {
    const isPasswordVisible = this.newPassword.attr('type') === 'password';
    this.newPassword.attr('type', isPasswordVisible ? 'text' : 'password');
    const eyeIconClass = isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.passwordAddon.html(eyeIcon);
  }

  /**
   * toggle new confirm password visibility
   */
  toggleNewConfirmPasswordVisibility() {
    const isPasswordVisible = this.newPasswordConfirmation.attr('type') === 'password';
    this.newPasswordConfirmation.attr('type', isPasswordVisible ? 'text' : 'password');
    const eyeIconClass = isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.newConfirmPasswordAddon.html(eyeIcon);
  }

  /**
   * check new password and confirmation
   */
  checkPassword() {
    const passwordsMatch = this.newPasswordConfirmation.val() === this.newPassword.val();
    const validLength =
      this.newPassword.val().length >= 8 && this.newPasswordConfirmation.val().length >= 8;

    if (!validLength) {
      this.samePassAlert.text('Kata sandi harus terdiri dari 8 karakter atau lebih');
      this.samePassAlert.show();
      this.updateButton.prop('disabled', true);
    } else if (!passwordsMatch) {
      this.samePassAlert.text('Kata sandi tidak sama');
      this.samePassAlert.show();
      this.updateButton.prop('disabled', true);
    } else {
      this.samePassAlert.hide();
      this.updateButton.prop('disabled', false);
    }

    return passwordsMatch && validLength;
  }
}

export { ModalChangePassword };
