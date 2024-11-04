const detailElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'detail-nama-pajak': 'tax_information',
    'detail-jumlah': 'amount',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    const text = id === 'detail-jumlah' ? `${widgetValue}%` : `${widgetValue}`;
    $(`#${id}`).text(text);
  });
};

export { detailElement };
