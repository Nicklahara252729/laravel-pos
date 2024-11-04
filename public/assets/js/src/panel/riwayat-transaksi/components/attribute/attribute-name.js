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
      transactionList: 'transaction-list',
      itemRefund: 'item-refund',
      alasanLainnya: 'alasan-lainnya',
      reason: 'reason',

      /**
       * modal
       */
      modalReceipt: 'modal-receipt',
      modalIssueRefund: 'modal-issue-refund',
      modalResendReceipt: 'modal-resend-receipt',

      /**
       * form
       */
      formIssueRefund: 'form-issue-refund',
      formResendReceipt: 'form-resend-receipt',
      searchRiwayatTransaksi: 'search-riwayat-transaksi',

      /**
       * button
       */
      resendButton: 'resend-button',
      refundButton: 'refund-button',
      submitResendReceiptButton: 'submit-resend-receipt-button',
      submitIssueRefundButton: 'submit-issue-refund-button',
      exportTransaksiButton: 'export-transaksi-button',
      exportItemDetailButton: 'export-item-detail-button',
    },
  ];
  return data;
};

export { attributeName };
