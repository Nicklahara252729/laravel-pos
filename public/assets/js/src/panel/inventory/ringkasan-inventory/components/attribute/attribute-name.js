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
      table: 'table-ringkasan-inventory',

      /**
       * button
       */
      addButton: 'add-button',
      editButton: 'edit-button',
      deleteButton: 'delete-button',
      submitButton: 'submit-ringkasan-inventory-button',
      exportButton: 'export-button',

      /**
       * component
       */
      searchRingkasanInventory: 'search-ringkasan-inventory',
      kategoriProduk: 'kategori-produk',
      kategoriBahan: 'kategori-bahan',
      kategoriAll: 'kategori-all',
      filterKategori: 'filter-kategori',
    },
  ];
  return data;
};

export { attributeName };
