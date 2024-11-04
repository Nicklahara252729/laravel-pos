const infoBisnisElement = (widgetData) => {
  const elementIdtoWidgetKey = {
    'business-name': 'business_name',
    'business-address': 'business_address',
    'postal-code': 'postal_code',
    'nik-name': 'nik_name',
    nik: 'nik',
    provinsi: 'provinsi',
    kota: 'kota',
    kecamatan: 'kecamatan',
  };

  Object.keys(elementIdtoWidgetKey).forEach((id) => {
    const widgetKey = elementIdtoWidgetKey[id];
    const widgetValue = widgetData[widgetKey];
    $(`#${id}`).text(widgetValue);
  });
};

export { infoBisnisElement };
