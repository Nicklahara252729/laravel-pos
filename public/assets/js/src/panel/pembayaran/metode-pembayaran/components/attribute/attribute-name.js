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
      table: 'table-metode-pembayaran',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      submitButton: 'submit-metode-pembayaran-button',
      detailButton: 'detail-button',
      assignOutletButton: 'assign-outlet-button',
      submitAssignOutletButton: 'submit-assign-outlet-button',

      /**
       * modal
       */
      modalTitle: 'modal-title',
      modalInput: 'modal-input',
      modalDetail: 'modal-detail',
      modalAssignOutlet: 'modal-assign-outlet',
      detailNamaKonfigurasi: 'detail-nama-konfigurasi',
      detailOutletList: 'detail-outlet-list',
      detailPaymentList: 'detail-payment-list',

      /**
       * form
       */
      formInput: 'form-input',
      formAssignOutlet: 'form-assign-outlet',
      outletAssignList: 'outlet-assign-list',
      searchOutletList: 'search-outlet-list',
      searchKonfigurasi: 'search-konfigurasi',
      paymentList: 'payment-list',
      paymentListParent: 'payment-list-parent',
      paymentListGroup: 'payment-list-group',
    },
  ];
  return data;
};

export { attributeName };
