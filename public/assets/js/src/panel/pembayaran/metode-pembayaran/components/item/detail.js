/**
 * detail element
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-nama-konfigurasi': 'configuration_name',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(`${widgetValue}`);
  });
};

/**
 * outlet element
 * @param {*} rowData
 * @returns
 */
const outletElement = (rowData) => {
  const { outlet_name } = rowData;
  return `<li class="p-2 flex justify-between items-center">${outlet_name}</li>`;
};

/**
 * payment element
 * @param {*} rowData
 * @returns
 */
const paymentElement = (rowData) => {
  let listData = '';
  const { list, row } = rowData;
  if (row.length > 0) {
    const rowsElement = row.map((rows) => subPaymentElement(rows)).join('');
    listData += `<li class="p-2 flex">${list} <ul>${rowsElement}</ul></li>`;
  } else {
    listData += `<li class="p-2 flex">${list}</li>`;
  }
  return listData;
};

/**
 * sub payment element
 */
const subPaymentElement = (rowData) => {
  const { list, icon } = rowData;
  let image = '';
  if (icon !== null) {
    image = `<img src="${icon}" alt="" class="w-10 aspect-square rounded object-center mr-3">`;
  }
  return `<li class="p-2 flex"> ${image}
  ${list}</li>`;
};

export { detailElement, outletElement, paymentElement };
