/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-nama-kategori': 'category_name',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(`${widgetValue}`);
  });
};

/**
 * item element
 * @param {*} rowData
 * @returns
 */
const itemElement = (rowData) => {
  const { product_name } = rowData;
  return `<li class="p-2 flex justify-between items-center">${product_name}</li>`;
};

export { detailElement, itemElement };
