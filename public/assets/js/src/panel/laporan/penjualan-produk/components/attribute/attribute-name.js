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
      tableIncome: 'table-income',
      tableQuantity: 'table-quantity',

      /**
       * component
       */
      tabIncome: 'income-tab',
      tabQuantity: 'quantity-tab',

      /**
       * button
       */
      exportRingkasanButton: 'export-ringkasan-button',
      exportPerjamTerjualButton: 'export-perjam-terjual-button',
      exportJumlahPerjamButton: 'export-jumlah-perjam-button',
    },
  ];
  return data;
};

export { attributeName };
