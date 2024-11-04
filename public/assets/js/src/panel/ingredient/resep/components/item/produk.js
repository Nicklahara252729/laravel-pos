/**
 * produk input list element
 */
const produkInputEl = (rowData) => {
  const produkOption = rowData
    .map((datas) => {
      return `<option value="${datas.uuid_item}">${datas.product_name}</option>`;
    })
    .join('');
  return produkOption;
};

export { produkInputEl };
