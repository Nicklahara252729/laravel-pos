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
      table: 'table-hak-akses',

      /**
       * button
       */
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      addButton: 'add-button',
      submitButton: 'submit-hak-akses-button',

      /**
       * modal
       */
      modal: 'modal-input',
      modalTitle: 'model-input-title',

      /**
       * form
       */
      formInput: 'form-input',
      appPermission : 'app-permission',
      mobileGroup : 'mobile-group',
      backofficePermission : 'backoffice-permission',
      backofficeGroup : 'backoffice-group',
      laporanPenjualan : 'laporan-penjualan',
      backofficeLaporanPenjualanGroup : 'backoffice-laporan-penjualan-group',
      pembayaran : 'pembayaran',
      backofficePembayaranGroup : 'backoffice-pembayaran-group',
      produk : 'produk',
      backofficeProdukGroup : 'backoffice-produk-group',
      bahanDanResep : 'bahan-dan-resep',
      backofficeBahanDanResepGroup : 'backoffice-bahan-dan-resep-group',
      inventori : 'inventori',
      backofficeInventoriGroup : 'backoffice-inventori-group',
      pegawai : 'pegawai',
      backofficePegawaiGroup : 'backoffice-pegawai-group',
      outlet : 'outlet',
      backofficeOutletGroup : 'backoffice-outlet-group',

    },
  ];
  return data;
};

export { attributeName };
