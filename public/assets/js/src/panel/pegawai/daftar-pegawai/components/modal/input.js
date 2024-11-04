/**
 * import component form
 */
import { formInput } from '../form/input.js';

/**
 * import component attribute
 */
import { attributeName } from '../attribute/attribute-name.js';

class ModalInput {
  /**
   * Creates a new instance of ModalInput.
   *
   * @constructor
   */
  constructor() {
    // defined manager
    this.formManager = formInput;

    // defined component
    this.modal = $(`#${attributeName()[0]['modalInput']}`);
    this.titleModal = $(`#${attributeName()[0]['modalInput']} .modal-header h5`);
    this.buttonSubmit = $(`#${attributeName()[0]['submitButton']}`);
    this.uuidAccess = $(`#${attributeName()[0]['uuidAccess']}`);
    this.passwordInput = $(`#${attributeName()[0]['passwordInput']}`);
    this.passwordAddon = $(`#${attributeName()[0]['passwordAddonButton']}`);
    this.pin = $(`#${attributeName()[0]['pinInput']}`);
    this.pinAddon = $(`#${attributeName()[0]['pinAddonButton']}`);
  }

  /**
   * render role select
   */
  async renderRoleSelect(url) {
    this.uuidAccess.empty();
    const response = await url;
    const data = response || [];
    this.uuidAccess.append(`<option value="" selected >${this.uuidAccess.data('text')}</option>`);
    data.forEach((role) => {
      const selected = this.roleSelected === role.uuid_access ? 'selected' : 'ok';
      const option = `<option value="${
        role.uuid_access
      }" ${selected}>${role.access_name.toUpperCase()}</option>`;
      this.uuidAccess.append(option);
    });
  }

  /**
   * Handles modal behavior for adding a new daftar pegawai.
   */
  async modalAddHandler(param) {
    this.formManager.setMethod('POST');
    this.formManager.setAction(param.url);
    this.formManager.emptyForm();
    this.titleModal.text('Tambah Daftar Pegawai');
    this.buttonSubmit.text('Simpan');
    await this.renderRoleSelect(param.urlHakAkses);
  }

  /**
   * Handles modal behavior for editing.
   *
   * @param {string} param - The unique identifier of the daftar pegawai to be edited.
   */
  async modalEditHandler(param) {
    this.formManager.setMethod('PUT');
    this.formManager.setAction(param.url);
    const dataDaftarPegawai = param.data;
    this.formManager.fillForm(dataDaftarPegawai);
    this.titleModal.text('Edit Daftar Pegawai');
    this.buttonSubmit.text('Simpan perubahan');
    this.modal.modal('show');
    this.roleSelected = dataDaftarPegawai.uuid_access;
    await this.renderRoleSelect(param.urlHakAkses);
  }

  /**
   * toggle password visibility
   */
  togglePasswordVisibility() {
    const isPasswordVisible = this.passwordInput.attr('type') === 'password';
    this.passwordInput.attr('type', isPasswordVisible ? 'text' : 'password');
    const eyeIconClass = isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.passwordAddon.html(eyeIcon);
  }

  /**
   * toggle pin visibility
   */
  togglePinVisibility() {
    const idPinVisible = this.pin.attr('type') === 'password';
    this.pin.attr('type', idPinVisible ? 'text' : 'password');
    const eyeIconClass = idPinVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline';
    const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
    this.pinAddon.html(eyeIcon);
  }
}

export { ModalInput };
