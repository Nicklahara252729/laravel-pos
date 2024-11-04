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
      table: 'table-diskon-produk',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      openModalButton: 'open-modal-button',
      submitButton: 'submit-button',
      detailButton: 'detail-button',

      /**
       * modal
       */
      modalDetail: 'modal-detail',
      modalInput: 'modal-input',
      modalInputTitle: 'modal-input-title',

      /**
       * form
       */
      formInput: 'form-input',
      amountStatusFixed: 'amount-status-fixed',
      amountStatusCustom: 'amount-status-custom',
      amountTypePercent: 'amount-type-percent',
      amountTypenNominal: 'amount-type-nominal',
      detailName: 'detail-name',
      detailDiscountType: 'detail-discount-type',
      detailAmountType: 'detail-amount-type',
      detailAmount: 'detail-amount',
    },
  ];
  return data;
};

export { attributeName };
