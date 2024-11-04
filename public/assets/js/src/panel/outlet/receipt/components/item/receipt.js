const receiptElement = (widgetData) => {
  const elementIdtoWidgetKeyHeader = {
    'outlet-logo-receipt': 'logo',
    'outlet-name-receipt': 'outlet',
    'outlet-address-receipt': 'alamat',
    'outlet-phone-receipt': 'phone',
  };

  Object.keys(elementIdtoWidgetKeyHeader).forEach((id) => {
    const widgetKey = elementIdtoWidgetKeyHeader[id];
    const header = widgetData.header;
    const widgetValue = header[widgetKey];
    if (id == 'outlet-logo-receipt') {
      $(`#${id}`).attr('src', widgetValue);
    } else {
      $(`#${id}`).text(widgetValue);
    }
  });

  const elementIdtoWidgetKeyFooter = {
    'web-preview': 'website',
    'fb-preview': 'facebook',
    'twitter-preview': 'twitter',
    'insta-preview': 'instagram',
    'note-preview': 'note',
  };

  Object.keys(elementIdtoWidgetKeyFooter).forEach((id) => {
    const widgetKey = elementIdtoWidgetKeyFooter[id];
    const footer = widgetData.footer;
    const widgetValue = footer[widgetKey];
    $(`#${id}`).text(widgetValue);
  });

  const elementIdtoWidgetKeyInfo = {
    'receipt-tanggal': 'date',
  };

  Object.keys(elementIdtoWidgetKeyInfo).forEach((id) => {
    const widgetKey = elementIdtoWidgetKeyInfo[id];
    const info = widgetData.info;
    const widgetValue = info[widgetKey];
    $(`#${id}`).text(widgetValue);
  });
};

export { receiptElement };
