/**
 * variant input list element
 */
const variantInputEl = (rowData) => {
  const variantOption = rowData
    .map((datas) => {
      return `<option value="${datas.uuid_item_price_variant}">${datas.name}</option>`;
    })
    .join('');
  return variantOption;
};

export { variantInputEl };