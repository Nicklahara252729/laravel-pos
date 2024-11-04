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
      sistemButton: 'btn-sistem',
      infoBisnisButton: 'btn-info-bisnis',
      npwpButton: 'btn-npwp',
      submitSistemButton: 'btn-submit-sistem',
      submitNpwpButton: 'btn-submit-npwp',
      submitInfoBisnisButton: 'btn-submit-info-bisnis',

      /**
       * modal
       */
      modalSistem: 'modal-sistem',
      modalNpwp: 'modal-npwp',
      modalInfoBisnis: 'modal-info-bisnis',

      /**
       * form
       */
      formSistem: 'form-sistem',
      formNpwp: 'form-npwp',
      formInfoBisnis: 'form-info-bisnis',

      /**
       * widget
       */
      dropify: 'dropify',
      dropifyClear: 'dropify-clear',
      dropifyWrapper: 'dropify-wrapper',

      /**
       * component
       */
      logoContainer: 'logo-container',
      npwpContainer: 'npwp-container',
      sistemContainer : 'sistem-container',
    },
  ];
  return data;
};

export { attributeName };
