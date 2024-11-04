/**
 * set attribute value
 * @returns
 */
const attributeName = () => {
  const data = [
    {
      /**
       * table
       */
      table: 'table-daftar-pegawai',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      nonactiveButton: 'nonactive-button',
      restoreButton: 'restore-button',
      deletePermanentButton: 'delete-permanent-button',
      submitButton: 'submit-daftar-pegawai-button',
      activeDataButton: 'active-data',
      inactiveDataButton: 'inactive-data',
      passwordAddonButton: 'password-addon-button',
      pinAccessButton: 'pin-access-button',
      changePasswordButton: 'change-password-button',
      submitPinAksesButton: 'submit-pin-akses-button',
      submitChangePasswordButton: 'submit-change-password-button',
      pinAddonButton: 'pin-addon-button',
      newPasswordAddonButton: 'new-password-addon-button',
      newConfirmPasswordAddonButton: 'new-confirm-password-addon-button',
      importButton: 'import-button',
      submitImportButton: 'submit-import-button',
      exportButton: 'export-button',

      /**
       * modal
       */
      modalInput: 'modal-input',
      modalInputTitle: 'modal-input-title',
      modalChangePassword: 'modal-change-password',
      modalChangePasswordTitle: 'modal-change-password-title',
      modalPinAkses: 'modal-pin-akses',
      modalPinAksesTitle: 'modal-pin-akses-title',
      modalImport: 'modal-import',

      /**
       * widget
       */
      dropify: 'dropify',
      dropifyClear: 'dropify-clear',
      dropifyWrapper: 'dropify-wrapper',
      uuidAccess: 'uuid_access',

      /**
       * form
       */
      formInput: 'form-input',
      formChangePassword: 'form-change-password',
      formPinAccess: 'form-pin-access',
      passwordInput: 'password',
      pinInput: 'pin',
      newPassword: 'new-password',
      newPasswordConfirmation: 'new-password-confirmation',
      formImport: 'form-import',

      /**
       * component
       */
      filterData: 'filter-data',
      importContainer: 'import-container',
      passwordContainer: 'password-container',
      samePasswordAlert: 'same-password-alert',
      profileContainer: 'profile-container',
    },
  ];
  return data;
};

export { attributeName };
