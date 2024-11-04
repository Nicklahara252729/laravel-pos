/**
 * import repositories
 */
import {
  updateAkunAPI,
  updatePasswordAPI,
  contactVerificationAPI,
  emailVerificationAPI,
  verifyContactAPI,
  getAkunById,
} from '../repositories/repositories.js';

/**
 * import component widget
 */
import { setDropify } from '../components/widget/dropify.js';

/**
 * import component modal
 */
import { ModalInput } from '../components/modal/input.js';
import { ModalChangePassword } from '../components/modal/change-password.js';
import { ModalVerifikasiKontak } from '../components/modal/verifikasi-kontak.js';

/**
 * import component attribute
 */
import { attributeName } from '../components/attribute/attribute-name.js';

/**
 * defined class
 */
const changePasswordModal = new ModalChangePassword();
const akunModal = new ModalInput();
const verifikasiKontakModal = new ModalVerifikasiKontak();

/**
 * defined component
 */
const detailPersonalButton = $(`#${attributeName()[0]['detailPersonalButton']}`);
const ubahPasswordButton = $(`#${attributeName()[0]['ubahPasswordButton']}`);
const newPasswordAddonButton = $(`#${attributeName()[0]['newPasswordAddonButton']}`);
const newConfirmPasswordAddonButton = $(`#${attributeName()[0]['newConfirmPasswordAddonButton']}`);
const currenPasswordAddonButton = $(`#${attributeName()[0]['currenPasswordAddonButton']}`);
const verificationContainer = $(`#${attributeName()[0]['statusKontakVerification']}`);
const kontakVerifikasiButton = $(`#${attributeName()[0]['kontakVerifikasiButton']}`);
const modalVerifikasiKontak = $(`#${attributeName()[0]['modalVerifikasiKontak']}`);
const statusEmailVerification = $(`#${attributeName()[0]['statusEmailVerification']}`);
const emailVerifikasiButton = $(`#${attributeName()[0]['emailVerifikasiButton']}`);

/**
 * Event listener for opening the create modal to edit account.
 *
 * @event click
 * @listens #open-modal
 */
const editAkunHandler = () => {
  detailPersonalButton.on('click', async function () {
    setDropify();
    const param = { url: updateAkunAPI(), akun: await getAkunById() };
    akunModal.modalEditHandler(param);
  });
};

/**
 * Event listener for opening the create modal to edit account.
 *
 * @event click
 * @listens #open-modal
 */
const updatePasswordHandler = () => {
  ubahPasswordButton.on('click', function () {
    changePasswordModal.modalChangePasswordHandler(updatePasswordAPI());
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
 * toogle currnet password visibility handler
 */
const toogleCurrentPasswordHandler = () => {
  currenPasswordAddonButton.on('click', () => {
    changePasswordModal.toggleCurrentPasswordVisibility();
  });
};

/**
 * kontak verifikasi handler
 */
const kontakVerifikasiHandler = () => {
  verificationContainer.on('click', kontakVerifikasiButton.selector, function (event) {
    swalConfirmation(
      {
        message: textConfirmVerification('kontak'),
        title: 'verification',
      },
      async () => {
        const verificationProcess = await contactVerificationAPI();
        if (verificationProcess.status) {
          swalSuccess(verificationProcess.message, {});
          modalVerifikasiKontak.modal('show');
          verifikasiKontakModal.modalVerifikasiHandler(verifyContactAPI());
        }
      }
    );
  });
};

/**
 * email verifikasi handler
 */
const emailVerifikasiHandler = () => {
  statusEmailVerification.on('click', emailVerifikasiButton.selector, function (event) {
    swalConfirmation(
      {
        message: textConfirmVerification('email'),
        title: 'verification',
      },
      async () => {
        const verificationProcess = await emailVerificationAPI();
        if (verificationProcess.status) {
          swalSuccess(verificationProcess.message, {});
        }
      }
    );
  });
};

/**
 * Initializes event listener
 */
const init = () => {
  editAkunHandler();
  updatePasswordHandler();
  toogleNewPasswordHandler();
  toogleNewConfirmPasswordHandler();
  toogleCurrentPasswordHandler();
  kontakVerifikasiHandler();
  emailVerifikasiHandler();
};

export { init };
