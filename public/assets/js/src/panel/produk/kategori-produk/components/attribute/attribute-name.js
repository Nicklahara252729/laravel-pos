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
      table: 'table-kategori-produk',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      submitButton: 'submit-kategori-button',
      detailButton: 'detail-button',
      assignItemButton: 'assign-item-button',
      submitAssignItemButton: 'submit-assign-item-button',

      /**
       * modal
       */
      modalTitle: 'modal-title',
      modalInput: 'modal-input',
      modalDetail: 'modal-detail',
      produkItem: 'produk-item',
      modalAssignItem: 'modal-assign-item',

      /**
       * form
       */
      formInput: 'form-input',
      formAssignItem: 'form-assign-item',
      productList: 'product-list',
      searchProductList: 'search-product-list',
      searchKategoriProduk: 'search-kategori-produk',
    },
  ];
  return data;
};

export { attributeName };
