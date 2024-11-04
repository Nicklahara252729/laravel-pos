/**
 * detail elment
 * @param {*} widgetData
 */
const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-name': 'discount_name',
    'detail-discount-type': 'amount_status',
    'detail-amount-type': 'amount_type_fixed',
    'detail-amount': 'amount',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    let text = ``;
    if (id !== 'detail-amount-type') {
      text = id === 'detail-amount' ? `${widgetValue}%` : widgetValue;
    } else {
      text = widgetValue === 'persen' ? `Potongan per persen` : `Potongan per nominal`;
    }
    $(`#${id}`).text(`${text}`);
  });
};

export { detailElement };
