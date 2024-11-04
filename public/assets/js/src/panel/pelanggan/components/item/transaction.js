const receiptElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'outlet-logo-receipt': 'logo',
    'outlet-name-receipt': 'outlet',
    'outlet-address-receipt': 'alamat',
    'outlet-phone-receipt': 'phone',
    'receipt-tanggal': 'tanggal',
    'web-preview': 'website',
    'fb-preview': 'facebook',
    'twitter-preview': 'twitter',
    'insta-preview': 'instagram',
    'note-preview': 'note',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    if (id == 'outlet-logo-receipt') {
      $(`#${id}`).attr('src', widgetValue);
    } else {
      $(`#${id}`).text(widgetValue);
    }
  });
};

export { receiptElement };
