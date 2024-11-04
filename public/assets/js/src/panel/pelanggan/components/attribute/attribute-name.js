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
      table: 'table-pelanggan',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      detailButton: 'detail-button',
      submitButton: 'submit-pelanggan-button',
      importButton: 'import-button',
      submitImportButton: 'submit-import-button',
      exportButton: 'export-button',
      daftarTransaksiButton: 'daftar-transaksi-button',

      /**
       * modal
       */
      modalReceiptTitle: 'modal-receipt-title',
      modalReceipt: 'modal-receipt',
      modalDetail: 'modal-detail',
      modalDetailTitle: 'modal-detail-title',
      transactionList: 'transaction-list',
      modalImport: 'modal-import',
      modalTransaction: 'modal-transaksi',

      /**
       * form
       */
      cariPelanggan: 'cari-pelanggan',
      formImport: 'form-import',

      /**
       * component
       */
      importContainer: 'import-container',
      name: 'name',
      contact: 'contact',
      email: 'email',
      birthDate: 'birth-date',
      gender: 'gender',
      transactionCount: 'transaction-count',
      joinDate: 'join-date',
      lastTransaction: 'last-transaction',
      monthTransaction: 'month-transaction',
      yearTransaction: 'year-transaction',
      totalTransaction: 'total-transaction',
      averageTransaction: 'average-transaction',
      modalTransactionList: 'modal-transaction-list',

      /**
       * widget
       */
      dropify: 'dropify',
      dropifyClear: 'dropify-clear',
      dropifyWrapper: 'dropify-wrapper',
    },
  ];
  return data;
};

export { attributeName };
