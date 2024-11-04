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
      table: 'table-outlet',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      openModalButton: 'open-modal-button',
      submitButton: 'submit-daftar-outlet',

      /**
       * modal
       */
      modal: 'modal-daftar-outlet',
      modalOutletTitle: 'model-outlet-title',

      /**
       * form
       */
      formDaftarOutlet: 'form-daftar-outlet',

      /**
       * container
       */
      logoContainer: 'logo-container',
      
      /**
       * widget
       */
      dropify: 'dropify',
      dropifyClear: 'dropify-clear',
      dropifyWrapper: 'dropify-wrapper'
    },
  ];
  return data;
};

export { attributeName };
