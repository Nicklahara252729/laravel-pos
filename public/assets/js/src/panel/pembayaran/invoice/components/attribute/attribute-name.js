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
      table: 'table-invoice',
      tableRiwayatPembayaran: 'table-riwayat-pembayaran',

      /**
       * button
       */
      exportButton: 'export-button',
      detailButton: 'detail-button',
      resendButton: 'resend-button',
      paymentButton: 'payment-button',
      cancelButton: 'cancel-button',
      submitPaymentInvoiceButton: 'submit-payment-invoice-button',
      submitCancelInvoiceButton: 'submit-cancel-invoice-button',
      previewPaymentInvoiceButton: 'preview-payment-invoice-button',

      /**
       * container
       */
      filterContainer: 'filter-container',
      moreContainer: 'more-container',
      tipePembayaranContainer: 'tipe-pembayaran-container',
      tipePembayaranLainnyaContainer: 'tipe-pembayaran-lainnya-container',
      detailButtonContainer: 'detail-button-container',

      /**
       * modal
       */
      modalDetail: 'modal-detail',
      modalPayment: 'modal-payment',
      modalCancel: 'modal-cancel',

      /**
       * component
       */
      searchTable: 'search-invoice',
      detailProdukList: 'detail-produk-list',
      detailVariantList: 'detail-variant-list',
      detailModifierList: 'detail-modifier-list',
      totalTagihan: 'total-tagihan',
      itemRefund: 'item-refund',
      alasanLainnya: 'alasan-lainnya',
      reason: 'reason',
      totalRefund: 'total-refund',

      /**
       * form
       */
      formPayment: 'form-payment',
      formCancel: 'form-cancel',
    },
  ];
  return data;
};

export { attributeName };
