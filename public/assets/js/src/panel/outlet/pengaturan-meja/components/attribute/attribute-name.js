/**
 * set attribute value
 * @returns
 */
const attributeName = () => {
  const data = [
    {
      /**
       * component
       */
      laporanTotalContainer: 'laporan-total-container',
      kategoriContainer: 'kategori-container',
      searchGrupMeja: 'search-grup-meja',
      searchLaporan: 'search-laporan',
      transaksiProdukList: 'transaksi-produk-list',
      transaksiPaymentMethod: 'transaksi-payment-method',
      tanggalReservasiContainer: 'transaksi-tanggal-reservasi-container',
      biayaContainer: 'biaya-container',
      reservasiContainer: 'reservasi-container',
      transaksiBiayaReservasi: 'transaksi-biaya-reservasi',
      transaksiDikembalikan: 'transaksi-dikembalikan',

      /**
       * modal
       */
      modalInput: 'modal-input',
      modalTableView: 'modal-table-view',
      modalTransaksi: 'modal-transaksi',
      modalVoidItem: 'modal-void-item',

      /**
       * form
       */
      formAturMeja: 'form-atur-meja',
      formInput: 'form-input',

      /**
       * button
       */
      tabButton: 'tab-button',
      mergeButton: 'merge-button',
      detailButton: 'detail-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      voidButton: 'void-item-button',
      duplicateButton: 'duplicate-button',
      exportButton: 'export-button',
      addButton: 'add-button',
      viewTableButton: 'view-table-button',
      submitAturMejaButton: 'submit-atur-meja-button',
      submitInputButton: 'submit-input-button',

      /**
       * table
       */
      tableGrupMeja: 'table-grup-meja',
      tableLaporan: 'table-laporan',
      tableVoid: 'table-void',
    },
  ];
  return data;
};

export { attributeName };
