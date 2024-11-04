/**
 * set attribute value
 * @returns
 */
const attributeName = () => {
  const data = [
    {
      /**
       * button
       */
      detailPersonalButton: 'detail-personal-button',
      submitDetailPersonalButton: 'submit-detail-personal-button',
      newPasswordAddonButton: 'new-password-toggle',
      newConfirmPasswordAddonButton: 'new-password-confirmation-toggle',
      currenPasswordAddonButton: 'current-password-toggle',
      ubahPasswordButton: 'ubah-password-button',
      submitUbahPasswordButton: 'submit-ubah-password-button',
      kontakVerifikasiButton : 'kontak-verifikasi-button',
      emailVerifikasiButton : 'email-verifikasi-button',
      submitVerifikasiKontakButton: 'submit-verifikasi-kontak-button',

      /**
       * modal
       */
      modalDetail: 'modal-detail-personal',
      modalChangePassword: 'modal-ubah-password',
      modalVerifikasiKontak: 'modal-verifikasi-kontak',

      /**
       * form
       */
      formDetailPersonal: 'form-detail-personal',
      formChangePassword: 'form-ubah-password',
      formVerifikasiKontak: 'form-verifikasi-kontak',

      /**
       * component
       */
      profileContainer: 'profile-container',
      passwordContainer: 'password-container',
      samePasswordAlert: 'same-password-alert',
      statusEmailVerification : 'status-email-verification',
      statusKontakVerification : 'status-kontak-verification',

      /**
       * widget
       */
      dropify: 'dropify',
      dropifyClear: 'dropify-clear',
      dropifyWrapper: 'dropify-wrapper',

      /**
       * form
       */
      newPassword: 'new-password',
      newPasswordConfirmation: 'new-password-confirmation',
      currentPassword: 'current-password',
    },
  ];
  return data;
};

export { attributeName };
