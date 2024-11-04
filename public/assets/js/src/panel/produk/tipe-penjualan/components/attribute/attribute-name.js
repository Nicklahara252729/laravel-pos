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
      table: 'table-tipe-penjualan',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      detailButton: 'detail-button',
      submitButton: 'submit-tipe-penjualan-button',

      /**
       * modal
       */
      modalTitle: 'modal-input-title',
      modalInput: 'modal-input',
      modalDetail: 'modal-detail',
      modalDetailTitle: 'modal-detail-title',
      detailName: 'detail-name',
      detailStatus: 'detail-status',
      detailGratuityList: 'detail-gratuity-list',

      /**
       * form
       */
      formInput: 'form-input',
      productList: 'product-list',
      searchProductList: 'search-product-list',
      isActive: 'is-active',
      gratuityList: 'gratuity-list',
    },
  ];
  return data;
};

export { attributeName };
