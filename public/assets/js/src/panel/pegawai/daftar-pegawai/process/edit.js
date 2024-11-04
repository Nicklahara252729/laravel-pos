/**
 * import repositories
 */
import {
  updateDaftarPegawaiAPI,
  activateDaftarPegawaiAPI,
  updatePasswordDaftarPegawaiAPI,
  updatePinAksesAPI,
  getPinAksesByIdAPI,
  getDaftarPegawaiByIdAPI,
} from '../repositories/repositories.js';
import { getHakAksesAPI } from '../../../hak-akses/repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalChangePassword } from '../components/modal/change-password.js';
import { ModalPinAkses } from '../components/modal/pin-akses.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * import process
 */
import { init as renderDaftarPegawai } from '../process/read.js';

/**
 * defined class
 */
const changePasswordModal = new ModalChangePassword();
const daftarPegawaiModal = new ModalInput();
const pinAksesModal = new ModalPinAkses();

/**
 * defined component
 */
const table = $(`#${attributeName()[0]['table']}`);
const editButton = $(`.${attributeName()[0]['editButton']}`);
const passwordContainer = $(`#${attributeName()[0]['passwordContainer']}`);
const tableContainer = $(`#${attributeName()[0]['table']}`);
const restoreButton = $(`.${attributeName()[0]['restoreButton']}`);
const samePasswordAlert = $(`#${attributeName()[0]['samePasswordAlert']}`);
const changePasswordButton = $(`.${attributeName()[0]['changePasswordButton']}`);
const newPasswordConfirmation = $(`#${attributeName()[0]['newPasswordConfirmation']}`);
const newPassword = $(`#${attributeName()[0]['newPassword']}`);
const newPasswordAddonButton = $(`#${attributeName()[0]['newPasswordAddonButton']}`);
const newConfirmPasswordAddonButton = $(`#${attributeName()[0]['newConfirmPasswordAddonButton']}`);
const pinAccessButton = $(`.${attributeName()[0]['pinAccessButton']}`);

/**
 * Event listener for opening the create modal to edit employee.
 *
 * @event click
 * @listens #open-modal
 */
const editEmplyeeHandler = () => {
  table.on('click', editButton.selector, async function () {
    passwordContainer.hide();
    setDropify();
    const uuidUser = $(this).data('uuid');
    const param = {
      url: updateDaftarPegawaiAPI(uuidUser),
      data: await getDaftarPegawaiByIdAPI(uuidUser),
      urlHakAkses: getHakAksesAPI(),
    };
    daftarPegawaiModal.modalEditHandler(param);
  });
};

/**
 * activate employee data handler
 */
const activeEmployeeHandler = () => {
  tableContainer.on('click', restoreButton.selector, function (event) {
    const target = $(this);
    const uuidUser = target.data('uuid');
    const nama = target.data('nama');
    const activeMessage = textConfirmActivation(nama);
    swalConfirmation(
      {
        message: activeMessage,
        title: 'activate',
      },
      async () => {
        const activeProcess = await activateDaftarPegawaiAPI(uuidUser);
        if (activeProcess.status) {
          swalSuccess(activeProcess.message, renderDaftarPegawai);
        }
      }
    );
  });
};

/**
 * change password daftar pegawai handler
 */
const changePasswordHandler = () => {
  samePasswordAlert.hide();
  table.on('click', changePasswordButton.selector, function () {
    $(`${newPassword.selector}, ${newPasswordConfirmation.selector}`).on('keyup', function () {
      changePasswordModal.checkPassword();
    });
    const uuidUser = $(this).data('uuid');
    const param = { url: updatePasswordDaftarPegawaiAPI(uuidUser), uuidUser: uuidUser };
    changePasswordModal.modalChangePasswordHandler(param);
  });
};

/**
 * toogle new password visibility handler
 */
const toogleNewPasswordHandler = () => {
  newPasswordAddonButton.on('click', () => {
    changePasswordModal.toggleNewPasswordVisibility();
  });
};

/**
 * toogle new confirm password visibility handler
 */
const toogleNewConfirmPasswordHandler = () => {
  newConfirmPasswordAddonButton.on('click', () => {
    changePasswordModal.toggleNewConfirmPasswordVisibility();
  });
};

/**
 * Event listener for opening the create modal to edit pin akses
 */
const pinAksesHandler = () => {
  table.on('click', pinAccessButton.selector, async function () {
    const uuidUser = $(this).data('uuid');
    const param = {
      url: updatePinAksesAPI(uuidUser),
      data: await getPinAksesByIdAPI(uuidUser),
    };
    pinAksesModal.modalPinAksesHandler(param);
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  editEmplyeeHandler();
  activeEmployeeHandler();
  changePasswordHandler();
  toogleNewPasswordHandler();
  toogleNewConfirmPasswordHandler();
  pinAksesHandler();
};

export { init };
